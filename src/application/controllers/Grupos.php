<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Grupos extends CI_Controller
{
    public $user;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('GruposModel','grupos');
        $this->user = $this->session->userdata('usuario');

    }

}