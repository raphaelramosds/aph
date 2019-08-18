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
                    </div>
                </div>
            </div>
            <div class="col-md-12 p-3">
                <p>Pesquisar por usuários:</p>
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
                        <?php if(isset($usuarios)): ?>
                            <?php foreach($usuarios as $usuario):?>
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
                <button class="botao-s" data-toggle="modal" data-target="#comissao">Cadastrar servidor da comissão</button>
                <button class="botao-s" data-toggle="modal" data-target="#docente">Cadastrar docente</button>
            </div>
        </div>
        
    </div>

    

    <div class="modal fade" id="docente" tabindex="-1" role="dialog" aria-hidden="true">
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
                            <input type="text" placeholder="Matrícula" name="matricula">
                            <input type="email" placeholder="Email" name="email">
                            <input type="password" placeholder="Senha" name="senha">
                            <input type="text" name="nome" placeholder="Nome completo">
                            <select name="id_grupo">
                                <?php foreach($grupos as $grupo):?>
                                    <option value="<?=$grupo->id?>"><?=$grupo->nome?></option>
                                <?php endforeach;?>
                            </select>
                            <input type="number" name="role" value='3'>
                            <input type="number" name="id_usuario">
                            <input type="submit" value="Salvar">
                        </form>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="comissao" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Comissão</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <fieldset>
                        <form action="<?=base_url('usuarios/criar')?>" method="POST">
                            <input type="text" placeholder='Matrícula' name='matricula'>
                            <input type="email" placeholder='Email' name='email'>
                            <input type="password" placeholder='Senha' name='senha'>
                            <input type="text" placeholder="Nome completo" name="nome">
                            <input type="number" name="role" value='2'>
                            <input type="number" name="id_usuario">
                            <input type="submit" value="Salvar">
                        </form>
                    </fieldset>
                </div>
            </div>
            </div>
        </div>
    </div>

    <script src="<?=base_url('assets/js/jquery.js')?>"></script>
	<script src="<?=base_url('assets/js/popper.js')?>"></script>
    <script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>
	
</body>
</html>