<div class="container ml-auto mr-auto " style="max-width:700px">

    <div class="row">

        <div class="col-md-12 p-3">
            <!-- Se nenhuma preferência tiver sido associada ao semestre corrente, ative o botão -->
            <?php 
                $this->db->select('situacao');
                $this->db->where('codigo',$semestreatual);
                $retorno = $this->db->get('acha_preferencia')->row_array();
            ?>

            <?php 
                $tolerancia = $this->db->get('acha_tolerancia')->row_array();
             ?>

            <?php if($this->session->flashdata('abertas')):?>
                <?=$this->session->flashdata('abertas')?>
            <?php endif;?>

            <?php if($tolerancia['data_limite'] != "0000-00-00"):?>
            <div class="alert alert-primary" role="alert">
                <i class="fa fa-clock"></i> Os docentes devem enviar suas preferências até: <span id="tempoLimite"><?=date('d/m/y',strtotime($tolerancia['data_limite']))?></span>
            </div>
            <?php endif?>

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#preferenciasEnviadas" role="tab" aria-controls="home" aria-selected="true">Histórico de preferências</a>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="preferenciasEnviadas" role="tabpanel" aria-labelledby="home-tab">       
                   <div class="col-md-12 p-3">
                        <div class="btn-group" role="group" aria-label="Exemplo básico">
                            <?php if($retorno):?>
                                <button id="abrirpreferencias" class="btn btn-outline-dark" onclick="location.href='<?=base_url('Preferencias/abrir')?>'" disabled>
                                <i class="fa fa-lock-open"></i> Abrir envio de preferências
                                </button>
                            <?php else:?>
                                <button id="abrirpreferencias" class="btn btn-outline-dark" onclick="location.href='<?=base_url('Preferencias/abrir')?>'" >
                                <i class="fa fa-lock-open"></i> Abrir envio de preferências
                                </button>
                            <?php endif;?>   
                            <button class="btn btn-outline-dark" id="datalimite"><i class="fa fa-clock"></i> Data limite para envio</button>  
<!--                             <button class="btn btn-success" id="exportarTudo"><i class="fa fa-external-link-alt"></i> Exportar todas</button>   -->
                        </div>
                     
                    </div>

                    <script>
                        $('#datalimite').click(function(e){
                            tempo = "";
                            e.preventDefault();
                            swal({
                                title:"Data limite para envio",
                                text: "Defina a data limite para os docentes enviarem as preferências de horários para esse semestre",
                                buttons:{
                                    confirm:{
                                        text:"Salvar data",
                                        closeModal:true,
                                        value:true,
                                        visible:true
                                    }
                                },
                                content: {
                                    element: "input",
                                    attributes: {
                                        placeholder: "Type your password",
                                        type: "date"

                                    }
                                }
                            }).then(function(inputValue){
                                // Requisição AJAX que cadastre a data limite no banco de dados
                                 if (inputValue === "") {
                                    swal({
                                        title:'Atenção',
                                        icon:'info',
                                        text:"Você precisa definir uma data!"
                                    });
                                    return false
                                }
                                else{
                                    $.ajax({
                                        type:'ajax',
                                        dataType:'json',
                                        method:'post',
                                        url:"<?=base_url('Preferencias/definirData')?>",
                                        data:{
                                            dataLimite:inputValue
                                        },
                                        
                                        error:function(data){
                                            // Alterar formato de data
                                            $('#tempoLimite').text(toBr(inputValue));
                                            swal('Sucesso','Tolerância atualizada com sucesso. Os professores poderão enviar suas preferências até '+toBr(inputValue),'success');
                                        }
                                    })
                                }
                            });
                        })

                        function toBr(data){
                            return data.replace(/(\d*)-(\d*)-(\d*).*/, '$3/$2/$1');
                        }
                    </script>

                    <div class="col-md-12 p-3">
                        <div class="dropdown">
                            <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span id="selecionado">Selecione o semestre</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <?php foreach($enviadas as $enviada):?>
                                    <button class="dropdown-item" onclick="ver('<?=$enviada->codigo?>')"><?=$enviada->codigo?></button>
                                <?php endforeach;?>
                            </div>
                        </div>

                    </div>
                    <table class="table table-striped" id="historico">
                    	<thead>
                    		<tr>
                            	<th colspan="2"><input class="form-control" type='text' placeholder='Pesquise pelo nome do docente'/></th>
                        	</tr>
                    	</thead>
                        <tbody id="todas">
                            
                        </tbody>
                    </table>
                </div>
              
  
                </div>
            </div>

        </div>

    </div>
