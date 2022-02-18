<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

class UsuarioController{
    
    public function autenticacao($user, $senha){
        $usuarioDAO = new UsuarioDAO();
        $lista = $usuarioDAO->autenticacao($user,$senha);
        
        if($lista){
            echo "Usuário logado com sucesso"
            //return $lista;
            header("Location: index.php");
            die();
        }
        else{
            echo "login invalido";
        }   
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