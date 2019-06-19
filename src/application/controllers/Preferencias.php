<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Preferencias extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->view('Home/menu');
		$this->load->model('DocentesModel','docentes');
		$this->load->model('ComissaoModel','comissao');
		$this->load->model('UsuariosModel','usuarios');
		$this->load->model('GruposModel','grupos');
    }
    
    public function criar()
    {
        $this->load->view('Preferencias/create');
    }

    public function enviadas(){
        $this->load->view('Preferencias/enviadas');
    }
}