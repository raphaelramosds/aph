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

	public function autenticar()
	{

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
				$this->session->set_flashdata('invalido','Dados inválidos. Credenciais não pertencem a nenhum administrador');
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
			$this->db->where('matricula', 	$matricula);
			$this->db->where('senha', $senha);
			$this->db->where('membro_comis !=', 2);

			$encontrar_usuario = $this->db->get('acha_pro')->row_array();

			if($encontrar_usuario != NULL)
			{
				$this->session->set_userdata('usuario',$encontrar_usuario);
				redirect('home');
			}

			else
			{
				$this->session->set_flashdata('invalido','Credenciais inválidas. Tente novamente');
				redirect('usuarios/login');
			}
	
		}

	}

}
