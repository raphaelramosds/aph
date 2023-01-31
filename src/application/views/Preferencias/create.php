<link rel="stylesheet" href="<?=base_url('assets/css/boxrules.css')?>">
<!-- Div para receber os alertas do script -->
<div id="alert">
    <div class="title text-center">
        <b>Regras de preenchimento</b>
        <hr>
    </div>
    <div class="content">
        <ul>
            <li id="regraVerdes">
                Disponibilizar, em verde, no mínimo: 
                <ul>
                    <li>36 h/a para regimes de 40h</li>
                    <li>30 h/a para regimes com turno noturno</li>
                    <li>20 h/a para turnos exclusivamente noturnos</li>
                </ul>  
            </li><hr>
            <li id="regraVermelho">Havendo indisponibilidade, preencha no máximo 12 h/a em vermelho</li><hr>
            <li id="regraSSQ">Disponibilizar ao menos os dias de segunda ou sexta-feira e obrigatoriamente quarta-feira (salvo casos especiais)</li>
        </ul>
    </div>
</div>

<div class="container ml-auto mr-auto " style="max-width:700px">
    <div class="row">
        <div class="col-md-12 p-3">
            <span>
                <?php  
                if(date('m') > 6){echo "<b>Segundo semestre</b>";}
                else {echo "<b>Primeiro semestre</b>";}
                ?>
            </span>
            <p><?=date('d/m/Y')?></p>
            <hr> 

            <?php 
                $tolerancia = $this->db->get('acha_tolerancia')->row_array();
                $data_limite = date('d/m/y',strtotime($tolerancia['data_limite']));
             ?>

            <?php if ($data_limite == date('d/m/y')): ?>
            <div class="alert alert-warning" role="alert">
                <i class="fa fa-clock"></i> Você pode editar as suas preferências até hoje!</span>
            </div>  
            <?php elseif($data_limite == "0000-00-00"):?>
            <div> </div>
            <?php elseif(date('d/m/y') > $data_limite): ?>
            <div class="alert alert-danger" role="alert">
                <i class="fa fa-clock"></i> Tempo expirado para envio de preferências!</span>
            </div>  
            <?php else: ?>
            <div class="alert alert-primary" role="alert">
                <i class="fa fa-clock"></i> Suas preferências devem ser enviadas até: 
                <b><?=$data_limite?></b>
            </div>
            <?php endif; ?>
            <!-- Script para preencher os horários das reuniões pedagógicas do grupo que o docente pertence -->
            <!-- Script para preencher as preferências de horários dentro da tabela, recuperando dados do controller  -->

            <script>
                $(document).ready(function(){
                    $.ajax({
                        type:'ajax',
                        dataType:'json',
                        method:'post',
                        url: "<?=base_url('Preferencias/reunioesPedagogicas')?>",
                        success:function(data){
                            reunioes = data;
                            $('#manha td, #tarde td, #noite td').each(function(){
                                horarios = $(this).data('horario');
                                if(horarios != null){
                                    for(i=0; i < data.length; i++){
                                        if(reunioes[i].codigo == horarios){
                                            $(this).css('background-color','blue');
                                            $(this).addClass('blue');
                                        }
                                    }
                                }  
                            }) 
                        }
                    
                    });
                    $.ajax({
                        type:'ajax',
                        dataType:'json',
                        method:'post',
                        url: "<?=base_url('Horarios/recuperar')?>",
                        success:function(data){
                            horariosUsuario = data;
                            // Percorrer toda as tabelas e onde ele achar igualdade entre os codigos de horário, fazer com que ele preencha com a cor vigente
                            // OBS: Esse procedimento apenas é realizado quando não houver preferência nula
                            // Exemplo: O código 2m1 foi encontrado, então, pelo banco de dados, preencha ele com a cor verde.
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
                })
            </script>
           
            <label for="">
                
                <select id="turno" class="custom-select"><span style="color:red">*</span>
                    <option value="nenhum">Em qual(is) turno(s) você dará aula?</option>
                    <option value="mv">Matutino e Vespertino</option>
                    <option value="mn">Matutino e Noturno</option>
                    <option value="vn">Vespertino e Noturno</option>
                    <option value="n">Noturno</option>
                    <option value="v">Vespertino</option>
                    <option value="m">Matutino</option>
                    <option value="mvn">Todos</option>
                </select>
            </label>

<!--            
        <label for="">
                Repetir preferências do semestre anterior? <span style="color:red">*</span>
                <input type="radio" name="repetir"> Sim
                <input type="radio" name="repetir"> Não
            </label> -->
            
            <hr>
            
        </div>
        <div class="col-md-12">
            <div class="bloco"  style="background:red"></div> Indisponibilidade com justificativa <br>
            <div class="bloco"  style="background:yellow"></div> Preferência alternativa/opcional <br>
            <div class="bloco"  style="background:green"></div> Preferência <br>
            <div class="bloco"  style="background:blue"></div> Reuniões
        </div>
        <!-- 
            xyz
            x = Dia da semana (Segunda 2, Terça 3, Quarta 4, Quinta 5, Sexta 6)
            y = Turno (manhã tarde e noite)
            z = Horário (7h 1, 7:45 2, (...) )
            Ex.: 2M1 (Primeiro horário da segunda feira)
            Ex.: 2M2 (Segundo horário da segunda feria)
        -->
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

        <div class="col-md-12 p-3" id='matutino' onmouseover="mudarTurno('#manha .normal')">
            <hr>
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

        <div class="col-md-12 p-3" id='vespertino' onmouseover="mudarTurno('#tarde .normal')">
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

        <div class="col-md-12 p-3" id='noturno' onmouseover="mudarTurno('#noite .normal')">
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
        <?php
            $id_usuario = $this->session->userdata('usuario')['id_pro'];
            $this->db->where('codigo',$semestreatual);
            $this->db->where('id_pro',$id_usuario);
            $retorno = $this->db->get('acha_preferencia')->row_array();
        ?>

        <div class="col-md-12 p-3">
            <textarea  id="justificativa" cols="78" rows="10" name="justificativa" placeholder="Justificativa de preferências de impedimento ">
                <?= (isset($retorno['justificativa'])) ? $retorno['justificativa'] : ''?>
            </textarea>
        </div>

        <div class="col-md-12 p-3">
            <!-- Apenas exiba o botão caso a janela de preferências abrir -->
            <?php 
                if($retorno != NULL):
                    echo "<button class='btn btn-outline-success' data-id='".$id_usuario."' id='recuperar'>Enviar preferências</button>";
                endif;    
            ?>
        </div>

    </div>
</div>

<!-- Como é o docente quem vai enviar as preferências, o sistema deve identificar o semestre atual -->
<input type="hidden" value="<?=$semestreatual?>" id="semestreatual">
            
<script>      
    // Filtrar tabelas conforme o turno escolhido
    $('#turno').change(function(){
        turno = $(this).val()
        $('#vespertino,#matutino,#noturno').fadeIn('slow');
        if(turno == 'mv'){
            $('#noturno').fadeOut("slow");
        }
        if(turno == 'vn'){
            $('#matutino').fadeOut("slow");
        }
        if(turno == 'mn'){
            $('#vespertino').fadeOut("slow");
        }
        if(turno == 'm'){
            $('#noturno').fadeOut("slow");
            $('#vespertino').fadeOut("slow");
        }
        if(turno == 'v'){
            $('#noturno').fadeOut("slow");
            $('#matutino').fadeOut("slow");
        }
        if(turno == 'n'){
            $('#vespertino').fadeOut("slow");
            $('#matutino').fadeOut("slow");
        }
    })
    $('#recuperar').click(function(){
        idusuario = $(this).data('id');
        turno = $('#turno').val();
        // Verifique se o turno foi informado
        if(turno != 'nenhum'){
            $("#turno").removeClass('is-invalid');
            $("#turno").addClass('is-valid', false);
            manha = [];
            tarde = [];
            noite = [];
            vermelhos = [];
            verdes = [];
            amarelos = [];
            // Contar como obrigatória os horários de reuniões
            $('#manha .blue, #tarde .blue, #noite .blue').each(function(){
                verdes.push($(this).data('dia'));
            })
            // Verificar se a quantidade mínima de blocos em amarelo foi preenchida
            $('#manha .yellow, #tarde .yellow, #noite .yellow').each(function(){
                amarelos.push($(this).data('dia'));
            })
            // Recuperar horários em vermelho de todos os turnos (se exceder 12, invalide)
            $('#manha .red, #tarde .red, #noite .red').each(function(){
                $(this).data('horario');
                vermelhos.push($(this).data('dia'));
            });     
            // Verificar se segunda ou sexta e quarta foram marcadas
            $('#manha .green, #manha .yellow').each(function(){
                manha.push($(this).data('dia'));
            });
            $('#tarde .green, #tarde .yellow').each(function(){
                tarde.push($(this).data('dia'));
            });
            $('#noite .green, #noite .yellow').each(function(){
                noite.push($(this).data('dia'));
            });
            
            // Horários em vermelho
            maximovermelhos(vermelhos);
            // 36 h/a para horários em verde
            // Disponibilizar segunda ou sexta além da quarta
            if(turno == 'mv'){
                $('#manha .green, #tarde .green').each(function(){
                    verdes.push($(this).data('dia'));
                })
                minimoverdes(verdes);
                disponibilizarssq(manha);
                disponibilizarssq(tarde);
            }
            if(turno == 'mn'){
                $('#manha .green, #noite .green').each(function(){
                    verdes.push($(this).data('dia'));
                })
                minimoverdes(verdes);
                /* Caso o turno escolhido for manhã-noite ou tarde-noite, verifique se 
                em algum dos dois a condição não é seguida */
                disponibilizarssq(manha);
                disponibilizarssq(noite);
            }
            
            if(turno == 'vn'){
                $('#tarde .green, #noite .green').each(function(){
                    verdes.push($(this).data('dia'));
                })
                minimoverdes(verdes);
                disponibilizarssq(tarde);
                disponibilizarssq(noite);
                
            }
            // Se ele escolher apenas um turno, aceite no mínimo 30 h/a em verde (a noite não conta)
            if(turno == 'm'){
                $('#manha .green').each(function(){
                    verdes.push($(this).data('dia'));
                })
                disponibilizarssq(manha);
                minimoverdes(verdes);
            }
            if(turno == 'v'){
                $('#tarde .green').each(function(){
                    verdes.push($(this).data('dia'));
                })
                disponibilizarssq(tarde);
                minimoverdes(verdes);
            }
            // Se o único turno for a noite, verifique apenas se segunda ou sexta e quarta foram preenchidas
            if(turno == 'n'){
                $('#noite .green').each(function(){
                    verdes.push($(this).data('dia'));
                })
                disponibilizarssq(noite);
                minimoverdes(verdes);
                
            }
            if(turno == 'mvn'){
                $('#manha .green, #tarde .green, #noite .green').each(function(){
                    verdes.push($(this).data('dia'));
                })    
                minimoverdes(verdes);
                disponibilizarssq(manha);
                disponibilizarssq(tarde);
                disponibilizarssq(noite);
            }
            // Preferencias já validadas
            preferencias_verdes = [];
            preferencias_amarelas = [];
            preferencias_vermelhas = [];
            reunioes = [];
            // Recupere todos os horários preenchidos para cadastrá-los no banco conforme o turno escolhido
            if(turno == 'mn'){
                // Recupere todos preenchidos da manhã e noite
                recuperarPreenchidos('#manha td, #noite td');
            }
            if(turno == 'mv'){ 
                recuperarPreenchidos('#manha td, #tarde td');
            }
            if(turno == 'vn'){
                recuperarPreenchidos('#tarde td, #noite td');
            }
            if(turno == 'n'){
                recuperarPreenchidos('#noite td');
            }
                
            if(turno == 'm'){ 
                // Recupere todos preenchidos da manhã
                recuperarPreenchidos('#manha td');
            }
            if(turno == 'v'){
                recuperarPreenchidos('#tarde td');
            }
            if(turno == 'mvn'){
                recuperarPreenchidos('#manha td, #tarde td, #noite td');
            }
            link = "<?=base_url('Horarios/add')?>";
            achei = false;
            $("#alert .content li").each(function(){
                if($(this).css('color') == "rgb(255, 0, 0)"){
                    achei = true;
                }
            });
            if(achei == true){
                swal({
                title: "Tem certeza?",
                text: "Existem Regras de preenchimento ainda não seguidas, deseja realmente continuar?",
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
                        url: link,
                        data:{
                            idDocente:idusuario,
                            verdes:preferencias_verdes,
                            vermelhas:preferencias_vermelhas,
                            amarelas:preferencias_amarelas,
                            semestre:$('#semestreatual').val(),
                            reunioes:reunioes,
                            justificativa:$('#justificativa').val()
                        },
                        success:function(data){
            
                        },
                        error:function(){
                            console.log('Erro no envio de preferências');
                        }
                    });
                    swal({
                        title: "Preferências enviadas!",
                        text: "Você ainda poderá modificar suas preferências",
                        icon: "success"
                    });
    
                } 
                else {
                    swal("Operação cancelada!",{
                        icon:"error"
                    });
                }
                });
            }
            else{
                $.ajax({
                    type:'ajax',
                    dataType:'json',
                    method:'post',
                    url: link,
                    data:{
                        idDocente:idusuario,
                        verdes:preferencias_verdes,
                        vermelhas:preferencias_vermelhas,
                        amarelas:preferencias_amarelas,
                        semestre:$('#semestreatual').val(),
                        reunioes:reunioes,
                        justificativa:$('#justificativa').val()
                    },
                    success:function(data){
        
                    },
                    error:function(){
                        console.log('Erro no envio de preferências');
                    }
                });
                swal({
                title: "Preferências enviadas!",
                text: "Você ainda poderá modificar suas preferências",
                icon: "success"
                });
            }
        }
        else{
            swal({
                title: "Atenção",
                text: "Você ainda não informou um turno",
                icon: "error"
            });
            $("#turno").removeClass('is-valid');
            $("#turno").addClass('is-invalid');
        }
        
       
    });
    
    function recuperarPreenchidos(turno){
        $(turno).each(function(){
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
    }
</script>

<!-- Psquisa no jquery para recuperar os horários das preferências em verde, vermelho e amarelo -->
<script src="<?=base_url('assets/js/regras.js')?>"></script>

<!-- 
    Script que preenche a coluna escolhida conforme o parâmetro recebido 
    0 -> Preencha toda segunda coluna (Lembre que o Horário ocupam sempre primeira coluna)
    1 -> Preencha toda terceira coluna
    (...)
-->
<script src="<?=base_url('assets/js/preferencias.js')?>" ></script>

<!-- Janela de sucesso de exportação -->