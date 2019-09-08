<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GruposModel extends CI_Model 
{
    /*

    Recuperar todas as reuniões de grupo que estão relacionadas ao grupo que o professor pertence:

    select id_reuniao,codigo from reuniao_grupo as rg inner join reuniao as r on r.id=rg.id_reuniao
    where rg.id_grupo = (select g.id from grupo as g inner join usuario as u on u.id_grupo = g.id where u.id = 5)   

    */

    public function horarioReunioes($id_usuario)
    {
        $query = "SELECT id_reuniao,codigo from reuniao_grupo as rg inner join reuniao as r on r.id = rg.id_reuniao
        where rg.id_grupo = (select g.id from grupo as g inner join usuario as u on u.id_grupo = g.id where u.id=".$id_usuario.")";
        return $this->db->query($query)->result();

    }

    public function view()
    {
        return $this->db->get('grupo')->result();
    }
}
