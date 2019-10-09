<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('UsuariosModel','usuarios');
		$this->load->model('GruposModel','grupos');
	}

	public function index()
	{

		$this->load->view('Usuarios/login-admin');

	}

	public function autenticar()
	{
		$dados = $this->input->post();

		$condicoes = array(
			'matricula' => $dados['matricula'],
			'senha' => $dados['senha'],
			'membro_comis' => 2
		);
		$this->db->where($condicoes);

		$retorno = $this->db->get('acha_pro')->row_array();

		if(empty($retorno))
		{
			redirect('admin');
		}
		else
		{
			$this->session->set_userdata('usuario',$retorno);
			redirect('admin/home');
		}
	}

	public function home()
	{
		$this->load->view('Admin/menu');
		$this->load->view('Admin/index');
	}

	public function filtragem()
	{
		$this->load->view('Admin/menu');
		$this->load->view('Admin/filtro');	
	}

	// Filtro de usuários no sistema 
	public function procurar(){
		$this->load->view('Admin/menu');
		$form = $this->input->post();
		$dados['resultado'] = $this->usuarios->search($form['matricula'],$form['nome'],$form['apenasMembros']);
		$this->load->view('admin/filtro',$dados);
		
	}

	public function controleComissao()
	{
		$condicao = $this->input->post('condicao');
		$id = $this->input->post('usuario');
		echo json_encode($this->usuarios->EditMembrosComis($condicao,$id));
		exit;
	}


	public function reunioes()
	{
		$this->load->view('Admin/menu');
		$this->load->view('admin/reunioes');
	}

}