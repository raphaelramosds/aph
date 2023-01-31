<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Horarios extends CI_Controller 
{    
    public $user;
    public $semestreatual;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('UsuariosModel','usuarios');
        $this->load->model('PreferenciasModel','preferencias');
        $this->load->model('GruposModel','grupos');
            
        $this->user = $this->session->userdata('usuario');
        $this->load->helper('date');

        //Recuperar semestre corrente
        $ano = mdate("%Y");
        $semestre = 0;

        if(date('m') > 6)
        {
            $semestre = "2";
        }
        else 
        {
            $semestre = "1";
        }

        $this->semestreatual = $ano .".". $semestre;
        
        if($this->user == NULL)
        {
            redirect('Usuarios/login');
        }

        $this->user = $this->session->userdata('usuario');

    }
    public function add()
    {

        $semestre = $this->input->post('semestre');
        $docente = $this->input->post('idDocente');

        $resultado = $this->preferencias->analisarPreferencia($docente,$semestre);
        $this->preferencias->excluir($resultado->id_preferencia);

        $verdes = $this->input->post('verdes');
        $amarelas = $this->input->post('amarelas');
        $vermelhas = $this->input->post('vermelhas');
        $reunioes = $this->input->post('reunioes');
        $atualizacao = array( 
            'justificativa' => $this->input->post('justificativa'),
            'situacao' => 1
        );
        $this->preferencias->add($resultado->id_preferencia,$verdes,'green');
        $this->preferencias->add($resultado->id_preferencia,$vermelhas,'red');
        $this->preferencias->add($resultado->id_preferencia,$amarelas,'yellow');
        $this->preferencias->add($resultado->id_preferencia,$reunioes,'blue');

        $this->preferencias->edit($atualizacao,$resultado->id_preferencia);

        exit;

    }
    
    // Método para retornar todos os horários preenchidos pelo docente para serem tratados no JavaScript dentro do HTML
    public function recuperar()
    {
        echo json_encode($this->preferencias->view($this->semestreatual, $this->user['id_pro']));
        exit;
    }

}