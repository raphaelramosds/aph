<div class="container ml-auto mr-auto " style="max-width:700px">
    <div class="row">
        <div class="col-md-12 p-3">
            <span>Preferências de horários dos docentes</span>
            <!--- <button class="botao-s">Exportar todas as Preferências</button>-->
            <!-- Se nenhuma preferência tiver sido associada ao semestre corrente, ative o botão -->
            <?php 
                $this->db->select('situacao');
                $this->db->where('codigo',$semestreatual);
                $retorno = $this->db->get('preferencia')->row_array();
            ?>

            <hr>
            
            <?php if($retorno):?>
                <button id="abrirpreferencias" class="btn btn-primary" onclick="location.href='<?=base_url('Preferencias/abrir')?>'" disabled>Abrir envio de preferências para este semestre</button>
            <?php else:?>
                <button id="abrirpreferencias" class="btn btn-primary" onclick="location.href='<?=base_url('Preferencias/abrir')?>'">Abrir envio de preferências para este semestre</button>
            <?php endif;?>
        </div>

        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <?php foreach($enviadas as $enviada):?>
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#<?=$enviada->codigo?>" role="tab" aria-controls="pills-home" aria-selected="true"><?=$enviada->codigo?></a>
                </li>
            <?php endforeach;?>
        </ul>

        </div class="col-md-12 p-3">
            <?php foreach($enviadas as $enviada):?>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="<?=$enviada->codigo?>" role="tabpanel" aria-labelledby="pills-home-tab">
                    <!-- Fazer consulta para recuperar as preferências enviadas pelos docentes -->
                    <?php
                        // Recupere o id da preferência, a matrícula e o nome do usuário
                        $this->db->select('preferencia.id,usuario.matricula,usuario.nome');
                        $this->db->from('preferencia');
                        $this->db->join('usuario','usuario.id=preferencia.id_usuario');
                        $this->db->where('codigo',$enviada->codigo);
                        $preferencias = $this->db->get()->result();
                        echo "<pre>".print_r($preferencias,true)."</pre>";
                    
                    ?>
                </div>
            </div>
            <?php endforeach;?>
        
        </div>

    </div>

</div>
