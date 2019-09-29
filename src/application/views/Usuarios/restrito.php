<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>APH - Assistente de Planejamento de Horários</title>
    <link rel="stylesheet" href="<?=base_url('assets/css/general.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/navbar.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/fontawesome/css/all.css')?>">
</head>
<body>

    <div class="container ml-auto mr-auto " style="max-width:700px; padding-top:50px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <img src="<?=base_url('assets/img/LogoAPH.png')?>" width="30" height="30">
                        Tela de gestão dos da comissão de horários
                        <a href="<?=base_url('Home/sair')?>" style="color:#6DDAD3;float:right;" class="nav-link">
							<i class="fas fa-sign-out-alt"></i>Sair
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-12 p-3">
                <h5>Filtro de usuários</h5>
                <form action="<?=base_url('usuarios/procurar')?>" method="POST">
                    <div class="p-3">
                        <input type="text" class="form-group campo-s" placeholder="Matrícula" name="matricula">
                        <input type="text" class="form-group campo-s" placeholder="Nome" name="nome">
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
                            <th>Matrícula</th>
                            <th>Nome</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($this->session->userdata('resultado') != NULL): ?>
                            <?php foreach($this->session->userdata('resultado') as $usuario):?>
                                <tr>
                                    <td><?=$usuario->matricula?></td>
                                    <td><?=$usuario->nome?></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Ação
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <?php if($usuario->role != 2):?>
                                                    <button class="dropdown-item" href="#">Incluir na comissão</button>
                                                <?php else:?>
                                                    <button data-toggle="modal" data-target="#confirmacaoRetirar" class="dropdown-item" href="#">Retirar da comissão</button>
                                                <?php endif;?>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        <?php else:?>
                            <div class='alert alert-info' role='alert'>Nada encontrado</div>
                        <?php endif; ?>
                    
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <button class="botao-s" data-toggle="modal" data-target="#usuario">Cadastrar Usuário</button>
            </div>

    <div class="modal fade" id="usuario" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" >Docente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <fieldset>
                        <form action="<?=base_url('usuarios/criar')?>" method="POST">
                            <div class="form-group">
                                <input type="text" placeholder="Matrícula" name="matricula" class="form-control">    
                            </div>
                            <div class="form-group">
                                <input type="email" placeholder="Email" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Senha" name="senha">
                            </div>
                            <div class="form-group">
                                <input type="text" name="nome" placeholder="Nome completo" class="form-control">
                            </div>
                            <div class="form-group">
                                <select name="id_grupo" class="form-contro">
                                    <?php foreach($grupos as $grupo):?>
                                        <option value="<?=$grupo->id?>"><?=$grupo->nome?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="role" class="form-control">
                                    <option value="1">Administrador</option>
                                    <option value="2">Membro da comissão</option>
                                    <option value="3">Professor</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <input class="btn btn-success" type="submit" value="Salvar">
                            </div>
                            
                        </form>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>

    <script src="<?=base_url('assets/js/jquery.js')?>"></script>
	<script src="<?=base_url('assets/js/popper.js')?>"></script>
    <script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>
	
<!-- Confirmação da retiradas -->

<div class="modal fade" id="confirmacaoRetirar" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Atenção</h5>
        </div>
      <div class="modal-body">
            <p>Ao fazer isso, você retire esse usuário da comissão de horários. Entretando, você poderá nomeá-lo novamente depois. Tem certeza que deseja fazê-lo?</p>
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-default">Sim</button>
        <button type="button" data-dismiss="modal" class="btn btn-danger">Não</button>
      </div>
    </div>

  </div>
</div>


</body>
</html>