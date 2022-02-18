<?php   

require_once("../app/controllers/SensorController.php");
require_once("../app/dao/sensorDAO.php");
require_once("../app/models/sensor.php");

//umidade

$pagina = 'home'; 
$login = false;


if(isset($_GET['i'])){
    $pagina = addslashes($_GET['i']); 
}


/* Carrega a página escolhida pelo usuário */

//if($login){
  /* Carrega o header.php */ 
  include '../app/views/template/header.php';  

  switch ($pagina) {
    case 'umidade':
      include '../app/views/pages/umidade.php';
      break;
    case 'dados':
      include '../app/views/pages/dados.php';
      break;
    case 'exportar':
      include '../app/views/pages/table.php';
      break;
    case 'login':
      include '../app/views/pages/login.php';
      break;
    case 'acionamento';
      include '../app/views/pages/acionamento.php';
      break;
    case 'chuva';
      include '../app/views/pages/chuva.php';
      break;
    case 'recebe';
      include '../app/views/pages/recebe.php';
      break;
    case 'exporta';
      include '../app/views/pages/xls.php';
      break;
    default:
      include '../app/views/dashboard.php';
      break;
  }

  /* Carrega o footer.php */ 
  include '../app/views/template/footer.php';  
//}else{
  //header('Location: app/views/pages/login.php');
//}

