<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

//require_once('../dao/UsuarioDAO.php');

class UsuarioController{

    public function __construct()
    {
        
    }
    
    public function autenticacao($user, $senha){
        
        $usuarioDAO = new UsuarioDAO();
        
        $usuarioD = $usuarioDAO->autenticacao($user, $senha);

        return $usuarioD;

    }


    public function restricao(Usuario $usuario){
        if($usuario->__get('grupo') == 1){
            die();
        }   
        else if($usuario->__get('grupo') == 2){
            header("Location: index.php");
            die();
        }
    }
}


?>