<?php

require_once("../app/controllers/SensorController.php");
require_once("../app/dao/sensorDAO.php");
require_once("../app/models/sensor.php");



$sensorC = new SensorController();
$retornos = $sensorC->sensores_dashboard('oeiuweiuweoiwuoi');
if($_POST['retornos'] == $retornos){
    exit;
}
echo json_encode($retornos);


/*()
$con = new mysqli("localhost", "root", "", "lanche");
    if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
	$sql = "SELECT *FROM pedido WHERE DATE(NOW())";
	$retornos = mysqli_num_rows($con, $sql); //Coloquei $con aqui como parâmetro, mas não tenho certeza se é necessário.
	if($_POST['retornos'] == $retornos)
		exit;
    $qryLista = mysqli_query($con, $sql);    
    while($resultado = mysqli_fetch_assoc($qryLista)){
        $vetor[] = array_map('utf8_encode', $resultado); 
    }    
    echo json_encode($vetor);

*/


?>