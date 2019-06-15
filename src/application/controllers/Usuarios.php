<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('DocentesModel','docentes');
		$this->load->model('ComissaoModel','comissao');
		$this->load->model('UsuariosModel','usuarios');
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

		$encontrar_usuario = $this->db->get('usuario')->row_array();

		if($encontrar_usuario != NULL){
			/*
				1 - Administrador
				2 - Comissão
				3 - Docente
			*/
		}

		else{
			$this->session->set_flashdata('invalido','Dados inválidos');
			redirect('Usuarios/login');
		}

	}

	public function dadosusuario()
	{
		return array(
			'matricula'	=> $this->input->post('username'),
			'senha' 	=> $this->input->post('senha'),
			'email'		=> $this->input->post('email'),
			'role'		=> $this->input->post('role')
		);
	}

	public function criar()
	{
		$usuario = $this->dadosusuario();

		$docente = array(
			'nome' => $this->input->post('nome'),
			'id_grupo' => $this->input->post('id_grupo'),
			'id_usuario' => $this->input->post('id_usuario')
		);

		$comissao = array(
			'nome' => $this->input->post('nome'),
			'id_usuario' => $this->input->post('id_usuario')	
		);

		// Adicione primeiro o usuário e depois as entidades relacionadas a ele
		$this->usuarios->add($usuario);

		//Recupere o id do usuário recém criado
		$query = $this->db->query("SELECT id,role FROM usuario WHERE matricula = '".$usuario['matricula']."'");
		$encontrar = $query->row();
		$id = $encontrar->id;
		
		// Se a role dele for 2, então relacione ele ao usuário da comissão
		// Se a role dele for 3, então relacione ele ao usuário do docente
		if($usuario['role'] == 2):
			$docente['id_usuario'] = $id;
			$this->docentes->add($docente);
		else:
			$comissao['id_usuario'] = $id;
			$this->comissao->add($comissao);
		endif;

		
	}
}
