<div class="container ml-auto mr-auto " style="max-width:700px">
    <div class="row">
        <div class="col-md-12 p-3">
            <span>Preferências de horários dos docentes</span>
            <p id="semestre" data-semestre="<?=$semestreatual?>">Semestre de 2019</p>
            <button class="botao-s">Exportar todas as Preferências</button>
            <!-- Se nenhuma preferência tiver sido associada ao semestre corrente, ative o botão -->

            <script>
                $(document).ready(function(){
                    semestre = $('#semestre').data('semestre');

                    $.ajax({
                        type:'ajax',
                        dataType:'json',
                        method:'post',
                        url:'<?=base_url('Preferencias/verificarPreferencias')?>',
                        data:{'semestre':semestre},
                        success:function(data){
                            console.log(data);
                        },
                        error:function(){ alert('Falha') }
                    });
                });
            
            </script>
            <button id="abrirpreferencias" class="botao-s" onclick="location.href='<?=base_url('Preferencias/abrir')?>'">Abrir envio de preferências para este semestre</button>
        </div>
        <div class="col-md-12 p-3">
            <table class="table">
                <tr>
                    <td>Cosme Ferreira Marques Neto</td>
                    <td>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Ação
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" data-toggle="modal" data-target="#editar" href="#">Exportar</a>
                            <a class="dropdown-item" href="#">Ver Justificativa</a>
                        </div>
                        </div>
                    </td>
                </tr>
               
            </table>
        </div>
        <div class="col-md-12 p-3">
            <nav aria-label="Navegação de página exemplo">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Próximo</a></li>
                </ul>
            </nav>
        </div>
    </div>

</div>

<div class="modal fade bd-example-modal-lg" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alterar preferência</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Exportar arquivo XML</button>
      </div>
    </div>
  </div>
</div>