
<div class="container ml-auto mr-auto " style="max-width:700px; padding-top:50px;">
    <div class="row">
        <div class="col-md-12 p-3">
            <?php if ($this->session->flashdata('nada')): ?>
                <?=$this->session->flashdata('nada');?>
            <?php endif ?>
            <h5>Filtro de usuários</h5>
            <form action="<?=base_url('admin/procurar')?>" method="POST">
                <div class="p-3">
                    <input type="text" class="form-group campo-s" placeholder="Matrícula" name="matricula">
                    <input type="text" class="form-group campo-s" placeholder="Nome" name="nome">
                </div>
                <div class="p-3">
                    <input class="form-group" type="radio" value="0" name="apenasMembros" checked> Todos <br>
                    <input class="form-group" type="radio" value="1" name="apenasMembros"> Apenas membros da comissão
                </div>

                <div class="form-group">
                    <button class="botao-s">Filtrar</button>    
                </div>
            </form>
        </div>
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Matrícula</th>
                        <th>Nome</th>
                        <th>Senha</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($resultado)): ?>
                        <?php foreach($resultado as $usuario):?>
                            <tr>
                                <td><?=$usuario->matricula?></td>
                                <td><?=$usuario->nome?></td>
                                <td><?=$usuario->senha?></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="preencher(<?=$usuario->id_pro?>)">
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <?php if($usuario->membro_comis == 0):?>
                                                <button onclick="incluir(<?=$usuario->id_pro?>)" class="dropdown-item" href="#">Incluir na comissão</button>
                                            <?php else:?>
                                                <button  data-toggle="modal" data-target="#confirmacaoRetirar" class="dropdown-item" href="#">Retirar da comissão</button>
                                            <?php endif;?>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach;?>

                        <?php if($resultado == NULL):?>
                            <div class='alert alert-info' role='alert'><b class="larger">OPS!</b> Nennhum registro foi encontrado. Tente novamente.</div>
                        <?php endif;?>

                    <?php endif; ?>
                
                </tbody>
            </table>
        </div>
     </div>
 </div>

<!-- Confirmação da retiradas -->

<div class="modal fade" id="confirmacaoRetirar" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Atenção</h5>
        </div>
      <div class="modal-body">
            <p>Ao fazer isso, você retira esse usuário da comissão de horários. Entretanto, você poderá nomeá-lo novamente depois. Tem certeza que deseja fazê-lo?</p>
            <input type="hidden" id="excludente" type="number">
      </div>
      <div class="modal-footer">
        <button type="button" id="retirar" data-dismiss="modal" class="btn btn-default">Sim</button>
        <button type="button" data-dismiss="modal" class="btn btn-danger">Não</button>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">

    function preencher(request){$("#excludente").val(request);}

    function incluir(id){
        $.ajax({
            type:'ajax',
            dataType:'json',
            method:'post',
            url: "<?=base_url('admin/controleComissao')?>",
            data:{
                usuario:id,
                condicao:1
            },
            success:function(data){
                alert(data);
                location.href='<?=base_url('admin/filtragem')?>';
            }
        })
    }


    $('#retirar').click(function(){
        $.ajax({
            type:'ajax',
            dataType:'json',
            method:'post',
            url: "<?=base_url('admin/controleComissao')?>",
            data:{
                usuario:$("#excludente").val(),
                condicao:0
            },
            success:function(data){
                alert(data);
                location.href='<?=base_url('admin/filtragem')?>';
            }
        })
    })
</script>
