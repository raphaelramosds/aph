<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public $user;

    public function __construct()
    {
        parent::__construct();

        $this->user = $this->session->userdata('usuario');
        $this->load->view('Home/menu');
        
        if($this->user == NULL)
        {
            redirect('Usuarios/login');
        }

    }
    
    public function index(){

        $this->load->helper('date');
        $semestre = 0;

        if(date('m') > 6){ $semestre = "2";}
        else { $semestre = "1";}

        $dados = array(
            'semestreatual' => mdate('%Y').".".$semestre
        );

        $this->load->view('Home/index', $dados);
    }

    public function sair(){
        $this->session->unset_userdata('usuario');
        redirect('Usuarios/login');

    }
}