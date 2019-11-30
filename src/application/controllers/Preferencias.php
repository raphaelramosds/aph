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
    
    public function criar()
    {
        $dados['semestreatual'] = $this->semestreatual;
        $this->load->view('Preferencias/create',$dados);   
    }

    // Método exclusivo do administrador para ver a prefêrência de um docente em específico
    public function recuperarEnviada()
    {
        $id_preferencia = $this->input->post('id');
        echo json_encode($this->preferencias->viewAdmin($id_preferencia));
        exit;

    }

    public function recuperarPreferencia(){
        $id_preferencia = $this->input->post('id');
        $this->db->where('id_preferencia',$id_preferencia);
        echo json_encode($this->db->get('acha_preferencia')->row_array());
        exit;
    }

    // O professor terá um tempo de tolerância para enviar suas preferências
    // Toda vez que ele enviar seus horários, o sistema vai excluir os existentes relacionados aquela preferências e adicionar os novos

    public function enviadas()
    {
        $dados['enviadas'] = $this->preferencias->verEnviadas();
        $dados['semestreatual'] = $this->semestreatual;
        $this->load->view('Preferencias/enviadas',$dados);
    }

    public function abrir()
    {

        $this->preferencias->abrir($this->semestreatual);
        $info="<div class='alert alert-success'  role='alert'>
                  <h4 class='alert-heading'>Janela de preferências abertas</h4>
                  <p>Agora os docentes podem enviar suas prefêrências para esse semestre..</p>
                  <hr>
                  <p class='mb-0'>Enquanto isso, observe que abaixo já foram colocados todos os professores que precisam enviar suas preferências. A todo momento você pode filtrar, abrir e visualizar se eles já enviaram.</p>
                  OBS: Você pode <b>definir/editar uma data limite deste semestre</b> para envio das preferências clicando no botão Data limite para envio. <br>
                  <hr>
                </div>";
        $this->session->set_flashdata('abertas',$info);
        redirect('Preferencias/enviadas');
    }

    public function reunioesPedagogicas()
    {
        $horariosReunioes = $this->grupos->horarioReunioes($this->user['id_pro']);
        echo json_encode($horariosReunioes);
        exit;
    }

    public function view()
    {
        $sem = $this->input->post('sem');
        // Recupere o id da preferência, a matrícula e o nome do usuário
        $this->db->select('acha_preferencia.id_preferencia, acha_preferencia.id_pro, acha_pro.matricula, acha_pro.nome, acha_preferencia.codigo');
        $this->db->from('acha_preferencia');
        $this->db->join('acha_pro','acha_pro.id_pro=acha_preferencia.id_pro');
        $this->db->where('codigo',$sem);
        echo json_encode($this->db->get()->result());
        exit;
    }

    // Definir data limite para envio das preferências
    public function definirData()
    {
        $this->db->set('data_limite',$this->input->post('dataLimite'));
        $this->db->update('acha_tolerancia');
        exit;
    }

}