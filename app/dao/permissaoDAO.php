<?php 
require_once "conexao.php";
require_once("/mnt/Projetos/PHP/blog/models/permissao.php");
class PermissaoDAO extends Conexao{
    
    public function __construct(){
        $this->conectar();
    }

    public function pesquisarID($id){
        $query = "select * from permissoes where id = :id";
        $stmt = $this->conectar()->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_OBJ);

        $permisao = new Permissao($result->permissao);
        $permisao->__set('id', $result->id);

        return $permisao;
    }

    public function listar(){
        $query = "select * from permissoes";
        $stmt = $this->conectar()->prepare($query);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        $permissoes = array();

        foreach($result as $id => $objeto){
            $permissao = new Permissao($objeto->permissao);
            $permissao->__set('id', $objeto->id);

            $permissoes[] = $permissao;
        }
        return $permissoes;
    }
}   

?>