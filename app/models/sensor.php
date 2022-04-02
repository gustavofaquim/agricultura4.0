<?php
include('tiposensor.php');

class Sensor{
    //private int $id;
    //private TipoSensor $tipo_sensor;
    //private String $descricao;

    public function __construct($tipo_sensor,$central,$descricao)
    {
        $this->tipo_sensor = $tipo_sensor;
        $this->central = $central;
        $this->descricao = $descricao;
    }

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo, $valor_atributo){
        $this->$atributo = $valor_atributo;
    }
}

?>