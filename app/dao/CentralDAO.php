<?php 
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require_once 'conexao.php';
require_once 'UsuarioDAO.php';
$path = $_SERVER['DOCUMENT_ROOT'];
require_once $path.'/agricultura/app/models/Central.php';

class CentralDAO extends Conexao{
    
    public function __construct(){
        $this->conectar();
    }


    //Salvando no banco de dados
    public function salvar(Sensor $sensor){
        $query = "insert into sensor_temp (tipo_sensor, central, descricao, valor, dt_hr) values (:tipo, :central, :desc,:valor, :dt_hr);";
        $stmt = $this->conectar()->prepare($query);
        $stmt->bindValue(":tipo", $sensor->__get('tipo_sensor'));
        $stmt->bindValue(":central", $sensor->__get('central'));
        $stmt->bindValue(":desc", $sensor->__get('descricao'));
        $stmt->bindValue(":valor", $sensor->__get('valor'));
        $stmt->bindValue(":dt_hr", $sensor->__get('dt_hr'));
      
        if($stmt->execute() == False){
            echo"<pre>";
              print_r($stmt->errorInfo());
            echo"</pre>";
        }

        $sensor->__set('id', $this->conectar()->lastInsertId());

        return $sensor;
    }


    public function pesquisarID($id){
        $query = "select * from central where cod = :cod";
        $stmt = $this->conectar()->prepare($query);
        $stmt->bindValue(':cod', $id);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_OBJ);
       

        $central = new Central($result->descricao, $result->usuario);
        $central->__set('cod', $result->cod);

        return $central;
    }

    public function listar($user){
        $query = "select * from central where usuario = :user";
        $stmt = $this->conectar()->prepare($query);
        $stmt->bindValue(':user', $user);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        $centrais = array();

        $usuarioDAO = new UsuarioDAO();
        

        foreach($result as $id => $objeto){
            $usuario = $usuarioDAO->pesquisarID($_SESSION['id']);
            $central = new Central($objeto->descricao, $usuario);
            $central->__set('cod', $objeto->cod);

            $centrais[] = $central;
            
        }
        return $centrais;
    }

    

}

?>