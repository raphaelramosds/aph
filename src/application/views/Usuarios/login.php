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
				<form method="POST" action="<?=base_url('usuarios/autenticar')?>" id="login">
					<?php if(!empty($this->session->flashdata('invalido'))):?>
						<div class="invalido"><?=$this->session->flashdata('invalido');?></div>
					<?php endif;?>
					<div class="form-group">
						<input class="form-control campo" type="text" id="matricula" name="matricula" placeholder="Matrícula" required>
					</div>
					<div class="form-group">
						<input class="form-control campo" id="senha" type="password" name="senha" placeholder="Senha" required>
					</div>
					<div class="form-group">
						<div class="custom-control custom-checkbox">
							<input type="checkbox" name="responsavel" value="1" class="custom-control-input" id="customCheck1">
							<label class="custom-control-label" style="color:#6ddad3" for="customCheck1">Entrar como responsável</label>
						</div>
					</div>
					<div class="form-group">
						<input class="form-control botao" type='submit' id='entrar' value="ENTRAR">
					</div>
					<div class="form-group text-center d-none" id="load">
						<img src="<?=base_url('assets/img/load.gif')?>" height="50px" width="50px" >
					</div>
				</form>
			</div>
		</div>
	</div>	
	
	<script src="<?=base_url('assets/js/jquery.js')?>"></script>
	<script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>
</body>
</html>

<script>
	$('#entrar').click(function(){
		if( $('#matricula').val() != "" && $('#senha').val() != "" ){
			$('#load').addClass('d-block');
		}
	})

</script>