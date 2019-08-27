<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PreferenciasModel extends CI_Model 
{

    public function abrir($codigosemestre)
    {
        // Recupere id de todos os docentes
        $docentes = $this->db->get('docente')->result();

        // Adcione a preferência para o bimestre em questão para cada professor

        foreach($docentes as $docente)
        {
            // Se situacao = 0, docente ainda não cadastrou preferencias
            
            $data = array(
                'semestre' => $codigosemestre,
                'id_docente' => $docente->id,
                'situacao' => 0
            );
            $this->db->insert('preferencia', $data);
        }
    }
    
    public function analisarPreferencia($id)
    {
        // Relacionar o usuário com o docente
        $q = "SELECT d.id FROM docente as d WHERE d.id_usuario=".$id;
        $resultado = $this->db->query($q)->row();
        
        $q2 = "SELECT * FROM preferencia as p WHERE p.id_docente =".$resultado->id." AND p.situacao = 0";
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
