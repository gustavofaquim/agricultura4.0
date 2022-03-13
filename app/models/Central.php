<?php

class Central{
    public function __construct($descricao,$usuario){
        $this->descricao = $descricao;
        $this->usuario = $usuario;
    }

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo, $valor_atributo){
        $this->$atributo = $valor_atributo;
    }
}
?>