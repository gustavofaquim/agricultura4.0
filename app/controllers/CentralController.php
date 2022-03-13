<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);


class CentralController{


    public function listar($user){
        $centralDAO = new centralDAO();
        $lista = $centralDAO->listar($user);
        return $lista;
    }

    public function pesquisaId($id){
        $centralDAO = new CentralDAO();
        $central = $centralDAO->pesquisarID($id);
        
        return $central;
    }


}
?>