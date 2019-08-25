<div class="container ml-auto mr-auto " style="max-width:700px">
    <div class="row">
        <div class="col-md-12 p-3" >
            <h6>
                <i class="fas fa-user-circle"></i> <?=$this->session->userdata('usuario')['email']?>
            </h6>
        </div>
        <div class="col-md-12 p-3">
            <span>
                Semestre <?=$semestreatual?>
            </span>
            <p><?=date('d/m/Y')?></p>
        </div>
        <?php if($this->session->userdata('usuario')['role'] == 3):?>
            <?php
                $this->db->where('id_usuario',$this->session->userdata('usuario')['id']);
                $docente = $this->db->get('docente')->row();

                $this->db->where('id_docente', $docente->id);
                $this->db->where('semestre', $semestreatual);
                $status = $this->db->get('preferencia')->row();          
            ?>
            <div class="col-md-12">
                <div class="card" style="width: 100%;">
                    <div class="card-body ml-auto mr-auto">
                        <p class="card-text">
                            <div class="row">
                                <div class="col-md-3 text-center">
                                    <?php if($status->situacao == 0):?>
                                        <i style="" class="far fa-thumbs-down fa-3x"></i>
                                    <?php else:?>
                                        <i style="" class="far fa-thumbs-up fa-3x"></i>
                                    <?php endif;?>
                                </div>
                                <div class="col-md-9 text-center">
                                    <small>Estado das preferências</small> <br>
                                    <?php if($status->situacao == 0):?>
                                        <span>DESATUALIZADAS</span>
                                    <?php else:?>
                                        <span>ATUALIZADAS</span>
                                    <?php endif;?>
                                </div>
                            </div>
                        </p>
                    </div>
                </div>
            </div>
        <?php endif;?>
    </div>
</div>