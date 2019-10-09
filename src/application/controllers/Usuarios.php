<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller 
{
	public $suap = "https://suap.ifrn.edu.br/api/v2/";

	public function __construct()
	{
		parent::__construct();
		$this->load->model('UsuariosModel','usuarios');
		$this->load->model('GruposModel','grupos');

	}

	public function login()
	{
		$this->load->view('Usuarios/login');
	}

	public function arearestrita()
	{
		$this->load->view('Usuarios/restrito');
	}

	public function autenticar()
	{
		// $dados = $this->input->post();

	    $matricula = $this->input->post('matricula');
	    $senha = $this->input->post('senha');

	    $url = $this->suap.'autenticacao/token/';
	    $data1 = array(
	    	"username" => $matricula, 
	    	"password"=>$senha
	    );

	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_POST, true);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $data1);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

	    $response = curl_exec($ch);
	    curl_close($ch);
	    $status = json_decode($response, true);

	    // print_r($status);
	    if(isset($status['token']))
	    {
			$token = $status['token'];
	    }
	    else
	    {
	    	echo $status['detail'];
	    }

	    $this->buscarDados($token);


		// $this->db->where('matricula',$dados['matricula']);
		// $this->db->where('senha', $dados['senha']);

		// $encontrar_usuario = $this->db->get('acha_pro')->row_array();

		// if($encontrar_usuario != NULL)
		// {
		// 	if($encontrar_usuario['membro_comis'] == 2)
		// 	{
		// 		$this->session->set_userdata('usuario',$encontrar_usuario);
		// 		redirect('Usuarios/arearestrita');
		// 	}
		// 	else
		// 	{
		// 		$this->session->set_userdata('usuario',$encontrar_usuario);
		// 		redirect('home');
		// 	}
		// }


		// else
		// {
		// 	$this->session->set_flashdata('invalido','Dados inválidos');
		// 	redirect('Usuarios/login');
		// }

	}

	public function buscarDados($token)
	{

	    // Requisição para informar os dados relativos ao usuário
	   	$meusdados = $this->suap."minhas-informacoes/meus-dados";
	    $headers = array(
	    	'Authorization:JWT '.$token
	    );

	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, $meusdados);
	    curl_setopt($ch, CURLOPT_POST, true);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	    $response = curl_exec($ch);
	    curl_close($ch);
	    $status = json_decode($response, true);

	    print_r($status);

	}

	// Filtro de usuários no sistema 
	public function procurar(){
		$form = $this->input->post();
		$dados['resultado'] = $this->usuarios->search($form['matricula'],$form['nome'],$form['apenasMembros']);
		$this->load->view('Usuarios/restrito',$dados);
		
	}

	public function controleComissao()
	{
		$condicao = $this->input->post('condicao');
		$id = $this->input->post('usuario');
		echo json_encode($this->usuarios->EditMembrosComis($condicao,$id));
		exit;
	}
}
