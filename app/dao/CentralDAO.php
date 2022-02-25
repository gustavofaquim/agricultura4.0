<?php 
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require_once 'conexao.php';


class CentralDAO extends Conexao{
    
    public function __construct(){
        $this->conectar();
    }

    public function pesquisar_usuario($user){
        $query = "select * from central where usuario = :user";
        $stmt = $this->conectar()->prepare($query);
        $stmt->bindValue(':user', $user);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        $centrais = array();     

        foreach($result as $id => $objeto){
            $central = new Central($objeto->cod, $objeto->descricao, 'True', $objeto->usuario);

            $centrais[] = $central;
        }
        return $centrais;
    }
}