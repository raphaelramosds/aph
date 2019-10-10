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

	public function autenticar()
	{
		// $dados = $this->input->post();

	    $matricula = $this->input->post('matricula');
	    $senha = $this->input->post('senha');

		// 	Autenticação do administrador
		if($this->input->post('responsavel') == 1)
		{
			$condicoes = array(
				'matricula' => $matricula,
				'senha' => $senha,
				'membro_comis' => 2
			);
			$this->db->where($condicoes);
	
			$retorno = $this->db->get('acha_pro')->row_array();
			if(empty($retorno))
			{
				$this->session->set_flashdata('invalido','Dados inválidos');
				redirect('Usuarios/login');
			}
			else
			{
				$this->session->set_userdata('usuario',$retorno);
				redirect('admin');
			}
		}
		// Autenticação do docente
		else
		{
			// $requisicao = array(
			// 	"username" => $matricula, 
			// 	"password"=>$senha
			// );
	
			// $ch = curl_init($this->suap.'autenticacao/token/'); 
	
			// curl_setopt($ch, CURLOPT_POST, true);
			// curl_setopt($ch, CURLOPT_POSTFIELDS, $requisicao);
			// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
			// $response = curl_exec($ch);
			// curl_close($ch);
			// $status = json_decode($response, true);
	
			// print_r($status);
	
			// Etapa de Verificação de token recebido
	
			// if(isset($status['token']))
			// {
			// 	$token = $status['token'];
			// 	$usuario = $this->buscarDados($token);
	
				// Etapa de comparação das matrículas
	
				// Caso não exista um usuário com a matrícula autenticada, cadastre ele
				// Do contrário, apenas autentique para ele poder entrar no suap
	
				//$this->db->where('matricula',$usuario['matricula']);

				$this->db->where('matricula',$matricula);
				$this->db->where('senha',$senha);

				$encontrar_usuario = $this->db->get('acha_pro')->row_array();
	
				if($encontrar_usuario != NULL)
				{
					$this->session->set_userdata('usuario',$encontrar_usuario);
					redirect('home');
				}
	
				else
				{
					// Adicione o usuário no sistema após verificar se ele é um membro da comissão ou não
					echo "Adicionar usuário";
				}
	
			}
	
			// else
			// {
			// 	$this->session->set_flashdata('invalido',$status['detail']);
			// 	redirect('usuarios/login');
			// }
		// }

	}

	public function buscarDados($token)
	{

	    // Requisição para informar os dados relativos ao usuário
	    $headers = array(
	    	"Authorization: JWT ".$token
	    );

	    $ch = curl_init($this->suap."minhas-informacoes/meus-dados/");

	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	    $response = curl_exec($ch);
	    curl_close($ch);

	    $status = json_decode($response, true);

	    return $status;

	}

}
