<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>APH - Assistente de Planejamento de Horários</title>
	<link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css')?>">
	<link rel="stylesheet" href="<?=base_url('assets/css/loginpage.css')?>">
	<link rel="stylesheet" href="<?=base_url('assets/css/alertas.css')?>">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4 offset-md-4" style="text-align:center;">
				<img src="<?=base_url('assets/img/LogoAPH.png')?>" height="200vh" alt="">
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
						<input class="form-control botao" type="submit" value="ENTRAR">
					</div>
				</form>
			</div>
		</div>
	</div>

	<script src="<?=base_url('assets/js/jquery.js')?>"></script>
	<script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>
</body>
</html>
