<?php $path = $_SERVER['DOCUMENT_ROOT']; ?>
<html>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">     
    <link href= <?php echo $path.'/agricultura/public_html/assets/style/style.css' ?>  rel="stylesheet">
    <script src="https://kit.fontawesome.com/3359b3a2da.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    </head>


<?php 

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);



require_once($path.'/agricultura/app/models/Usuario.php');
require_once($path.'/agricultura/app/dao/conexao.php');
require_once($path.'/agricultura/app/dao/CentralDAO.php');
require_once($path.'/agricultura/app/controllers/CentralController.php');
//require_once($path.'/agricultura4.0/app/models/centra.php');

session_start();
$centralC = new CentralController();

$centrais = $centralC->listar($_SESSION['usuario']);

?>

<div class='container-fluid'>

   <?php 

        foreach($centrais as $id => $central){
            //echo "<a href='/agricultura4.0/public_html/?c=".$central->__get('cod')."'><div id='centrais'>".$central->__get('descricao')."</div></a>";
            echo"<div class='card shadow mb-4'>";
            echo"<div class='card-header py-3'>";
                echo"<h6 class='m-0 font-weight-bold text-primary'><a href='/agricultura/public_html/?c=".$central->__get('cod')."'>".$central->__get('descricao')."</a></h6>";
            echo"</div>";
            echo"</div>";
        }
    
   ?>  

</div>





</html>