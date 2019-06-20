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
</style>

<div class="container ml-auto mr-auto " style="max-width:700px">
    <div class="row">
        <div class="col-md-12 p-3">
            <span>1&#176 SEMESTRE DE 2019</span>
            <p>16/06/2019</p>
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
            $horarios = array(
                '1'=>'1&#176 Horário',
                '2'=>'2&#176 Horário',
                '3'=>'3&#176 Horário',
                '4'=>'4&#176 Horário',
                '5'=>'5&#176 Horário',
                '6'=>'6&#176 Horário'
            );    
        ?>

        <div class="col-md-12 p-3">
            <hr>
            <p>Manhã</p>
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
                    foreach($horarios as $codigo=>$horario):
                        echo "<tr id='horarios'>";
                            echo "<td class='horario'>$horario</td>";
                            echo "<td class='normal' data-dia='2' data-horario='2m".$codigo."'></td>";
                            echo "<td class='normal' data-horario='3m".$codigo."'></td>";
                            echo "<td class='normal' data-horario='4m".$codigo."'></td>";
                            echo "<td class='normal' data-horario='5m".$codigo."'></td>";
                            echo "<td class='normal' data-horario='6m".$codigo."'></td>";
                        echo "</tr>";
                    endforeach;
                ?>
            </table>
        </div>
        
        <!-- Fazer uma pesquisa no jquery para recuperar os horários das preferências em verde, vermelho e amarelo -->
        <script>

            $('#manha .green').each(function(){
                console.log($(this).data('horario'));
            });

            $('#manha .amarelo').each(function(){
                console.log($(this).data('horario'));
            });

            $('#manha .vermelho').each(function(){
                console.log($(this).data('horario'));
            });

        </script>

        <!-- Fazer script que preencha a coluna escolhida conforme o parâmetro recebido -->
        <!--
            0 -> Preencha toda segunda coluna (Lembre que oo Horário ocupam sempre primeira coluna)
            1 -> Preencha toda terceira coluna
            (...)
        -->
        <script>
            clicks = 0;
            elements = document.querySelectorAll('#manha .normal');

            function preencher(id){
                clicks++;
                for(i = 0; i < elements.length; i++){
                    if(id == 0 && elements[i].getAttribute('data-dia') == 2){
                        if(clicks == 1){ elements[i].style.backgroundColor = 'green'; }
                        if(clicks == 2){ elements[i].style.backgroundColor = 'yellow'; }
                        if(clicks == 3){ elements[i].style.backgroundColor = 'red'; }
                        if(clicks == 4){ clicks = 0; }
                    };
                };
            };
        </script>

        <div class="col-md-12 p-3">
            <hr>
            <p>Tarde</p>
            <table class="tabela">
                <tr>
                    <td class="vazio"></td>
                    <?php
                        for($i=0; $i < sizeof($dias); $i++):
                            echo "<td class='dia'>$dias[$i]</td>";
                        endfor;
                    ?>                
                </tr>
                <?php
                    foreach($horarios as $codigo=>$horario):
                        echo "<tr>";
                            echo "<td class='horario'>$horario</td>";
                            echo "<td class='normal' data-dia='2' data-turno='v' data-horario='$codigo'></td>";
                            echo "<td class='normal' data-dia='3' data-turno='v' data-horario='$codigo'></td>";
                            echo "<td class='normal' data-dia='4' data-turno='v' data-horario='$codigo'></td>";
                            echo "<td class='normal' data-dia='5' data-turno='v' data-horario='$codigo'></td>";
                            echo "<td class='normal' data-dia='6' data-turno='v' data-horario='$codigo'></td>";
                        echo "</tr>";
                    endforeach;
                ?>
            </table>
        </div>

        <div class="col-md-12 p-3">
            <hr>
            <p>Noite</p>
            <table class="tabela">
                <tr>
                    <td class="vazio"></td>
                    <?php
                        for($i=0; $i < sizeof($dias); $i++):
                            echo "<td class='dia'>$dias[$i]</td>";
                        endfor;
                    ?>                
                </tr>
                <?php
                    foreach($horarios as $codigo=>$horario):
                        echo "<tr>";
                            echo "<td class='horario'>$horario</td>";
                            echo "<td class='normal' data-dia='2' data-turno='n' data-horario='$codigo'></td>";
                            echo "<td class='normal' data-dia='3' data-turno='n' data-horario='$codigo'></td>";
                            echo "<td class='normal' data-dia='4' data-turno='n' data-horario='$codigo'></td>";
                            echo "<td class='normal' data-dia='5' data-turno='n' data-horario='$codigo'></td>";
                            echo "<td class='normal' data-dia='6' data-turno='n' data-horario='$codigo'></td>";
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
            <button class="btn btn-primary ">Enviar preferências</button>
        </div>

    </div>

</div>