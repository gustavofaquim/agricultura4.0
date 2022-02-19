<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);


require_once('../app/dao/conexao.php');
require_once('../app/models/Usuario.php');


$usuario = $_POST['user'];
$senha = $_POST['senha'];

$conexao = new Conexao();
$query = "select * from usuarios where usuario = :user and senha = :senha and ativo = 1";
$stmt = $conexao->conectar()->prepare($query);
$stmt->bindValue(':user', $usuario);
$stmt->bindValue(':senha', SHA1($senha));
$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_OBJ);

        
if($result){
    $usuario = new Usuario($result->nome, $result->usuario, $result->senha, $result->grupo, $result->ativo);
    $usuario->__set('id', $result->id);
    $retorno = True;

}
else{
    $usuario = null;
    $retorno = False;
}

echo json_encode($retorno);

?>