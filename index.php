<?php   

include 'erro.php';

$pagina = 'home'; 
$login = false;


if(isset($_GET['i'])){
    $pagina = addslashes($_GET['i']); 
}




/* Carrega a página escolhida pelo usuário */

//if($login){
  /* Carrega o header.php */ 
  include 'app/views/template/header.php';  

  switch ($pagina) {
    case 'umidade':
      include 'app/views/pages/umidade.php';
      break;
    case 'temperatura':
      include 'app/views/pages/temperatura.php';
      break;
    case 'acionamento';
      include 'app/views/pages/acionamento.php';
      break;
    case 'chuva';
      include 'app/views/pages/chuva.php';
      break;
    default:
      include 'app/views/dashboard.php';
      break;
  }

  /* Carrega o footer.php */ 
  include 'app/views/template/footer.php';  
//}else{
  //header('Location: app/views/pages/login.php');
//}

