<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('UsuariosModel','usuarios');
		$this->load->model('GruposModel','grupos');
		$this->load->model('CursoModel','cursos');

	}

	public function login()
	{
		$this->load->view('Usuarios/login');
	}

	public function arearestrita()
	{
		$dados = array(
			'grupos' => $this->grupos->view(),
			'cursos' => $this->cursos->view()
		);
		$this->load->view('Usuarios/restrito', $dados);
	}

	public function autenticar()
	{
		$dados = $this->input->post();
		
		$this->db->where('matricula',$dados['matricula']);
		$this->db->where('senha', $dados['senha']);

		$encontrar_usuario = $this->db->get('usuario')->row_array();
		/*
			1 - Administrador
			2 - Comissão
			3 - Docente
		*/
		if($encontrar_usuario != NULL)
		{
			if($encontrar_usuario['role'] == 3 || $encontrar_usuario['role'] == 2)
			{
				$this->session->set_userdata('usuario',$encontrar_usuario);
				redirect('home');
			}
			if($encontrar_usuario['role'] == 1)
			{
				$this->session->set_userdata('usuario',$encontrar_usuario);
				redirect('Usuarios/arearestrita');
			}
		}

		else
		{
			$this->session->set_flashdata('invalido','Dados inválidos');
			redirect('Usuarios/login');
		}

	}


	public function criar()
	{
		$usuario = $this->input->post();
		$this->usuarios->add($usuario);
		redirect('Usuarios/arearestrita');
	}

	// Filtro de usuários no sistema 
	public function procurar(){
		$form = $this->input->post();

		$resultado = $this->usuarios->search($form['matricula'],$form['nome']);
		$this->session->set_userdata('resultado',$resultado);
		redirect('Usuarios/arearestrita');
	}
}
