<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);


class CentralController{
    
    #private Sensor $sensor;

    public function __construct()
    {
        
    }

    public function pesquisar_usuario($user){
        $centralDAO = new CentralDAO();
        $central = $centralDAO->pesquisar_usuario($user);
        
        return $central;
    }
}