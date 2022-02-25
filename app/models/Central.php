<?php

class Central{
    public function __construct($cod, $descricao, $ativo, $usuario){
       $this->cod = $cod;
       $this->descricao = $descricao;
       $this->ativo = $ativo;
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