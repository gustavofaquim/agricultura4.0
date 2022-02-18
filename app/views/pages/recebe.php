<?php 

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

if(isset($_GET['valor'])){
    $tipo = $_GET['tipo'];
    $central = $_GET['central'];
    $desc = $_GET['desc'];
    $valor = $_GET['valor'];
    $dt_hr = date('Y-m-d h:i:s', time());
    //$dt_hr = $_GET['dt_hr'];
    //$valor = $_GET['umidade'];
    $sensor = new Sensor($tipo, $central, $desc, $valor, $dt_hr);
    var_dump($sensor);
    $sensorC = new SensorController();
    $sensorC->cadastrar($sensor);
  }


?>
