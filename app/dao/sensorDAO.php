<?php 
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require_once 'conexao.php';


class SensorDAO extends Conexao{
    
    public function __construct(){
        $this->conectar();
    }


    //Salvando no banco de dados
    public function salvar($id, $valor, $dt_hr){
        $query = "insert into valor_sensor_temp (sensor, valor, dt_hr) values (:sensor, :valor, :dt_hr);";
        $stmt = $this->conectar()->prepare($query);
        //$stmt->bindValue(":tipo", );
        $stmt->bindValue(":sensor", $id );
        //$stmt->bindValue(":valor", );
        $stmt->bindValue(":valor", $valor);
        $stmt->bindValue(":dt_hr", $dt_hr);
      
        if($stmt->execute() == False){
            echo"<pre>";
              print_r($stmt->errorInfo());
            echo"</pre>";
        }

        //$sensor->__set('id', $this->conectar()->lastInsertId());

        return True;
    }


    public function pesquisarID($id){
        $query = "select * from sensor where id = :id";
        $stmt = $this->conectar()->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_OBJ);

        $sensor = new Sensor($result->tipo_sensor, $result->central, $result->descricao, $result->valor);
        $sensor->__set('id', $result->id);

        return $sensor;
    }

    public function listar($central){
        $query = "select c.cod, s.tipo_sensor, s.descricao, vt.id as 'id_valor', vt.sensor as 'id_sensor', vt.valor, vt.dt_hr  from central c inner join sensor s on c.cod = s.central inner join valor_sensor_temp vt on s.id = vt.sensor where c.cod = :central";
        $stmt = $this->conectar()->prepare($query);
        $stmt->bindValue(':central', $central);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        $sensores = array();
       
        
        $tiposensorDAO = new sensorDAO();
        $centralDAO = new CentralDAO();
        

        foreach($result as $id => $objeto){
            $tipo = $tiposensorDAO->tipos_sensor($objeto->tipo_sensor);
            $central  = $centralDAO->pesquisarID($objeto->cod);
            $sensor = new Sensor($tipo, $central, $objeto->descricao);
            $sensor->__set('id', $objeto->id_sensor);
            $valorSensor = new ValorSensor($sensor,$objeto->valor, $objeto->dt_hr);
            $valorSensor->__set('id', $objeto->id_valor);
           

            $sensores[] = $valorSensor;
        }
        return $sensores;
    }

    

    public function tipos_sensor($id){
        $query = 'select * from tipo_sensor where id = :id';
        $stmt = $this->conectar()->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_OBJ);

        $tipo_sensor = new TipoSensor($result->tipo, $result->icon, $result->color);
        $tipo_sensor->__set('id', $result->id);

        //var_dump($tipo_sensor); 
        return $tipo_sensor;

    }

    public function tipos_sensores(){
        $query = 'select * from tipo_sensor';
        $stmt = $this->conectar()->prepare($query);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        $tipos_sensores = array();

        foreach($result as $id => $objeto){
            $tipo_sensor = new TipoSensor($objeto->tipo, $objeto->icon, $objeto->color);
            $tipo_sensor->__set('id', $objeto->id);


            $tipos_sensores[] = $tipo_sensor;
        }
        return $tipos_sensores;

    }

    public function listar_por_tipo($id, $central){
        $query = "select c.cod, s.tipo_sensor, s.descricao, vt.id as 'id_valor', vt.sensor as 'id_sensor', vt.valor, vt.dt_hr from central c inner join sensor s on c.cod = s.central inner join valor_sensor_temp vt on s.id = vt.sensor where c.cod = :central and s.tipo_sensor = :id order by dt_hr asc LIMIT 5";
        $stmt = $this->conectar()->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':central', $central);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        
        $sensores = array();
        
        $tiposensorDAO = new sensorDAO();
        $centralDAO = new CentralDAO();

        foreach($result as $id => $objeto){
            $tipo = $tiposensorDAO->tipos_sensor($objeto->tipo_sensor);
            $central  = $centralDAO->pesquisarID($objeto->cod);
            $sensor = new Sensor($tipo, $central, $objeto->descricao);
            $sensor->__set('id', $objeto->id_sensor);
            $valorSensor = new ValorSensor($sensor,$objeto->valor, $objeto->dt_hr);
            $valorSensor->__set('id', $objeto->id_valor);
           

            $sensores[] = $valorSensor;
        }
        return $sensores;
    }
}

?>