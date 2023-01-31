<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuariosModel extends CI_Model {

    public function view($matricula)
    {
        $this->db->where('matricula',$matricula);
        return $this->db->get('acha_pro')->row_array();
    }
    // Filtrar o usuário pela role e/ou matricula
    public function search($matricula,$nome,$membro)
    {
        // Pesquise todos, menos o administrador
        $this->db->where('membro_comis !='. 2);

        if($matricula != NULL)
        {
            $this->db->where('matricula',$matricula);
        }
        else if($nome != NULL)
        {
            $this->db->like('nome',$nome);  
        }
        if($membro == 0)
        {
            $this->db->where('membro_comis',$membro);
        }
        if($membro == 1)
        {
         $this->db->where('membro_comis',$membro);   
        }
        $this->db->order_by('nome','asc');

        return $this->db->get('acha_pro')->result();
    }

    public function EditMembrosComis($condicao,$id)
    {
        // Se for verdadeiro, insira o usuário na comissão (1)
        if($condicao != 0)
        {
            $this->db->set('membro_comis',1);
            $this->db->where('id_pro',$id);        
            $this->db->update('acha_pro');
            return "Membro adicionado";
        }
        else
        {
            $this->db->set('membro_comis',0);
            $this->db->where('id_pro',$id);  
            $this->db->update('acha_pro'); 
            return "Membro retirado";
        }

    }

    public function add($dados)
    {
        $this->db->insert('acha_pro',$dados);
    }
}
