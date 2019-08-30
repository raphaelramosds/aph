<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CursoModel extends CI_Model {

    public function view(){
        return $this->db->get('curso')->result();
    }
}