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

    public function viewId(){
        $id = $this->input->post('id');
        echo json_encode($this->grupos->viewId($id));
        exit;
    }

    public function addParticipantes(){
        $docente = $this->input->post('idDocente');
        $grupo = $this->input->post('idGrupo');
        // Primeiro verifique se o usuário não escolheu o grupo de forma repetida
        $query = "SELECT * FROM acha_pro_grupo WHERE id_grupo = ".$grupo." AND id_pro = ".$docente;
        $retorno = $this->db->query($query)->result();
        if(!empty($retorno)):
            echo json_encode(0);
        else:
            $this->grupos->addDocente($docente,$grupo);
            echo json_encode('Sucesso na requisição');
        endif;
        exit;
    }

    public function deleteParticipantes(){
        $docente = $this->input->post('idDocente');
        $grupo = $this->input->post('idGrupo');
        $this->grupos->eliminarDocente($docente,$grupo);
        echo json_encode('Sucesso na requisição');
        exit;
    }
}