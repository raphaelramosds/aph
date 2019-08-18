<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuariosModel extends CI_Model {

    public function add($dados){
        $this->db->insert('usuario',$dados);
    }

    // Filtrar o usuário pela role e/ou matricula

    public function search($role=null,$matricula){
        if($matricula != NULL):
            $this->db->from('usuario');
            $this->db->where('matricula',$matricula);
            return $this->db->get()->result();
        endif;
        
        if($role == 1):
            $this->db->from('usuario');
            $this->db->where('role',1);
            return $this->db->get()->result();
        elseif($role == 2):
            $this->db->from('usuario');
            $this->db->where('role',2);
            return $this->db->get()->result();
        else:
            $this->db->from('usuario');
            $this->db->where('role',3);
            return $this->db->get()->result();
        endif;
    }
}
