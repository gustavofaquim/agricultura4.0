<?php

class Usuario{
    public function __construct($nome,$usuario,$senha,$grupo,$ativo){
        $this->nome = $nome;
        $this->usuario = $usuario;
        $this->senha = $senha;
        $this->grupo = $grupo;
        $this->ativo = $ativo;
    }

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo, $valor_atributo){
        $this->$atributo = $valor_atributo;
    }
}
?>