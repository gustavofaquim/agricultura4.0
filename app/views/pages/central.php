<?php $path =  $_SERVER['DOCUMENT_ROOT']; ?>
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
    
    var_dump($path);
        foreach($centrais as $id => $central){
            echo"<a href='/agricultura/public_html/?c=".$central->__get('cod')."'>";
            echo"<h4 class='text-uppercase titulo-meteorologico font-weight-bold'>".$central->__get('descricao')."</h4></a>";
        }
   ?>  

</div>





</html>