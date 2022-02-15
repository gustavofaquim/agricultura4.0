<?php
include('tiposensor.php');
class Sensor{
    /*private $id;
    private $tipo_sensor;
    private $descricao;
    private $valor;*/

    public function __construct($tipo_sensor,$descricao,$valor, $dt_hr)
    {
        $this->tipo_sensor = $tipo_sensor;
        $this->valor = $valor;
        $this->descricao = $descricao;
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