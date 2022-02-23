<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

session_start();


$path = $_SERVER['DOCUMENT_ROOT'];
require_once($path.'/agricultura4.0/app/dao/conexao.php');
require_once($path.'/agricultura4.0/app/models/Usuario.php');

$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '' ;
$senha = (isset($_POST['senha'])) ? $_POST['senha'] : '' ;



$conexao = new Conexao();
$query = "select * from usuarios where usuario = :user and senha = :senha and ativo = 1";
$stmt = $conexao->conectar()->prepare($query);
$stmt->bindValue(':user', $usuario);
$stmt->bindValue(':senha', SHA1($senha));
$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_OBJ);
//var_dump($result);
        
if($result != False){
	//var_dump("Etrouuuuu");
    $_SESSION['id'] = $result->id; 
	$_SESSION['nome'] = $result->nome;
	$_SESSION['usuario'] = $result->usuario;
	$_SESSION['senha'] = $result->senha;
	$_SESSION['grupo'] = $result->grupo;
    $_SESSION['ativo'] = $result->ativo;
	$_SESSION['logado'] = 'SIM';
	//var_dump($_SESSION);

}
else{
    $_SESSION['logado'] = 'NAO';
}

// Se logado envia código 1, senão retorna mensagem de erro para o login
if ($_SESSION['logado'] == 'SIM'){
	$retorno = array('codigo' => 1, 'mensagem' => 'Logado com sucesso!');
	echo json_encode($retorno);
	exit();
}
else{
	$retorno = array('codigo' => '0', 'mensagem' => 'Usuário ou senha incorretos');
	echo json_encode($retorno);
	exit();
}



?>