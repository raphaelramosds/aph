<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GruposModel extends CI_Model 
{
    /*

    Recuperar todas as reuniões de grupo que estão relacionadas ao grupo que o professor pertence:

    select r.id_reuniao,r.codigo from acha_reuniao_grupo as rg inner join acha_reuniao as r on  r.id_reuniao = rg.id_reuniao where rg.id_grupo = (select g.id_grupo from acha_pro_grupo as g inner join acha_pro as u on u.id_pro = g.id_pro where u.id_pro= 1)
    */

    public function horarioReunioes($id_usuario)
    {
        $query = "SELECT r.id_reuniao,r.codigo from acha_reuniao_grupo as rg inner join acha_reuniao as r on  r.id_reuniao = rg.id_reuniao where rg.id_grupo = (select g.id_grupo from acha_pro_grupo as g inner join acha_pro as u on u.id_pro = g.id_pro where u.id_pro=".$id_usuario.")";
        return $this->db->query($query)->result();

    }

}
