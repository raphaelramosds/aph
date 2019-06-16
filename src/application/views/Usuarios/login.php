<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>APH - Assistente de Planejamento de Horários</title>
	<link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css')?>">
	<link rel="stylesheet" href="<?=base_url('assets/css/general.css')?>">
	<link rel="stylesheet" href="<?=base_url('assets/css/alertas.css')?>">
	<link rel="stylesheet" href="<?=base_url('assets/fontawesome/css/all.css')?>">
</head>
<body>
	<style>	
		body{
			display:flex;
			flex-direction: column;
			justify-content: center;
			height: 80vh;
			background: #132235;
		}
	</style>
	<div class="container">
		<div class="row">
			<div class="col-md-4 offset-md-4">
				<img class="mx-auto d-block" src="<?=base_url('assets/img/LogoAPH.png')?>" height="200vh" alt="" >
				<form method="POST" action="<?=base_url('Usuarios/autenticar')?>">
					<?php if(!empty($this->session->flashdata('invalido'))):?>
						<div class="invalido"><?=$this->session->flashdata('invalido');?></div>
					<?php endif;?>
					<div class="form-group">
						<input class="form-control campo" type="text" id="matricula" name="matricula" placeholder="Matrícula" required>
					</div>
					<div class="form-group">
						<input class="form-control campo" type="password" name="senha" placeholder="Senha" required>
					</div>
					<div class="form-group">
						<a href="#" data-toggle="modal" data-target="#restrito" style="font-size: 12px;color:#6ddad3">
							<i class="fas fa-key"></i> Acesso privilegiado
						</a>
					</div>
					<div class="form-group">
						<input class="form-control botao" type="submit" value="ENTRAR">
					</div>
				</form>
			</div>
		</div>
	</div>	
	<script src="<?=base_url('assets/js/jquery.js')?>"></script>
	<script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>


<div class="modal fade" id="restrito" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Login Administrador</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="modal-body">
						<!--Fazer autenticação com jquery-->
						<form method="POST" action="<?=base_url('usuarios/autenticar')?>">
							<div class="form-group">
								<input type="text" class="form-control campo-s" name="matricula" placeholder="Matrícula">
							</div>
							<div class="form-group">
								<input type="password" class="form-control campo-s" name="senha" placeholder="Senha">
							</div>
							<input type="hidden" name="role" value='1'>
							<input class="botao-s" type="submit" value="Entrar">
						</form>
					</div>
				</div>
            </div>
        </div>
    </div>
</body>
</html>
