<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../app/assets/css/sb-admin-2.min.css" rel="stylesheet">
    <!--<link href="../app/assets/css/style.css" rel="stylesheet">-->
    <link href="../public_html/assets/style/style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3359b3a2da.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    <title>Central de Monitoramento</title>
  </head>
  <body id="page-top">

  <div id="wrapper">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div class="content">    

    <nav class="navbar navbar-dark bg-dark navbar-expand-lg ">
        <a class="navbar-brand" href="#" id='Menu'>Central Monitoramento</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
            <li class="nav-item menu-item">
                <a class="nav-link" href="?">ÍNICIO <span class="sr-only">(Página atual)</span></a>
            </li>
            <li class="nav-item menu-item">
                <a class="nav-link" href="?i=dados_gerais">DADOS <span class="sr-only">(Página atual)</span></a>
            </li>

          <?php
               /* $sensorC = new SensorController();
                $tiposensor = $sensorC->tipos_sensores();
                //$sensores = $sensorC->sensores_dashboard();   
                foreach($tiposensor as $id =>$tipo){
                    echo"<li class='nav-item menu-item'><a class='nav-link' href='?i=dados&tp=".$tipo->__get('id')."'>  <span class='text-uppercase'>".$tipo->__get('tipo')." <i class='".$tipo->__get('icon')."'></i></span></a> </li>";
                } */
            ?> 
            <li class="nav-item menu-item">
                <a class="nav-link" href="?i=sair">Sair</a>
            </li>
            </ul>
        </div>
    </nav>

    <!--<nav class="navbar navbar-expand-lg navbar-light bg-light" id='menu-selecao'>
    Central Atual       
        <select class="form-select form-select-sm" id="codCentral" onChange='mudaCentral()' aria-label=".form-select-sm example">
            <?php 
                foreach($centrais as $id=>$central){
                    echo"<option value='".$central->__get('cod')."'>".$central->__get('descricao')."</option>";
                }
            ?>
        </select>

    </nav> -->


    <!--<script> FUNCIONANDOOOO
        
        function mudaCentral(){
            var select = document.getElementById('codCentral');
            var option = select.options[select.selectedIndex];
            var cod = option.value;
            alert(cod);

            $.ajax({ 
                type: 'post', 
                url: '../app/views/pages/session.php', 
                data: {cod},

                success: function(data) { 
                    alert('Opaaa')
                    window.location.reload(); 
                } 
            }); 
        }


    </script>-->
    
    
    <!-- Begin Page Content -->

