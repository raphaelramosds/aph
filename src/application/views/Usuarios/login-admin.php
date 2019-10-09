<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>APH - Tela do Administrador</title>
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
			background: white;
		}
	</style>
	<div class="container">
		<div class="row">
			<div class="col-md-4 offset-md-4">
				
				<form method="POST" action="<?=base_url('admin/autenticar')?>">
					<div class="form-group">
						<input class="form-control" type="text" id="matricula" name="matricula" placeholder="Matrícula" required>
					</div>
					<div class="form-group">
						<input class="form-control" id="senha" type="password" name="senha" placeholder="Senha" required>
					</div>
					<div class="form-group">
						<input class="form-control botao" type='submit' id='entrar' value="ENTRAR">
					</div>
				</form>
			</div>
		</div>
	</div>	
	<script src="<?=base_url('assets/js/jquery.js')?>"></script>
	<script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>
	<!-- Deixar pra fazer autenticação por último -->
	<!--<script src="<?=base_url('assets/js/autenticacao.js')?>"></script> -->
</body>
</html>
