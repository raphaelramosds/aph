<div class="container ml-auto mr-auto " style="max-width:700px">
    <div class="row">
        <div class="col-md-12 mt-5" >
            <h5>
                <i class="fas fa-user-circle"></i> Bem vindo, <?=$this->session->userdata('usuario')['nome']?>.
            </h5>
        </div>
        <div class="col-md-12 p-3">
            <span>
                Semestre <?=$semestreatual?>
            </span>
            <p><?=date('d/m/Y')?></p>
        </div>
            <?php
                $this->db->where('id_pro', $this->session->userdata('usuario')['id_pro']);
                $this->db->where('codigo', $semestreatual);
                $status = $this->db->get('acha_preferencia')->row();          
            ?>
            <?php if($status != NULL):?>
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
                                            <span style="color:#132235">NÃO PREENCHIDAS</span>
                                        <?php else:?>
                                            <span style="color:green">PREENCHIDAS</span>
                                        <?php endif;?>
                                    </div>
                                </div>
                            </p>
                        </div>
                    </div>
                </div>
            <?php else:?>
                <div class="col-md-12">
                    <div class="card" style="width: 100%;">
                        <div class="card-body ml-auto mr-auto">
                            <p class="card-text">
                                <div class="row">
                                    <div class="col-md-12">
                                        <b>Atenção:</b><small> Espere o membro da comissão abrir a janela de preferências para este semestre. Você não poderá enviar suas preferências enquanto isso não ocorrer.</small> <br>
                                    </div>
                                </div>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endif;?>
    </div>
</div>