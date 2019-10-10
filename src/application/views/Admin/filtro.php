<div id="content-wrapper">

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
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
                            <th>Nome</th>
                            <th>Senha</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($resultado)): ?>
                            <?php foreach($resultado as $usuario):?>
                                <tr>
                                    <td><?=$usuario->nome?></td>
                                    <td><?=$usuario->senha?></td>
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
