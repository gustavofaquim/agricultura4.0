<?php   

include 'erro.php';

$pagina = 'home';   

if(isset($_GET['i'])){
     $pagina = addslashes($_GET['i']); 
}
   
/* Carrega o header.php */ 
include 'app/views/template/header.php';   

/* Carrega a página escolhida pelo usuário */
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