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

<div class="container-fluid complement-navbar">
  <div class="row">
    <div class="offset-4" >
      <nav class="navbar navbar-expand-lg navbar-custom">
        <a class="navbar-brand"  href="<?=base_url('Admin/home')?>" ><img src="<?=base_url('assets/img/LogoAPH.png')?>" width="30" height="30"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
          <span class="navbar-toggler-icon"></span>
        </button>

         <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="<?=base_url('Admin/home')?>">Início <span class="sr-only">(Página atual)</span></a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Configurações
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="<?=base_url('Admin/filtragem')?>">Membros da comissão de horários</a>
                  <a class="dropdown-item" href="<?=base_url('Admin/reunioes')?>">Reuniões pedagógicas</a>
                </div>
              </li>
            </ul>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a href="<?=base_url('Home/sair')?>" style="color:#6DDAD3;" class="nav-link">
                    <i class="fas fa-sign-out-alt"></i>Sair
                </a>
              </li>  
            </ul>
          </div>
      </nav>
    </div>
  </div>
</div>

<script src="<?=base_url('assets/js/jquery.js')?>"></script>
<script src="<?=base_url('assets/js/popper.js')?>"></script>
<script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>



 