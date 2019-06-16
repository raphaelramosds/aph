<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GruposModel extends CI_Model {

    public function view(){
        return $this->db->get('grupo')->result();
    }
}
