<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>APH - Assistente de Planejamento de Horários</title>
	<link rel="stylesheet" href="<?=base_url('assets/css/general.css')?>">
	<link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css')?>">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12" >
                <h1>Administração</h1>  
               
            </div>
            <div class="col-md-12">
                <p>Pesquisar por usuários:</p>
                <form >
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"> 
                        <label for="" class="form-check-label" value="3" name="role">Docentes</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="2" name="role"> 
                        <label for="" class="form-check-label">Membros da comissão</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" name="role"> 
                        <label for="" class="form-check-label">Administradores</label>
                    </div>
                    <div >
                        <input type="text" class="form-group campo-s" placeholder="Pesquisar por Matrícula" name="matricula">
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
                        <tr>
                            <td>20161041110010</td>
                            <td>user@gmail.com</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ação</button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Remover</a>
                                        <a class="dropdown-item" href="#">Editar</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Salvar</button>
            </div>
            </div>
        </div>
    </div>

	<script src="<?=base_url('assets/js/jquery.js')?>"></script>
	<script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>
</body>
</html>