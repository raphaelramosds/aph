<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>APH - Assistente de Planejamento de Horários</title>
	<link rel="stylesheet" href="<?=base_url('assets/css/loginpage.css')?>">
	<link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css')?>">
</head>
<body>
	<?php if(!empty($this->session->flashdata('invalido'))):?>
		<div><?=$this->session->flashdata('invalido');?></div>
	<?php endif;?>

	<form method="POST" action="<?=base_url('Usuarios/autenticar')?>">
		<fieldset>
			<input type="text" id="matricula" name="matricula" placeholder="Matrícula" required><br>
			<input type="password" name="senha" placeholder="Senha" required>
		
			<input type="submit" value=	"ENTRAR">
		</fieldset>
		
	</form>

	<script src="<?=base_url('assets/js/jquery.js')?>"></script>
	<script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>
</body>
</html>
