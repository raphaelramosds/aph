<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuariosModel extends CI_Model {

    public function add($dados)
    {
        $this->db->insert('usuario',$dados);
    }

    // Filtrar o usuário pela role e/ou matricula

    public function search($matricula,$nome)
    {
        // Pesquise todos, menos o administrador
        $this->db->where('role != 1');
        $this->db->like('nome',$nome);
        $this->db->or_where('matricula',$matricula);
        return $this->db->get('usuario')->result();
    }
}
