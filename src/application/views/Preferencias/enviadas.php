
<div class="container ml-auto mr-auto " style="max-width:700px">
    <div class="row">
        <div class="col-md-12 p-3">
            <?php if ($this->session->flashdata('sucesso')): ?>
                <?=$this->session->flashdata('sucesso')?>
            <?php endif ?>

            <!-- Se nenhuma preferência tiver sido associada ao semestre corrente, ative o botão -->
            <?php 
                $this->db->select('situacao');
                $this->db->where('codigo',$semestreatual);
                $retorno = $this->db->get('acha_preferencia')->row_array();
            ?>
        </div>

        <div class="col-md-12 p-3">
            <div class="btn-group" role="group" aria-label="Exemplo básico">
                <?php if($retorno):?>
                    <button id="abrirpreferencias" class="btn btn-success" onclick="location.href='<?=base_url('Preferencias/abrir')?>'" disabled>
                    Abrir envio de preferências para este semestre
                    </button>
                <?php else:?>
                    <button id="abrirpreferencias" class="btn btn-success" onclick="location.href='<?=base_url('Preferencias/abrir')?>'" >
                    Abrir envio de preferências para este semestre
                    </button>
                <?php endif;?>
                <button class="btn btn-white" data-toggle="modal" data-target="#exportarTudo">Exportar todas as Preferências</button>    
            </div>
         
        </div>

        <div class="col-md-12 p-3">
            <ul class="nav nav-tabs" id="pills-tab" role="tablist">
                <?php foreach($enviadas as $enviada):?>
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#<?=$enviada->codigo?>" role="tab" aria-controls="pills-home" aria-selected="true"><?=$enviada->codigo?></a>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>

        </div class="col-md-12 p-3">
            <?php foreach($enviadas as $enviada):?>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="<?=$enviada->codigo?>" role="tabpanel" aria-labelledby="pills-home-tab">
                    <!-- Fazer consulta para recuperar as preferências enviadas pelos docentes -->
                    <?php
                        // Recupere o id da preferência, a matrícula e o nome do usuário
                        $this->db->select('acha_preferencia.id_preferencia, acha_preferencia.id_pro, acha_pro.matricula, acha_pro.nome');
                        $this->db->from('acha_preferencia');
                        $this->db->join('acha_pro','acha_pro.id_pro=acha_preferencia.id_pro');
                        $this->db->where('codigo',$enviada->codigo);
                        $preferencias = $this->db->get()->result();
                        // echo "<pre>".print_r($preferencias,true)."</pre>";
                    
                    ?>
                    <table class="table">
                        <tbody>
                            <?php foreach ($preferencias as $key): ?>
                                <tr>
                                    <td><?=$key->matricula?></td>
                                    <td><?=$key->nome?></td>
                                    <td>
                                        <button class="btn btn-light" id="botaoAbrir" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="abrir(<?=$key->id_preferencia?>,<?=$key->id_pro?>)" >Abrir</button>
                                        <button class="btn btn-light" data-toggle="modal" data-target="#sucessoExportacao">Exportar</button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#exclusao"><i class="far fa-trash-alt"></i></button>
                                    </td>                             
                                </tr>
                            <?php endforeach ?>
                        </tbody>

                    </table>
                </div>
            </div>
            <?php endforeach;?>
        
        </div>

    </div>

</div>

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

<!-- Janela de sucesso de edição -->

<div class="modal fade" id="sucessoEdicao" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Sucesso</h5>
        </div>
      <div class="modal-body">
            <p>A preferência foi alterada com sucesso!</p>
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-default">Certo</button>
      </div>
    </div>

  </div>
</div>



<!-- Janela de sucesso de exportação -->

<div class="modal fade" id="sucessoExportacao" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Sucesso</h5>
        </div>
      <div class="modal-body">
            <p>Aguarde o salvamento do arquivo de dados (.xml) no seu computador.</p>
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-default">Certo</button>
      </div>
    </div>

  </div>
</div>


<!-- Confirmação de exportação -->

<div class="modal fade" id="exportarTudo" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Atenção</h5>
        </div>
        <div class="modal-body">
            <p>Fazendo isso você exportará todas as preferências de horários. Deseja mesmo fazê-lo?</p>
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-default">Sim</button>
            <button type="button" data-dismiss="modal" class="btn btn-danger">Não</button>
        </div>
    </div>

  </div>
</div>


<!-- Confirmação de exclusão -->

<div class="modal fade" id="exclusao" role="dialog">
  <div class="modal-dialog modal-md">

    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Atenção</h5>
        </div>
      <div class="modal-body">
            <p> Tem certeza que deseja excluir a preferência?</p>
      </div>
      <div class="modal-footer">
            <button class="btn btn-white" id="delete">Sim</button>
            <button data-dismiss="modal" class="btn btn-danger">Não</button>
      </div>
    </div>

  </div>
</div>

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
                <textarea  id="justificativa" class="form-control" name="justificativa" placeholder="Justificativa de preferências de impedimento "></textarea>
            </div>
            <div class="col-md-12 p-3">
                <input type="hidden" id="campoIdentificacao">
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

        link = "<?=base_url('Preferencias/add')?>";    

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
                justificativa:$('#justificativa').val()
            },
            success:function(data){}
        });

        $('.bd-example-modal-lg').modal('hide');
        $('#sucessoEdicao').modal('show');

    });

    function abrir(id,usuario){
        $("#campoIdentificacao").val(usuario);
        // Sempre que o modal abrir, deixa em branco a tabela de preferência, para ela não ler a anterior. 
        $('#manha td, #tarde td, #noite td').each(function(){
            $(this).css('background-color','white');
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
    }   

</script>

<script src="<?=base_url('assets/js/preferencias.js')?>" >
</script>