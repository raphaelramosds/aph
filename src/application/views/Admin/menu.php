<!DOCTYPE html>
<html lang="en">
<head>      
    <meta charset="UTF-8">
    <title>APH - Assistente de Planejamento de Horários</title>
    <link rel="stylesheet" href="<?=base_url('assets/css/general.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/navbar.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css')?>">
    
    <link href="<?=base_url('assets/sb-admin/css/sb-admin.css')?>" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url('assets/fontawesome/css/all.css')?>">

</head>
<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

<a class="navbar-brand mr-1" href="<?=base_url('Admin')?>">
  <img src="<?=base_url('assets/img/LogoAPH.png')?>" width="30" height="30">
</a>

<button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
  <i class="fas fa-bars"></i>
</button>

<!-- Navbar -->
<ul class="navbar-nav ml-auto ">

  <li class="nav-item dropdown no-arrow">
    <a href="<?=base_url('Home/sair')?>" style="color:#6DDAD3;" class="nav-link">
      <i class="fas fa-sign-out-alt"></i>Sair
    </a>
  </li>
</ul>

</nav>

<div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="<?=base_url('Admin')?>">
          <i class="fas fa-home"></i>
          <span>Tela inicial</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Configurações</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="<?=base_url('Admin/filtragem')?>">Controle de Usuários</a>
          <!-- <a class="dropdown-item" href="<?=base_url('Admin/reunioes')?>">Gestão de Reuniões</a> -->
        </div>
      </li>
    </ul>


<script src="<?=base_url('assets/js/jquery.js')?>"></script>
<script src="<?=base_url('assets/js/popper.js')?>"></script>
<script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>
<!-- Custom scripts for all pages-->
<script src="<?=base_url('assets/sb-admin/js/sb-admin.min.js')?>"></script>
<script src="<?=base_url('assets/js/sweetalert.min.js')?>"></script>



 