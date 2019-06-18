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
                            echo "<td class='normal' data-dia='2' data-turno='m' data-horario='$codigo'></td>";
                            echo "<td class='normal' data-dia='3' data-turno='m' data-horario='$codigo'></td>";
                            echo "<td class='normal' data-dia='4' data-turno='m' data-horario='$codigo'></td>";
                            echo "<td class='normal' data-dia='5' data-turno='m' data-horario='$codigo'></td>";
                            echo "<td class='normal' data-dia='6' data-turno='m' data-horario='$codigo'></td>";
                        echo "</tr>";
                    endforeach;
                ?>
            </table>
        </div>

        <div class="col-md-12 p-3">
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
        </div>

        <div class="col-md-12 p-3">
            <textarea  id="" cols="78" rows="10" name="justificativa" placeholder="Justificativa de preferências de impedimento "></textarea>
        </div>

        <div class="col-md-12 p-3">
            <button class="btn btn-primary ">Enviar preferências</button>
        </div>

    </div>

</div>