</div>

<!-- Script para filtro -->
<script>
    function ver(semestre){
        $.ajax({
            type:'ajax',
            dataType:'json',
            method:'post',
            url: "<?=base_url('Preferencias/view')?>",
            data:{
                sem:semestre
            },
            success:function(data){
                $('#todas').empty();
                $('#selecionado').html(semestre);
                for (var i = 0; i < data.length; i++) {
                    $('#todas').append(
                        "<tr>"+
                            "<td>"+data[i].nome+"</td>"+
                            "<td class='text-right'>"+
                                "<button class='btn btn-outline-primary' id='botaoAbrir' data-toggle='modal' data-target='.bd-example-modal-lg' onclick='abrir("+data[i].id_preferencia+","+data[i].id_pro+","+data[i].codigo+")'> Abrir preferência</button>" +
                                // "<button class='btn btn-light' onclick='sucessoExportacao()'>Exportar</button>"+
                                // "<button class='btn btn-danger' onclick='exclusao()'><i class='far fa-trash-alt'></i></button>"+
                            "</td>"+
                        "</tr>"
                    );
                }
            }
        });

    }

    $(function(){
        $("#historico input").keyup(function(){     
            console.log('ta funcionando');   
            var index   = $(this).parent().index();
            var nth     = "#historico td:nth-child("+(index+1).toString()+")";
            var valor   = $(this).val().toUpperCase();
            $("#historico tr").show();
            $(nth).each(function(){
                if($(this).text().toUpperCase().indexOf(valor) < 0){
                    $(this).parent().hide();
                }
            });
        });
        $("#historico input").blur(function(){
            $(this).val("");
        }); 
    });

</script>

<?php 
    $dias = array('Seg','Ter','Qua','Qui','Sex');
    $horarios_manha = array(
        '1'=>'1&#176 Horário <br> 7h às 7:45h',
        '2'=>'2&#176 Horário <br> 7:45h às 8:30h',
        '3'=>'3&#176 Horário <br> 8:50 às 9:35h',
        '4'=>'4&#176 Horário <br> 9:35 às 10:20h',
        '5'=>'5&#176 Horário <br> 10:30 às 11:15h',
        '6'=>'6&#176 Horário <br> 11:15 às 12h'
    );    
    $horarios_tarde = array(
        '1'=>'1&#176 Horário <br> 13h às 13:45h',
        '2'=>'2&#176 Horário <br> 13:45h às 14:30h',
        '3'=>'3&#176 Horário <br> 14:50 às 15:35h',
        '4'=>'4&#176 Horário <br> 15:35 às 16:20h',
        '5'=>'5&#176 Horário <br> 16:30 às 17:15h',
        '6'=>'6&#176 Horário <br> 17:15 às 18h'
    );  
    $horarios_noite = array(
        '1'=>'1&#176 Horário <br> 19h às 19:45h',
        '2'=>'2&#176 Horário <br> 19:45h às 20:30h',
        '3'=>'3&#176 Horário <br> 20:40 às 21:25h',
        '4'=>'4&#176 Horário <br> 21:25 às 22:10h',
    );  
?>


<!-- Confirmação de exportação -->
<script>
    function exclusao(){
        swal("Arquivo excluído",{
            icon:"success"
        });
    }

    function sucessoExportacao(){
        swal("Operação sucedida!",{
            text:"Aguarde o salvamento do arquivo de dados (.xml) no seu computador.",
            icon:"success"
        });
    }

    $("#exportarTudo").click(function(){
       swal({
          title: "Atenção",
          text: "Fazendo isso você exportará as preferências de horários. Deseja mesmo fazê-lo?",
          icon: "warning",
          buttons: {
            confirm:"Sim",
            cancel: "Não"
          },
          dangerMode: true,
        })
        .then((willDelete) => {

          if (willDelete) {
            swal("Operação sucedida!",{
                text:"Aguarde o salvamento do arquivo de dados (.xml) no seu computador.",
                icon:"success"
            });
          } 

          else {
            swal("Operação cancelada!",{
                icon:"error"
            });
          }
        });
    })
