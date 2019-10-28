<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GruposModel extends CI_Model 
{
    public function view(){
        return $this->db->get('acha_grupo')->result();
    }


    // Recuperar todas as reuniões de grupo que estão relacionadas ao grupo que o professor pertence:
    public function horarioReunioes($id_usuario)
    {
        /*
            SELECT r.id_reuniao,r.codigo from acha_reuniao_grupo as rg inner join acha_reuniao as r on r.id_reuniao = rg.id_reuniao inner join acha_pro_grupo as ag on ag.id_grupo = rg.id_grupo where ag.id_pro = 72
        */
        $query = "SELECT r.id_reuniao,r.codigo from acha_reuniao_grupo as rg inner join acha_reuniao as r on r.id_reuniao = rg.id_reuniao inner join acha_pro_grupo as ag on ag.id_grupo = rg.id_grupo where ag.id_pro =".$id_usuario;
        return $this->db->query($query)->result();

    }
    
    // Método para retornar as reuniões do grupo escolhido (recuperar todos os id das reuniões e grupos)
    public function reunioesDoGrupo($grupo)
    {

    }

    // Adicionar e Deletar novos horários de reunião para serem escolhidas no método acima
    public function addReuniao()
    {

    }

    public function deleteReuniao()
    {

    }

    // Recuperar grupos de um professor 
    public function viewId($id){
    /* Recuperar todos os grupos que um professor faz parte */
        $query = "SELECT g.nome, g.id_grupo from acha_grupo as g inner join acha_pro_grupo as ag on g.id_grupo = ag.id_grupo where ag.id_pro = ".$id;
        return $this->db->query($query)->result();
    }
 

    // Adiciocar docente a algum grupo
    public function addDocente($docente,$grupo)
    {
        $insert = array(
            'id_pro' => $docente,
            'id_grupo' => $grupo
        );
        $this->db->insert('acha_pro_grupo',$insert);
    }

    public function eliminarDocente($docente,$grupo)
    {
        $this->db->where('id_grupo',$grupo);
        $this->db->where('id_pro',$docente);
        $this->db->delete('acha_pro_grupo');
    }

}
