<?php 

session_start();

if(isset($_POST['cod'])){
    $cod = $_POST['cod'];
    $_SESSION['codCentral'] = $cod;
}

?>