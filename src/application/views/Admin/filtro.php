<div id="content-wrapper">

    <div class="container-fluid">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                Controle de usuários
            </li>
          </ol>
        </nav>
        <div class="row">

            <div class="col-md-12">
                <?php if ($this->session->flashdata('nada')): ?>
                    <?=$this->session->flashdata('nada');?>
                <?php endif ?>
                <form action="<?=base_url('admin/procurar')?>" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Matrícula" name="matricula">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nome" name="nome">
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input" id="defaultUnchecked" name="apenasMembros" value="1">
                      <label class="custom-control-label" for="defaultUnchecked">Apenas membros da comissão</label>
                    </div>

                    <!-- Default checked -->
                    <div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input" id="defaultChecked" name="apenasMembros" value="0" checked>
                      <label class="custom-control-label" for="defaultChecked">Apenas docentes</label>
                    </div>

                    <div class="form-group float-right">
                        <div class="sm-3">
                            <button class="btn btn-primary">
                                <i class="fas fa-search"></i> Buscar
                            </button>    
                        </div>
                    </div>
                </form>
            </div>

            <?php if(isset($resultado)): ?>
            <div class="col-md-12">
                <table class="table table-striped" >
                    <thead>
                        <tr>
                            <th>Matricula</th>
                            <th>Nome do docente</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
   
                            <?php foreach($resultado as $usuario):?>
                                <tr>
                                    <td><?=$usuario->matricula?></td>
                                    <td><?=$usuario->nome?></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Ação
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <?php if($usuario->membro_comis == 0):?>
                                                    <button data-id="<?=$usuario->id_pro?>" id="incluir" class="dropdown-item">Incluir na comissão</button>
                                                <?php else:?>
                                                    <button data-id="<?=$usuario->id_pro?>" id="retirar" class="dropdown-item">Retirar da comissão</button>
                                                <?php endif;?>
                                                <button data-id="<?=$usuario->id_pro?>" data-nome="<?=$usuario->nome?>" class="dropdown-item verGrupos" data-toggle="modal" data-target="#grupo">Grupos</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach;?>

                            <?php if($resultado == NULL):?>
                                <div class='alert alert-info' role='alert'><b class="larger">OPS!</b> Nennhum registro foi encontrado. Tente novamente.</div>
                            <?php endif;?>
                    
                    </tbody>
                </table>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
    $(".verGrupos").click(function(e){
        e.preventDefault();
        const nome = $(this).data('nome');
        const id = $(this).data('id');
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
                grupos = "<ul class='list-group' data-docente='"+id+"'>";
                // Grupos recebidos
                $(data).each(function(index, element){
                    grupos += "<li class='list-group-item remover' onclick='remover("+id+","+element.id_grupo+")' data-grupo='"+element.id_grupo+"' style='cursor:pointer'> <i  class='fas fa-times' style='letter-spacing: 6px;'></i> "+element.nome+"</li>";
                });
                grupos += "</ul>";
                // Identificar o docente
                $('.listaGrupos').html(grupos);
            }
        }) 
        
        
    })

</script>

<style>
    .remover{
        transition:.2s all;
    }
    .remover:hover{
        color:red;
    }
</style>

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
        <div class='listaGrupos'>

        </div>
        <hr>
        <div class="form-group">
            <label>Adicione a um novo grupo</label>
            <select class="form-control adicionar">
                <option value="">Selecione algum grupo</option>
                <?php foreach($grupos as $grupo):?>
                    <option data-nome="<?=$grupo->nome?>" value="<?=$grupo->id_grupo?>"><?=$grupo->nome?></option>
                <?php endforeach;?>
            </select>
            <script>
                $(".adicionar").change(function(){
                    grupoId = $(this).val();
                    docenteId = $('.list-group').data('docente');
                    // Script para adicionar novos grupos ao docente no AJAX
                    $.ajax({
                        type:'ajax',
                        dataType:'json',
                        method:'post',
                        url: "<?=base_url('Grupos/addParticipantes')?>",
                        data:{
                            idDocente:docenteId,
                            idGrupo:grupoId
                        },       
                        success:function(data){
                            if(data == 0){
                                swal("O usuário já está neste grupo!",{
                                    title:"Não podemos adicionar",
                                    icon:"info",
                                    button:'Certo, irei rever.'

                                });
                            }
                            else{
                                nomeGrupo = $("option[value='"+grupoId+"']").data('nome');
                                $('.list-group').append("<li class='list-group-item remover' onclick='remover("+docenteId+","+grupoId+")' data-grupo='"+grupoId+"' style='cursor:pointer'> <i class='fas fa-times' style='letter-spacing: 6px;'></i> "+nomeGrupo+"</li>");
                            }
                            
                        },
                        error:function(data){
                            console.log(data);
                        }
                    });
                })
            </script>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

    function remover(docente,grupo){
        
        swal({
          title: "Tem certeza?",
          text: "Deseja realmente tirá-lo do grupo?",
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
                url: "<?=base_url('Grupos/deleteParticipantes')?>",
                data:{
                    idDocente:docente,
                    idGrupo:grupo
                },  
                success:function(data){
                    itens = $(".remover");
                    itens.each(function(index,element){
                        if($(element).data('grupo') == grupo){
                            $(element).remove();
                        }
                    })
                    
                    swal("O docente foi retirado com succeso",{
                      icon: "success"
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
    }

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