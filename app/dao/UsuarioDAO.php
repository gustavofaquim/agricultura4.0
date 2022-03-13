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
        $query = "select * from usuarios where usuario = :user and senha = :senha and ativo = 1";
        $stmt = $this->conectar()->prepare($query);
        $stmt->bindValue(':user', $user);
        $stmt->bindValue(':senha', SHA1($senha));
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_OBJ);

        if($result){
            $usuario = new Usuario($result->nome, $result->usuario, $result->senha, $result->grupo, $result->ativo);
            $usuario->__set('id', $result->id);
        }
        else{
            $usuario = null;
        }

        return $usuario;
    }

    public function pesquisarID($id){
        $query = "select * from usuarios where id = :id";
        $stmt = $this->conectar()->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_OBJ);
        $usuario = new Usuario($result->nome,$result->usuario,$result->senha,$result->grupo,$result->ativo);
        $usuario->__set('id', $result->id);

        return $usuario;
    }
}

?>