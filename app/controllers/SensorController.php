<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

#require_once("/mnt/Projetos/PHP/blog/dao/usuarioDAO.php");
#require_once("/mnt/Projetos/PHP/blog/models/usuario.php");
#require_once("/mnt/Projetos/PHP/blog/controllers/PermissaoController.php");
#require_once("../../../dao/sensorDAO.php");


class SensorController{
    
    #private Sensor $sensor;

    public function __construct()
    {
        
    }

    public function listar(){
        $sensorDAO = new SensorDAO();
        $lista = $sensorDAO->listar();
        return $lista;
    }

    public function pesquisaId($id){
        $sensorDAO = new SensorDAO();
        $sensor = $sensorDAO->pesquisarID($id);
        
        return $sensor;
    }


    public function tipos_sensores(){
        $tipoSensorDAO = new SensorDAO();
        $lista = $tipoSensorDAO->tipos_sensores();
        return $lista;
    }

    public function sensores_dashboard(){
        $sensorDAO = new SensorDAO();
        $lista = $sensorDAO->listar();
        
        //$sensores = array();
        
        foreach($lista as $id=>$list){
            $sensores[$list->__get('tipo_sensor')->__get('tipo')] = $list;
            
           
            /*if(strpos($list->__get('tipo_sensor')->__get('tipo'), 'pluviometrico') !== false){
            //$chuva = array('tipo_sensor'=>$list->__get('tipo_sensor')->__get('tipo'), 'tp_sensor'=>$list 'valor'=> $list->__get('valor'), 'tipo'=> 'primary', 'icon'=>'fas fa-cloud-rain fa-2x', 'link'=>'chuva');
            $sensores[$list->__get('tipo_sensor')->__get('tipo')] = $chuva;
           }
           else if(strpos($list->__get('tipo_sensor')->__get('tipo'), 'umidade') !== false){
            //$umidade = array('tipo_sensor'=>$list->__get('tipo_sensor')->__get('tipo'), 'valor'=> $list->__get('valor'), 'tipo'=> 'success', 'icon'=>'fas fa-tint fa-2x', 'link'=>'umidade');
            $sensores['umidade'] = $umidade;
           }
           else if(strpos($list->__get('tipo_sensor')->__get('tipo'), 'temperatura') !== false){
            //$temperatura = array('tipo_sensor'=>$list->__get('tipo_sensor')->__get('tipo'), 'valor'=> $list->__get('valor'), 'tipo'=> 'danger', 'icon'=>'fas fa-temperature-low fa-2x', 'link'=>'temperatura');
            $sensores['temperatura'] = $temperatura;
           }*/
        }

        //echo "<pre>";
        //print_r($sensores);
        //echo "</pre>";
        
        return $sensores;
    }

    public function listar_por_tipo($id_tipo){
        $sensorDAO = new SensorDAO();
        $lista = $sensorDAO->listar_por_tipo($id_tipo);
        return $lista;
    }

    public function cadastrar(Sensor $sensor){
        //echo "<pre>";
        //var_dump($sensor);
        //echo "</pre>";
        //$this->sensor = new Sensor($_GET['tipo'],$_GET['desc'],$_GET['valor']);
        $sensorDAO = new SensorDAO();
        
        $sensorDAO->salvar($sensor);
        
        header("Location: index.php");
        die();
    }
    
}

?>