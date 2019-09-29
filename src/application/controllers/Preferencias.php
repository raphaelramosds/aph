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

    // Método para retornar todos os horários preenchidos pelo docente para serem tratados no JavaScript dentro do HTML
    public function recuperar()
    {
        echo json_encode($this->preferencias->view($this->semestreatual, $this->user['id']));
        exit;
    }

    // Método exclusivo do administrador para ver a prefêrência de um docente em específico
    public function recuperarEnviada()
    {
        $id_preferencia = $this->input->post('id');
        echo json_encode($this->preferencias->viewAdmin($id_preferencia));
        exit;

    }

    public function add()
    {
        $docente = $this->input->post('idDocente');
        $resultado = $this->preferencias->analisarPreferencia($docente,$this->semestreatual);
        $this->preferencias->excluir($resultado->id);
        $verdes = $this->input->post('verdes');
        $amarelas = $this->input->post('amarelas');
        $vermelhas = $this->input->post('vermelhas');
        $reunioes = $this->input->post('reunioes');
        $atualizacao = array( 
            'justificativa' => $this->input->post('justificativa'),
            'situacao' => 1
        );
        $this->preferencias->add($resultado->id,$verdes,'green');
        $this->preferencias->add($resultado->id,$vermelhas,'red');
        $this->preferencias->add($resultado->id,$amarelas,'yellow');
        $this->preferencias->add($resultado->id,$reunioes,'blue');
        $this->preferencias->edit($atualizacao,$resultado->id);

        echo json_encode("Preferencias enviadas!");
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
        $texto = "<div class='alert alert-success' role='alert'>
          <h4 class='alert-heading'>Janela de preferências abertas</h4>
          <p>Agora os docentes podem enviar suas prefêrências para esse semestre..</p>
          <hr>
          <p class='mb-0'>Enquanto isso, observe que abaixo já foram colocados todos os professores que precisam enviar suas preferências. A todo momento você pode abrir e visualizar se eles já enviaram.</p>
        </div>";

        $this->session->set_flashdata('sucesso',$texto);
        $this->preferencias->abrir($this->semestreatual);
        redirect('Preferencias/enviadas');
    }

    public function reunioesPedagogicas()
    {
        $horariosReunioes = $this->grupos->horarioReunioes($this->user['id']);
        echo json_encode($horariosReunioes);
        exit;
    }

}