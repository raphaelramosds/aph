<div class="container ml-auto mr-auto " style="max-width:700px">
    <div class="row">
        <div class="col-md-12 p-3" >
            <h5>
                <i class="fas fa-user-circle"></i> Docente do sistema
            </h5>
        </div>
        <div class="col-md-12 p-3">
            <span>
                <?php  
                if(date('m') > 6){echo "Segundo semestre";}
                else {echo "Primeiro semestre";}
                ?>
            </span>
            <p><?=date('d/m/Y')?></p>
        </div>
        <div class="col-md-6">
            <div class="card" style="width: 100%;">
                <div class="card-body ml-auto mr-auto">
                    <p class="card-text">
                        <div class="row">
                            <div class="col-md-2 text-center">
                                <i style="" class="far fa-thumbs-up fa-2x"></i>
                            </div>
                            <div class="col-md-10 text-center">
                                <small>Estado das preferências</small> <br>
                                <span>ATUALIZADAS</span>
                            </div>
                        </div>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 text-center p-3">
            <i class="fas fa-clock fa-5x"></i> <br>
            <b>16/06/2019</b>
            <p>TÉRMINO DO SEMESTRE</p>
        </div>
    </div>
</div>