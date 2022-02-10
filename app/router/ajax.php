<?php

$sensorC = SensorController();
$sensores = $sensorC->sensores_dashboard();

return $sensores;
?>