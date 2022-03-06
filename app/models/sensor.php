<?php
include('tiposensor.php');
class Sensor{
    private int $id;
    private TipoSensor $tipo_sensor;
    private String $descricao;
    private String $valor;
    private String $dt_hr;

    public function __construct($tipo_sensor,$central,$descricao,$valor, $dt_hr)
    {
        $this->tipo_sensor = $tipo_sensor;
        $this->central = $central;
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