</script>


<!-- Visualização de preferências -->

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Visualização da preferência</h5>
        </div>
        <div class="modal-body">

            <div onmouseover="mudarTurno('#manha .normal')">
                <b>Turno Matutino</b>
                <table class="tabela" id='manha'>
                    <tr>
                        <td class="vazio"></td>
                        <?php
                            for($i=0; $i < sizeof($dias); $i++):
                                echo "<td onclick='preencher($i)' class='dia'>$dias[$i]</td>";
                            endfor;
                        ?>                
                    </tr>
                    <?php
                        foreach($horarios_manha as $codigo=>$horario):
                            echo "<tr id='horarios'>";
                                echo "<td class='horario' onclick=\"horizontal($codigo, 'm')\">$horario</td>";
                                echo "<td class='normal' data-dia='2' onclick=\"preencherum('2m$codigo')\" data-horario='2m".$codigo."'></td>";
                                echo "<td class='normal' data-dia='3' onclick=\"preencherum('3m$codigo')\" data-horario='3m".$codigo."'></td>";
                                echo "<td class='normal' data-dia='4' onclick=\"preencherum('4m$codigo')\" data-horario='4m".$codigo."'></td>";
                                echo "<td class='normal' data-dia='5' onclick=\"preencherum('5m$codigo')\" data-horario='5m".$codigo."'></td>";
                                echo "<td class='normal' data-dia='6' onclick=\"preencherum('6m$codigo')\" data-horario='6m".$codigo."'></td>";
                            echo "</tr>";
                        endforeach;
                    ?>
                </table>
            </div>

            <div onmouseover="mudarTurno('#tarde .normal')">
                <hr>
                <b>Turno Vespertino</b>
                <table class="tabela" id='tarde'>
                    <tr>
                        <td class="vazio"></td>
                        <?php
                            for($i=0; $i < sizeof($dias); $i++):
                                echo "<td class='dia' onclick='preencher($i)'>$dias[$i]</td>";
                            endfor;
                        ?>                
                    </tr>
                    <?php
                        foreach($horarios_tarde as $codigo=>$horario):
                            echo "<tr>";
                                echo "<td class='horario' onclick=\"horizontal($codigo, 'v')\">$horario</td>";
                                echo "<td class='normal' onclick=\"preencherum('2v$codigo')\" data-dia='2' data-horario='2v".$codigo."'></td>";
                                echo "<td class='normal' onclick=\"preencherum('3v$codigo')\" data-dia='3' data-horario='3v".$codigo."'></td>";
                                echo "<td class='normal' onclick=\"preencherum('4v$codigo')\" data-dia='4' data-horario='4v".$codigo."'></td>";
                                echo "<td class='normal' onclick=\"preencherum('5v$codigo')\" data-dia='5' data-horario='5v".$codigo."'></td>";
                                echo "<td class='normal' onclick=\"preencherum('6v$codigo')\" data-dia='6' data-horario='6v".$codigo."'></td>";
                            echo "</tr>";
                        endforeach;
                    ?>
                </table>
            </div>

            <div onmouseover="mudarTurno('#noite .normal')">
                <hr>
                <b>Turno Noturno</b>
                <table class="tabela" id='noite'>
                    <tr>
                        <td class="vazio"></td>
                        <?php
                            for($i=0; $i < sizeof($dias); $i++):
                                echo "<td class='dia'  onclick='preencher($i)'>$dias[$i]</td>";
                            endfor;
                        ?>                
                    </tr>
                    <?php
                        foreach($horarios_noite as $codigo=>$horario):
                            echo "<tr>";
                                echo "<td class='horario' onclick=\"horizontal($codigo, 'n')\">$horario</td>";
                                echo "<td class='normal' onclick=\"preencherum('2n$codigo')\" data-dia='2' data-horario='2n".$codigo."'></td>";
                                echo "<td class='normal' onclick=\"preencherum('3n$codigo')\" data-dia='3' data-horario='3n".$codigo."'></td>";
                                echo "<td class='normal' onclick=\"preencherum('4n$codigo')\" data-dia='4' data-horario='4n".$codigo."'></td>";
                                echo "<td class='normal' onclick=\"preencherum('5n$codigo')\" data-dia='5' data-horario='5n".$codigo."'></td>";
                                echo "<td class='normal' onclick=\"preencherum('6n$codigo')\" data-dia='6' data-horario='6n".$codigo."'></td>";
                            echo "</tr>";
                        endforeach;
                    ?>
                </table>
                <hr>
            </div>

            <div class="col-md-12 p-3">
                <textarea  id="justificativa" class="form-control" name="justificativa" placeholder="Justificativa de preferências de impedimento " disabled></textarea>
            </div>
            <div class="col-md-12 p-3">
                <input type="hidden" id="campoIdentificacao">
                <input type="hidden" id="semestreatual">
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-success" id="salvar">Salvar alterações</button>
        </div>  

    </div>
  </div>
