<style>
    .bloco{
        height: 20px;
        width:50px;
        margin-top: 2px;
        border: .5px solid #1c1c1c;
        display: inline-block;
    }

    .red{ background: red; }
    .yellow{ background:yellow; }
    .green{ background: green; }
    

    .dia, .normal { cursor: pointer; }
</style>

<div class="container ml-auto mr-auto " style="max-width:700px">
    <div class="row">
        <div class="col-md-12 p-3">
            <span>
                <?php  
                if(date('m') > 6){echo "Segundo semestre";}
                else {echo "Primeiro semestre";}
                ?>
            </span>
            <p><?=date('d/m/Y')?></p>

            <label for="">
                Em quais turnos você dará aula?
                <select id="turno">
                    <option value="mv">Matutino e Vespertino</option>
                    <option value="mn">Matutino/Vespertino e Noturno</option>
                    <option value="n">Noturno</option>
                </select>
            </label>

            <button class="btn btn-success">Repetir preferências do semestre anterior</button>
        </div>
        <div class="col-md-12">
            <h6>Legenda</h6>
            <div class="bloco red"></div> Preferência de impedimento <br>
            <div class="bloco yellow"></div> Preferência alternativa/opcional <br>
            <div class="bloco green"></div> Preferência obrigatória <br>    
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
            <p>Matutino</p>
            <table class="tabela" id='manha'>
                <tr>
                    <td class="vazio"></td>
                    <?php
                        for($i=0; $i < sizeof($dias); $i++):
                            echo "<td onclick='preencher($i)' onmouseout='zerar()' class='dia'>$dias[$i]</td>";
                        endfor;
                    ?>                
                </tr>
                <?php
                    foreach($horarios_manha as $codigo=>$horario):
                        echo "<tr id='horarios'>";
                            echo "<td class='horario'>$horario</td>";
                            echo "<td class='normal' onmouseout='zerar()' data-dia='2' onclick=\"preencherum('2m$codigo')\" data-horario='2m".$codigo."'></td>";
                            echo "<td class='normal' onmouseout='zerar()' data-dia='3' onclick=\"preencherum('3m$codigo')\" data-horario='3m".$codigo."'></td>";
                            echo "<td class='normal' onmouseout='zerar()' data-dia='4' onclick=\"preencherum('4m$codigo')\" data-horario='4m".$codigo."'></td>";
                            echo "<td class='normal' onmouseout='zerar()' data-dia='5' onclick=\"preencherum('5m$codigo')\" data-horario='5m".$codigo."'></td>";
                            echo "<td class='normal' onmouseout='zerar()' data-dia='6' onclick=\"preencherum('6m$codigo')\" data-horario='6m".$codigo."'></td>";
                        echo "</tr>";
                    endforeach;
                ?>
            </table>
        </div>

        <div class="col-md-12 p-3" onmouseover="mudarTurno('#tarde .normal')">
            <hr>
            <p>Vespertino</p>
            <table class="tabela" id='tarde'>
                <tr>
                    <td class="vazio"></td>
                    <?php
                        for($i=0; $i < sizeof($dias); $i++):
                            echo "<td class='dia' onmouseout='zerar()' onclick='preencher($i)'>$dias[$i]</td>";
                        endfor;
                    ?>                
                </tr>
                <?php
                    foreach($horarios_tarde as $codigo=>$horario):
                        echo "<tr>";
                            echo "<td class='horario'>$horario</td>";
                            echo "<td class='normal' onmouseout='zerar()' onclick=\"preencherum('2v$codigo')\" data-dia='2' data-horario='2v".$codigo."'></td>";
                            echo "<td class='normal' onmouseout='zerar()' onclick=\"preencherum('3v$codigo')\" data-dia='3' data-horario='3v".$codigo."'></td>";
                            echo "<td class='normal' onmouseout='zerar()' onclick=\"preencherum('4v$codigo')\" data-dia='4' data-horario='4v".$codigo."'></td>";
                            echo "<td class='normal' onmouseout='zerar()' onclick=\"preencherum('5v$codigo')\" data-dia='5' data-horario='5v".$codigo."'></td>";
                            echo "<td class='normal' onmouseout='zerar()' onclick=\"preencherum('6v$codigo')\" data-dia='6' data-horario='6v".$codigo."'></td>";
                        echo "</tr>";
                    endforeach;
                ?>
            </table>
        </div>

        <div class="col-md-12 p-3" onmouseover="mudarTurno('#noite .normal')">
            <hr>
            <p>Noturno</p>
            <table class="tabela" id='noite'>
                <tr>
                    <td class="vazio"></td>
                    <?php
                        for($i=0; $i < sizeof($dias); $i++):
                            echo "<td class='dia'  onmouseout='zerar()' onclick='preencher($i)'>$dias[$i]</td>";
                        endfor;
                    ?>                
                </tr>
                <?php
                    foreach($horarios_noite as $codigo=>$horario):
                        echo "<tr>";
                            echo "<td class='horario'>$horario</td>";
                            echo "<td class='normal' onmouseout='zerar()' onclick=\"preencherum('2n$codigo')\" data-dia='2' data-horario='2n".$codigo."'></td>";
                            echo "<td class='normal' onmouseout='zerar()' onclick=\"preencherum('3n$codigo')\" data-dia='3' data-horario='3n".$codigo."'></td>";
                            echo "<td class='normal' onmouseout='zerar()' onclick=\"preencherum('4n$codigo')\" data-dia='4' data-horario='4n".$codigo."'></td>";
                            echo "<td class='normal' onmouseout='zerar()' onclick=\"preencherum('5n$codigo')\" data-dia='5' data-horario='5n".$codigo."'></td>";
                            echo "<td class='normal' onmouseout='zerar()' onclick=\"preencherum('6n$codigo')\" data-dia='6' data-horario='6n".$codigo."'></td>";
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

                

    <!-- Fazer uma pesquisa no jquery para recuperar os horários das preferências em verde, vermelho e amarelo -->
    <script>
          
        $('#recuperar').click(function(){
            turno = $('#turno').val();
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
            
            if(turno == 'mv'){
                c4_manha = disponibilizarssq(manha);
                c4_tarde = disponibilizarssq(tarde);
            }

            if(turno == 'mn'){
                /* Caso o turno escolhido for manhã-noite ou tarde-noite, verifique se 
                em algum dos dois a condição não é seguinda */
                c4_manha = disponibilizarssq(manha);
                c4_tarde = disponibilizarssq(tarde);
                c4_noite = disponibilizarssq(noite);

                if(c4_manha == true && c4_noite == true && c4_tarde == false){
                    console.log('Horário válido');
                }
                else if(c4_tarde == true && c4_noite == true && c4_manha == false ){
                    console.log('Horário válido');
                }

            }

            if(turno == 'n'){
                c4_noite = disponibilizarssq(noite);
            }

            c1 = minimoverdes(verdes);
            c2 = maximovermelhos(vermelhos);
            c3 = minimoamarelos(amarelos);

    
        });
    
        // Verificação 


        function minimoverdes(dias){
            turno = $('#turno').val();
            preenchidos = dias.length; 
            /* A quantidade de verdes deve ser de 60% do total preenchido
            não importando quais turnos foram escolhidos */

            if(turno == 'mv'){
                percentual = preenchidos/60;
                if(percentual < 0.6){
                    console.log('É necessário preencher no mínimo 36 h/a');
                }
            }
            else if(turno == 'mn'){
                // Como fica a regra da disponibilização de horários em verde para regime de 20h?
            }
        }

        function maximovermelhos(dias){
            //console.log(dias);
            if(dias.length > 12){
                console.log('É permitido até 12 h/a em vermelho');
            }
        }

        function minimoamarelos(dias){
            if(dias.length < 12){
                console.log('É permitido no mínimo 12 h/a em amarelo');
            }
        }

        function disponibilizarssq(dias){
            console.log(dias);

            // Receba o vetor com todos os horários e verifique se há dias marcados na segunda ou sexta e quarta
            if( (dias.includes(2) == false && dias.includes(6) == false) || dias.includes(4) == false){
                console.log('Disponibilize a segunda ou sexta e quarta');
                return false;
            }
            else{ return true; }
        }

    </script>

<!-- 
    Fazer script que preencha a coluna escolhida conforme o parâmetro recebido 
    0 -> Preencha toda segunda coluna (Lembre que o Horário ocupam sempre primeira coluna)
    1 -> Preencha toda terceira coluna
    (...)
-->

<script src="<?=base_url('assets/js/preferencias.js')?>" ></script>