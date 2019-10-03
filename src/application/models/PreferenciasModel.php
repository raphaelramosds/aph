<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PreferenciasModel extends CI_Model 
{
    public function verEnviadas()
    {   
        // Esse método agrupa os semestres para que eles sejam manipulados no histórico
        $this->db->group_by('codigo');
        return $this->db->get('acha_preferencia')->result();
    }

    public function view($semestre,$id)
    {
        /* select h.codigo, h.tipo from preferencia as p inner join horario as h on h.id_preferencia = p.id where p.id_usuario = 2 and p.codigo = "2019.2" */

        $this->db->select('h.codigo, h.tipo');
        $this->db->from('acha_preferencia as p');
        $this->db->join('acha_horario as h','h.id_preferencia = p.id_preferencia');
        $this->db->where('p.id_pro = '.$id);
        $this->db->where('p.codigo = '.$semestre);

        return $this->db->get()->result();
    }

    public function viewAdmin($id)
    {
        $this->db->select('codigo, tipo');
        $this->db->from('acha_horario');
        $this->db->where('id_preferencia = '.$id);

        return $this->db->get()->result();
    }


    public function abrir($codigosemestre)
    {
        // Recupere id de todos os docentes e os próprios membros da comissão 
        $this->db->where('membro_comis',0);
        $this->db->or_where('membro_comis',1);
        $docentes = $this->db->get('acha_pro')->result();

        // Adcione a preferência para o bimestre em questão para cada professor

        foreach($docentes as $docente)
        {
            // Se situacao = 0, docente ainda não cadastrou preferencias
            
            $data = array(
                'codigo' => $codigosemestre,
                'id_pro' => $docente->id_pro,
                'situacao' => 0
            );
            $this->db->insert('acha_preferencia', $data);
        }
    }
    
    public function analisarPreferencia($id,$semestre)
    {
        // Relacionar o usuário com o docente
        
        $q2 = "SELECT * FROM acha_preferencia as p WHERE p.id_pro =".$id." AND p.codigo = '".$semestre."'";
        return $this->db->query($q2)->row();
    }

    public function add($id_preferencia, $horarios, $tipo)
    {
        for($i=0;$i < sizeof($horarios);$i++)
        {
            $dados = array(
                'codigo' => $horarios[$i],
                'id_preferencia' => $id_preferencia,
                'tipo' => $tipo,
            ); 
            $this->db->insert('acha_horario',$dados);
        }
        
    }

    public function edit($dados,$idpreferencia)
    {
        $this->db->where('id_preferencia',$idpreferencia);
        $this->db->set($dados);
        $this->db->update('acha_preferencia');
    }

    public function excluir($id)
    {
        // select id from preferencia where codigo = $semestre and id_usuario = $usuario
        // delete from horario where id_preferencia = id
        $this->db->where('id_preferencia='.$id);
        $this->db->delete('acha_horario');

    }
}
