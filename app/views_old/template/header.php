<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
   <!-- <meta http-equiv="refresh" content="10" /> <!-- Recarrega a página depois de um tempo definido --> 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../app/assets/css/sb-admin-2.min.css" rel="stylesheet">
    <!--<link href="../app/assets/css/style.css" rel="stylesheet">-->
    <link href="../public/assets/style/style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3359b3a2da.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    <title>Agricultura 4.0</title>
  </head>
  <body id="page-top">

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="?i=home">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Painel</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <div class="sidebar-heading">
        Sensores
    </div>

    
    <?php
        $sensorC = new SensorController();
        $tiposensor = $sensorC->tipos_sensores();
        //$sensores = $sensorC->sensores_dashboard();   

        foreach($tiposensor as $id =>$tipo){
            echo"<li class='nav-item'>";
                echo"<a class='nav-link collapsed' href='?i=dados&tp=".$tipo->__get('id')."'>";
                    echo"<i class='".$tipo->__get('icon')."'></i>";
                    echo"<span class='text-uppercase'>".$tipo->__get('tipo')."</span> </a> </li>";

        }
    ?>


   <!-- <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link collapsed" href="?i=acionamento">
        <i class="far fa-arrow-alt-circle-up"></i>
            <span>Acionamentos</span>
        </a>
    </li> -->

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div class="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>


        <!-- Topbar Navbar -->
        <ul class="navbar-nav text-center">

            <h4>Painel de Monitoramento</h4> 

        </ul>

        </nav>
        <!-- End of Topbar -->




        <!-- Begin Page Content -->
        <div class="container-fluid">
