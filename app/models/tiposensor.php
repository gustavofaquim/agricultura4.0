<?php

class TipoSensor{
    /*private $id;
    private $tipo;
    private $color;
    private $icon;*/

    public function __construct($tipo, $icon, $color){
        $this->tipo = $tipo;
        $this->icon = $icon;
        $this->color = $color;
    }

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo, $valor_atributo){
        $this->$atributo = $valor_atributo;
    }
}

?>