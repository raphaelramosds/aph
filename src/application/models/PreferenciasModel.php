<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PreferenciasModel extends CI_Model 
{
    public function verEnviadas()
    {   
        // Esse método agrupa os semestres para que eles sejam manipulados no histórico
        $this->db->group_by('codigo');
        return $this->db->get('preferencia')->result();
    }

    public function view($semestre,$id)
    {
        /* select h.codigo, h.tipo from preferencia as p inner join horario as h on h.id_preferencia = p.id where p.id_usuario = 2 and p.codigo = "2019.2" */
        $this->db->select('h.codigo, h.tipo');
        $this->db->from('preferencia as p');
        $this->db->join('horario as h','h.id_preferencia = p.id');
        $this->db->where('p.id_usuario = '.$id);
        $this->db->where('p.codigo = '.$semestre);

        return $this->db->get()->result();
    }

    public function viewAdmin($id)
    {
        $this->db->select('codigo, tipo');
        $this->db->from('horario');
        $this->db->where('id_preferencia = '.$id);

        return $this->db->get()->result();
    }


    public function abrir($codigosemestre)
    {
        // Recupere id de todos os docentes (role = 2)
        $this->db->where('role',3);
        $docentes = $this->db->get('usuario')->result();

        // Adcione a preferência para o bimestre em questão para cada professor

        foreach($docentes as $docente)
        {
            // Se situacao = 0, docente ainda não cadastrou preferencias
            
            $data = array(
                'codigo' => $codigosemestre,
                'id_usuario' => $docente->id,
                'situacao' => 0
            );
            $this->db->insert('preferencia', $data);
        }
    }
    
    public function analisarPreferencia($id)
    {
        // Relacionar o usuário com o docente
        
        $q2 = "SELECT * FROM preferencia as p WHERE p.id_usuario =".$id." AND p.situacao = 0";
        return $this->db->query($q2)->row();
    }

    public function add($id_preferencia, $horarios, $tipo)
    {
        for($i=0;$i < sizeof($horarios);$i++)
        {
            $dados = array(
                'codigo' => $horarios[$i],
                'id_preferencia' => $id_preferencia,
                'tipo' => $tipo
            ); 
            $this->db->insert('horario',$dados);
        }
        
    }
}
