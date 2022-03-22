<?php 

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

if(isset($_GET['valor'])){
    //$tipo = $_GET['tipo']; //tipo
    $id = $_GET['id']; //id do sensor
    //$central = $_GET['central'];
    $valor = $_GET['valor'];
    $dt_hr = date('Y-m-d h:i:s', time());
    //$sensor = new Sensor($tipo, $id, $central, $valor, $dt_hr);
    //var_dump($sensor);
    $sensorC = new SensorController();
    //$sensorC->cadastrar($tipo, $id, $central, $valor, $dt_hr);
    $sensorC->cadastrar($id, $valor, $dt_hr);
  }


?>
