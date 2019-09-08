<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Preferencias extends CI_Controller 
{
    public $user;
    public $semestreatual;

    public function __construct()
    {
        parent::__construct();
        $this->load->view('Home/menu');
        $this->load->model('UsuariosModel','usuarios');
        $this->load->model('PreferenciasModel','preferencias');
        $this->load->model('GruposModel','grupos');

        $this->load->helper('date');

        // Recuperar semestre corrente
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

        $this->semestreatual = $ano.".".$semestre;
        $this->user = $this->session->userdata('usuario');

    }
    
    public function criar()
    {
        $dados['semestreatual'] = $this->semestreatual;
        $this->load->view('Preferencias/create',$dados);   
    }

    // Método para retornar todos os horários preenchidos pelo docente para serem tratados no JavaScript dentro do HTML
    public function recuperar()
    {
        echo json_encode($this->preferencias->view($this->semestreatual, $this->user['id']));
        exit;
    }


    // Toda vez que as preferências para aquele semestre forem ativadas, mude a situação da preferência para 1
    public function atualizarsituacao()
    {
        $this->db->where('codigo',$this->semestreatual);
        $this->db->set('situacao',1);
        $this->db->update('preferencia');
        exit;
    }

    public function registrarVerdes()
    {
        $preferencias = $this->input->post('preferencias');
        if($preferencias != NULL){
            $resultado = $this->preferencias->analisarPreferencia($this->user['id']);
            $this->preferencias->add($resultado->id, $preferencias,'green');
            echo json_encode($preferencias);
            exit;  
        }

    }

    public function registrarAmarelas()
    {
        $preferencias = $this->input->post('preferencias');
        if($preferencias != NULL){
            $resultado = $this->preferencias->analisarPreferencia($this->user['id']);
            $this->preferencias->add($resultado->id, $preferencias,'yellow');
            echo json_encode($preferencias);
            exit;
        }
    }

    public function registrarVermelhas()
    {
        $preferencias = $this->input->post('preferencias');
        if($preferencias != NULL){
            $resultado = $this->preferencias->analisarPreferencia($this->user['id']);
            $this->preferencias->add($resultado->id, $preferencias,'red');
            echo json_encode($preferencias);
            exit;
        }

    }

    public function enviadas()
    {
        $dados['semestreatual'] = $this->semestreatual;
        $this->load->view('Preferencias/enviadas',$dados);
    }

    public function abrir()
    {
        $this->preferencias->abrir($this->semestreatual);
        redirect('Preferencias/enviadas');
    }

}