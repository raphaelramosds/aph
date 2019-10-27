<div id="content-wrapper">

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <?php if ($this->session->flashdata('nada')): ?>
                    <?=$this->session->flashdata('nada');?>
                <?php endif ?>
                <span class="d-block p-2 text-white title"><i class="fas fa-search"></i> Controle dos usuários</span>
                <form action="<?=base_url('admin/procurar')?>" method="POST">
                    <div class="p-3">
                        <input type="text" class="form-group campo-s" placeholder="Matrícula" name="matricula">
                        <input type="text" class="form-group campo-s" placeholder="Nome" name="nome">
                    </div>
                    <div class="p-3">
                        <input class="form-group" type="radio" value="0" name="apenasMembros" checked> Apenas Docentes <br>
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
                            <th>Matricula</th>
                            <th>Nome</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($resultado)): ?>
                            <?php foreach($resultado as $usuario):?>
                                <tr>
                                    <td><?=$usuario->matricula?></td>
                                    <td><?=$usuario->nome?></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <?php if($usuario->membro_comis == 0):?>
                                                    <button data-id="<?=$usuario->id_pro?>" id="incluir" class="dropdown-item">Incluir na comissão</button>
                                                <?php else:?>
                                                    <button data-id="<?=$usuario->id_pro?>" id="retirar" class="dropdown-item">Retirar da comissão</button>
                                                <?php endif;?>
                                                <button data-id="<?=$usuario->id_pro?>" data-nome="<?=$usuario->nome?>" class="dropdown-item verGrupos" data-toggle="modal" data-target="#grupo">Seus grupos</button>
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
</div>

<script>
    $(".verGrupos").click(function(e){
        e.preventDefault();

        nome = $(this).data('nome');
        id = $(this).data('id');

        $("#docente").text(nome);


        $.ajax({
            type:'ajax',
            dataType:'json',
            method:'post',
            url: "<?=base_url('Grupos/viewId')?>",
            data:{
                id:id,
            },
            success:function(data){
                // Grupos recebidos
                console.log(data);
            }
        }) 
        
        
    })

</script>

<!-- Modal -->
<div class="modal fade" id="grupo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><span id="docente"></span> pertence aos grupos:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Salvar mudanças</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">


    $("tr td #incluir").click(function(e){
        e.preventDefault();

        id = $(this).attr('data-id');
        self = this;

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
                swal({
                  title: "Sucesso!",
                  text: "Usuário incluído. Para achá-lo, filtre apenas membros da comissão.",
                  icon: "success"
                });   
                $(self).parents('tr').remove();
            }
        }) 
    });


    $('tr td #retirar').click(function(e){
        e.preventDefault();

        self = this;

        swal({
          title: "Tem certeza?",
          text: "Você poderá nomeá-lo novamente depois. Tem certeza que deseja fazê-lo?",
          icon: "warning",
          buttons: {
            confirm:"Sim",
            cancel: "Não"
          },
          dangerMode: true,
        })
        .then((willDelete) => {

          if (willDelete) {
            $.ajax({
                type:'ajax',
                dataType:'json',
                method:'post',
                url: "<?=base_url('admin/controleComissao')?>",
                data:{
                    usuario:$(this).attr('data-id'),
                    condicao:0
                },  
                success:function(data){
                    $(self).parents('tr').remove();
                    swal("O usuário da comissão foi retirado com succeso",{
                      icon: "success",
                    });   
                }
            })
          } 

          else {
            swal("Operação cancelada!",{
                icon:"error"
            });
          }

        });
    })

</script>

