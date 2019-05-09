<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function login()
	{
		$this->load->view('Usuarios/login');
	}

	public function create()
	{
		$this->load->view('Usuarios/cadastro');
	}
}
