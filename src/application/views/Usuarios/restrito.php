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
                        Tela de gestão dos usuários
                        <a href="<?=base_url('Home/sair')?>" style="color:#6DDAD3;float:right;" class="nav-link">
							<i class="fas fa-sign-out-alt"></i>Sair
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-12 p-3">
                <h5>Pesquisar usuários</h5>
                <form action="<?=base_url('usuarios/procurar')?>" method="POST">
                    <div class="form-check">
                        <input type="radio" value="3" name="role" CHECKED> 
                        <label for="" class="form-check-label">Docentes</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" value="2" name="role"> 
                        <label for="" class="form-check-label">Membros da comissão</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" value="1" name="role"> 
                        <label for="" class="form-check-label">Administradores</label>
                    </div>
                    <div class="p-3">
                        <input type="text" class="form-group campo-s" placeholder="Matrícula" name="matricula">
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
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($this->session->userdata('resultado') != NULL): ?>
                            <?php foreach($this->session->userdata('resultado') as $usuario):?>
                                <tr>
                                    <td><?=$usuario->matricula?></td>
                                    <td><?=$usuario->email?></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Ação
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Editar</a>
                                                <a class="dropdown-item" href="#">Excluir</a>
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

            <div class="col-md-12">
                <hr>
                <h5>Controle de Coordenadores de Cursos</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Curso</th>
                            <th>Coordenador</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($cursos as $curso):?>
                            <tr>
                                <td><?=$curso->nome?></td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>

                </table>
            </div>

            <div class="col-md-12">
                <hr>
                <h5>Controle de Coordenadores de Grupos</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Curso</th>
                            <th>Coordenador</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($grupos as $grupo):?>
                            <tr>
                                <td><?=$grupo->nome?></td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>


                </table>
            </div>
        </div>
        
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
                                <select name="id_grupo" class="form-control">
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
	
</body>
</html>