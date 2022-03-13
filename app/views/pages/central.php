<?php $path = $_SERVER['DOCUMENT_ROOT']; ?>
<html>
    <head>
        <link href= <?php echo $path.'/agricultura4.0/public_html/assets/style/style.css' ?>  rel="stylesheet">
        <script src="https://kit.fontawesome.com/3359b3a2da.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    </head>


<?php 

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);



require_once($path.'/agricultura4.0/app/models/Usuario.php');
require_once($path.'/agricultura4.0/app/dao/conexao.php');
require_once($path.'/agricultura4.0/app/dao/CentralDAO.php');
require_once($path.'/agricultura4.0/app/controllers/CentralController.php');
//require_once($path.'/agricultura4.0/app/models/centra.php');

session_start();
$centralC = new CentralController();

$centrais = $centralC->listar($_SESSION['usuario']);

?>

<div class='container-fluid'>

   <?php 

        foreach($centrais as $id => $central){
            echo "<a href='/agricultura4.0/public_html/?c=".$central->__get('cod')."'><div id='centrais'>".$central->__get('descricao')."</div></a>";
        }
    
   ?>  

</div>


</html>