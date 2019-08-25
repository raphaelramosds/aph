
<!-- Div para receber os alertas do script -->
<div id="alert"></div>

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

            <label for="">
                Em qual(is) turno(s) você dará aula? <span style="color:red">*</span>
                <select id="turno">
                    <option value="mv">Matutino e Vespertino</option>
                    <option value="mn">Matutino e Noturno</option>
                    <option value="vn">Vespertino e Noturno</option>
                    <option value="n">Noturno</option>
                    <option value="v">Vespertino</option>
                    <option value="m">Matutino</option>
                    <option value="mvn">Todos</option>
                </select>
            </label>

            <label for="">
                Repetir preferências do semestre anterior? <span style="color:red">*</span>
                <input type="radio" name="repetir"> Sim
                <input type="radio"name="repetir"> Não
            </label>
            
            <hr>
            
        </div>
        <div class="col-md-12">
            <b>Legenda</b><br>
            <div class="bloco red"></div> Preferência de impedimento <br>
            <div class="bloco yellow"></div> Preferência alternativa/opcional <br>
            <div class="bloco green"></div> Preferência obrigatória 
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

        <div class="col-md-12 p-3" onmouseover="mudarTurno('#manha .normal')">
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

        <div class="col-md-12 p-3" onmouseover="mudarTurno('#tarde .normal')">
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

        <div class="col-md-12 p-3" onmouseover="mudarTurno('#noite .normal')">
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
            <textarea  id="" cols="78" rows="10" name="justificativa" placeholder="Justificativa de preferências de impedimento "></textarea>
        </div>

        <div class="col-md-12 p-3">
            <button class="btn btn-primary" id="recuperar" >Enviar preferências</button>
        </div>

    </div>
</div>

            
<script>
            
        $('#recuperar').click(function(){
        turno = $('#turno').val();

        // Resetar mensagens de validação
        $('#alert').html("");

        // Verificar se os dias segunda ou quarta e sexta foram marcados, por turno
        manha = [];
        tarde = [];
        noite = [];

        vermelhos = [];
        verdes = [];
        amarelos = [];
        
        // Verificar se a quantidade mínima de blocos em verde foi preenchida
        $('#manha .green, #tarde .green, #noite .green').each(function(){
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

        if(turno == 'mv' || turno == 'mn' || turno == "vn"){
            minimoverdes(verdes);
        }

        // Disponibilizar segunda ou sexta além da quarta

        if(turno == 'mv'){
            c4_manha = disponibilizarssq(manha);
            c4_tarde = disponibilizarssq(tarde);
        }

        if(turno == 'mn'){
            /* Caso o turno escolhido for manhã-noite ou tarde-noite, verifique se 
            em algum dos dois a condição não é seguida */
            c4_manha = disponibilizarssq(manha);
            c4_noite = disponibilizarssq(noite);
        }
        
        if(turno == 'vn'){
            c4_tarde = disponibilizarssq(tarde);
            c4_noite = disponibilizarssq(noite);
            
        }

        // Se ele escolher apenas um turno, aceite no mínimo 30 h/a em verde (a noite não conta)
        if(turno == 'm'){
            c4_manha = disponibilizarssq(manha);
            minimoverdes(verdes);
        }

        if(turno == 'v'){
            c4_tarde = disponibilizarssq(manha);
            minimoverdes(verdes);
        }

        // Se o único turno for a noite, verifique apenas se segunda ou sexta e quarta foram preenchidas

        if(turno == 'n'){
            c4_noite = disponibilizarssq(noite);
            
        }


        // Preferencias já validadas
        preferencias_verdes = [];
        preferencias_amarelas = [];
        preferencias_vermelhas = []


        // Recupere todos os horários preenchidos para cadastrá-los no banco conforme o turno escolhido

        if(turno == 'mn'){ }

        if(turno == 'mv'){ }

        if(turno == 'vn'){ }

        if(turno == 'n'){ }
            
        if(turno == 'm'){ 

            // Recupere todos preenchidos da manhã
            $('#manha td').each(function(){
                if($(this).data('horario') != undefined){
                    if($(this).hasClass('green')){
                        preferencias_verdes.push($(this).data('horario'));
                    }
                    else if($(this).hasClass('yellow')){
                        preferencias_amarelas.push($(this).data('horario'));
                    }
                    else if($(this).hasClass('red')){
                        preferencias_vermelhas.push($(this).data('horario'));
                    }
                }
            })

            // Apenas mande para o controller se não estiver vazio

            sendToController(preferencias_verdes,'registrarVerdes');
            sendToController(preferencias_amarelas,'registrarAmarelas');
            sendToController(preferencias_vermelhas,'registrarVermelhas');
  
        }

        if(turno == 'v'){ }

        if(turno == 'mvn'){ }

    });


    function sendToController(preferencias, metodo){
        link = "<?=base_url('Preferencias/')?>" + metodo
        $.ajax({
                type:'ajax',
                dataType:'json',
                method:'post',
                url: link,
                data:{'preferencias':preferencias},
                success:function(data){
                    console.log(data);
                },
                error:function(){
                    console.log('Deu merda');
                }
         });
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
