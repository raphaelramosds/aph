<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
	public $user;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('UsuariosModel','usuarios');
		$this->load->model('GruposModel','grupos');
		$this->load->view('Admin/menu');
		$this->user = $this->session->userdata('usuario');
        if($this->user == NULL)
        {
            redirect('Usuarios/login');
        }
	}

	public function index()
	{

		$this->load->view('Admin/index');

	}

	public function filtragem()
	{
		$this->load->view('Admin/filtro');	
	}

	// Filtro de usuários no sistema 
	public function procurar()
	{
		$form = $this->input->post();
		$dados['grupos'] = $this->grupos->view();
		$dados['resultado'] = $this->usuarios->search($form['matricula'],$form['nome'],$form['apenasMembros']);
		$this->load->view('Admin/filtro',$dados);
		
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
		$dados = array(
			'grupos' => $this->grupos->view()
		);
		$this->load->view('Admin/reunioes');
	}

}