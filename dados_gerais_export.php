<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title></title>
	<head>
	<body>

<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

session_start();


require_once("app/controllers/SensorController.php");
require_once("app/dao/sensorDAO.php");
require_once("app/models/sensor.php");
require_once('app/models/Usuario.php');
require_once('app/controllers/UsuarioController.php');
require_once('app/dao/CentralDAO.php');
require_once('app/models/ValorSensor.php');
require_once('app/controllers/CentralController.php');




/*
* Criando e exportando planilhas do Excel
* /
*/

// Definimos o nome do arquivo que será exportado
$arquivo = 'Dados_Gerais.xls';

$sensorC = new SensorController();
$central = $_SESSION['central_cod'];
$sensores = $sensorC->listar($central);
$media = 0;

// Criamos uma tabela HTML com o formato da planilha

$table = " ";
$table .= "<table border='0'>";
$table .= "<tr>";
$table .= "<td width='100px'><b>Sensor</b></td>";
$table .= "<td width='150px'><b>Data</b></td>";
$table .= "<td width='50px'><b>Valor</b></td>";
$table .= "</tr>";
$table .= "<tr>";
foreach($sensores as $id => $sensor){
    $table.= "<tr>";
    $table .= "<td>".$sensor->__get('sensor')->__get('descricao')."</td>";
    $table .= "<td>".$sensor->__get('dt_hr')."</td>";
    $table .= "<td>".$sensor->__get('valor')."</td>";
    $table .= "</tr>";
    $media +=  $sensor->__get('valor');
}
$media = $media / ($id +1);
$table .= "<td colspan='3'> Media: ".$media."</td>";
$table .= "</tr>";
$table .= "</table>";



/*
$table = '';
$table .= '<table>';
$table .= '<tr>';
$table .= '<td>Planilha teste</tr>';
$table .= '</tr>';
$table .= '<tr>';
$table .= '<td><b>Coluna 1</b></td>';
$table .= '<td><b>Coluna 2</b></td>';
$table .= '<td><b>Coluna 3</b></td>';
$table .= '</tr>';
$table .= '<tr>';
$table .= '<td>L1C1</td>';
$table .= '<td>L1C2</td>';
$table .= '<td>L1C3</td>';
$table .= '</tr>';
$table .= '<tr>';
$table .= '<td>L2C1</td>';
$table .= '<td>L2C2</td>';
$table .= '<td>L2C3</td>';
$table .= '</tr>';
$table .= '</table>';*/


// Configurações header para forçar o download
header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . "GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/x-msexcel");
header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
header ("Content-Description: PHP Generated Data" );

// Envia o conteúdo do arquivo
echo $table;
$table = " ";
exit;


?>
</body>
</html>