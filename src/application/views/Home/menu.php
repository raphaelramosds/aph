<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>APH - Assistente de Planejamento de Horários</title>
	<link rel="stylesheet" href="<?=base_url('assets/css/general.css')?>">
	<link rel="stylesheet" href="<?=base_url('assets/css/navbar.css')?>">
	<link rel="stylesheet" href="<?=base_url('assets/css/tabela.css')?>">
	<link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css')?>">
	<link rel="stylesheet" href="<?=base_url('assets/fontawesome/css/all.css')?>">

	
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-custom">
		<a class="navbar-brand"  href="<?=base_url('home')?>" style="color:white;">
			<img src="<?=base_url('assets/img/LogoAPH.png')?>" width="40" height="40">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="<?=base_url('home')?>">
						<i class="fas fa-home"></i> Tela inicial
					</a> 
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-fw fa-folder"></i>
						<span>Ações</span>
					</a>
					<div class="dropdown-menu" aria-labelledby="pagesDropdown">
						<a class="dropdown-item" href="<?=base_url('preferencias/criar')?>">
							<i class="fas fa-clock"></i> Definir Preferências
						</a>
						<?php if($this->session->userdata('usuario')['membro_comis'] == 1):?>
							<a class="dropdown-item" href="<?=base_url('preferencias/enviadas')?>">
								<i class="fas fa-table"></i> Ver Preferências enviadas
							</a>
						<?php endif;?>
					</div>
				</li>

			</ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item sair">
					<a href="<?=base_url('Home/sair')?>" style="color:#6ddad3" class="nav-link">
						<i class="fas fa-sign-out-alt"></i> Sair
					</a>
				</li>
			</ul>
		</div>
	</nav>


	<script src="<?=base_url('assets/js/jquery.js')?>"></script>
	<script src="<?=base_url('assets/js/popper.js')?>"></script>
    <script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>
	<script src="<?=base_url('assets/js/sweetalert.min.js')?>"></script>
	


