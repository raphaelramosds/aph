<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PreferenciasModel extends CI_Model {

    public function abrir($codigosemestre){
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

}
