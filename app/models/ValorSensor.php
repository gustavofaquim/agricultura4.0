<?php
include_once('sensor.php');
class ValorSensor{
    /*private int $id;
    private Sensor $sensor;
    private String $valor;
    private String $dt_hr;*/

    public function __construct($sensor, $valor, $dt_hr)
    {
        $this->sensor = $sensor;
        $this->valor = $valor;
        $this->dt_hr = $dt_hr;
    }

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo, $valor_atributo){
        $this->$atributo = $valor_atributo;
    }
}

?>