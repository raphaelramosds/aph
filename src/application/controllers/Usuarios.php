<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller 
{
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
		$dados = $this->input->post();
		
		$this->db->where('matricula',$dados['matricula']);
		$this->db->where('senha', $dados['senha']);

		$encontrar_usuario = $this->db->get('acha_pro')->row_array();

		if($encontrar_usuario != NULL)
		{
			if($encontrar_usuario['membro_comis'] == 2)
			{
				$this->session->set_userdata('usuario',$encontrar_usuario);
				redirect('Usuarios/arearestrita');
			}
			else
			{
				$this->session->set_userdata('usuario',$encontrar_usuario);
				redirect('home');
			}
		}


		else
		{
			$this->session->set_flashdata('invalido','Dados inválidos');
			redirect('Usuarios/login');
		}

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
