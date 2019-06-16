<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>APH - Assistente de Planejamento de Horários</title>
	<link rel="stylesheet" href="<?=base_url('assets/css/loginpage.css')?>">
	<link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css')?>">
</head>
<body>
    <h1>Administrador</h1>

    <button data-toggle="modal" data-target="#comissao">Cadastrar servidor da comissão</button>
    <button data-toggle="modal" data-target="#docente">Cadastrar docente</button>

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
                            Grupo: <select name="id_grupo">
                                <option value=""></option>
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
                            <input type="text" placeholder="Nome completo">
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