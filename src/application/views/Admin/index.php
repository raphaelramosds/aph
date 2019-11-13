<?php  
    $this->db->where('membro_comis',1);
    $qtd = $this->db->count_all_results('acha_pro');
?>

<div id="content-wrapper">

<div class="container-fluid">
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <i class="fa fa-home"></i> Tela Administrativa
            </li>
          </ol>
        </nav>        
    </div>
    <div class="col-md-12">
        <div class="card" style="width: 100%;">
            <div class="card-body ml-auto mr-auto" >
                <p class="card-text">
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <i style="" class="fa fa-user fa-3x"></i>
                        </div>
                        <div class="col-md-9 text-center">
                            <small>Total de Membros da Comissão</small> <br>
                            <span><?=$qtd?></span>
                        </div>
                    </div>
                </p>
            </div>
        </div>
    </div>

</div>

</div>

