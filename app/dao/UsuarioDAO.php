<?php 
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require_once 'conexao.php';


class UsuarioDAO extends Conexao{
    
    public function __construct(){
        $this->conectar();
    }

    public function autenticacao($user, $senha){
        $query = "select usuario, senha from usuarios where usuario = :user and senha = :senha and ativo = 1";
        $stmt = $this->conectar()->prepare($query);
        $stmt->bindValue(':user', $user);
        $stmt->bindValue(':senha', $senha);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_OBJ);

        $usuario = new Usuario($result->nome, $result->usuario, $result->senha, $result->grupo, $result->ativo);
        $usuario->__set('id', $result->id);

    }
}

?>