</div>

<script type="text/javascript">
    $('#salvar').click(function(){
          // Preferencias já validadas
        preferencias_verdes = [];
        preferencias_amarelas = [];
        preferencias_vermelhas = [];
        reunioes = [];

        $("#manha td, #tarde td, #noite td").each(function(){
            if($(this).data('horario') != undefined){
                // Faça com que ele reconheça as reuniões pedagógicas em azul como preferência obrigatória
                if($(this).hasClass('green')){
                    preferencias_verdes.push($(this).data('horario'));
                }
                else if($(this).hasClass('yellow')){
                    preferencias_amarelas.push($(this).data('horario'));
                }
                else if($(this).hasClass('red')){
                    preferencias_vermelhas.push($(this).data('horario'));
                }
                else if($(this).css('background-color') == "rgb(0, 0, 255)"){
                    reunioes.push($(this).data('horario'));
                }
            }
        })

        link = "<?=base_url('Horarios/add')?>";    

        $.ajax({
            type:'ajax',
            dataType:'json',
            method:'post',
            url: link,
            data:{
                idDocente:$("#campoIdentificacao").val(),
                verdes:preferencias_verdes,
                vermelhas:preferencias_vermelhas,
                amarelas:preferencias_amarelas,
                reunioes:reunioes,
                semestre:$("#semestreatual").val(),
                justificativa:$('#justificativa').val()
            },
            success:function(data){}
        });
        swal("Operação sucedida!",{
            text:"Preferência alterada com sucesso",
            icon:"success"
        });

    });

    function abrir(id,usuario, codigo){
        $("#semestreatual").val(codigo);
        $("#campoIdentificacao").val(usuario);
        // Sempre que o modal abrir, deixa em branco a tabela de preferência, para ela não ler a anterior. 
        $('#manha td, #tarde td, #noite td').each(function(){
            $(this).css('background-color','');
            $(this).removeClass('red');
            $(this).removeClass('green');
            $(this).removeClass('red');
        }) 

        $.ajax({
            type:'ajax',
            dataType:'json',
            method:'post',
            url: "<?=base_url('Preferencias/recuperarEnviada')?>",
            data: {id:id},
            success:function(data){
                horariosUsuario = data; 
                if(horariosUsuario != null){
                    $('#manha td, #tarde td, #noite td').each(function(){
                        horarios = $(this).data('horario');
                        if(horarios != null){
                            for(i=0; i < data.length; i++){
                                if(horariosUsuario[i].codigo == horarios){
                                    $(this).addClass(horariosUsuario[i].tipo);
                                    $(this).css('background-color',horariosUsuario[i].tipo);
                                }
                            }
                        }
                        
                    })                          
                }  
            } 
        })

        $.ajax({
            type:'ajax',
            dataType:'json',
            method:'post',
            url:"<?=base_url('Preferencias/recuperarPreferencia')?>",
            data:{id:id},
            success:function(data){
                console.log(data);
                $('#justificativa').val(data.justificativa);
            }
        })
    }   

</script>

<script src="<?=base_url('assets/js/preferencias.js')?>" >
</script>