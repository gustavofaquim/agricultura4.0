<?php

class Conexao{
  private $host = 'localhost'; 
  private $db = 'agricultura';
  private $usuario = 'gustavo'; 
  private $senha = '123456789'; 

  /*private $host = 'localhost'; 
  private $db = 'id18375770_agricultura';
  private $usuario = 'id18375770_ifagricultura';
  private $senha = '<GOh~xaK2@|GT{l)';*/ 


  public function conectar(){
    try{
      $conexao = new PDO(
        "mysql:host=$this->host;dbname=$this->db",
        "$this->usuario", "$this->senha"
      );
      return $conexao;
    } catch (PDOException $e){
      echo $e->getMessage();
    }
  }
}

?>