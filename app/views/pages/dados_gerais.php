
<?php 

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);



$sensorC = new SensorController();
$central = $_SESSION['central_cod'];
$sensores = $sensorC->listar($central);
$cor = '#ffc107';

if($sensores[0]->__get('sensor')->__get('tipo_sensor')->__get('tipo') === 'umidade'){    
        $cor = '#1cc88a';       
}
else if($sensores[0]->__get('sensor')->__get('tipo_sensor')->__get('tipo') === 'temperatura'){
        $cor = '#e74a3b';
}
else if($sensores[0]->__get('sensor')->__get('tipo_sensor')->__get('tipo') ==='solo'){
        $cor = '#36b9cc';
}


if(!empty($sensores)){
        $color = 'warning';
        echo "<h4 class='text-uppercase titulo font-weight-bold bg-".$color."'>DADOS GERAIS</h4>";

        echo"<div class='container-fluid'> <br>";
        echo"<table class='table table-striped' id='tabela'>";
                echo"<thead class='bg-".$color."text-white'> <tr>";
                        echo "<th scope='col'>SENSOR</th> <th scope='col'>HORÁRIO</th> <th scope='col'>VALOR</th></tr> </thead>";
                        echo"<tbody> <tr>";
                                
                        foreach($sensores as $id => $sensor){
                                echo "<tr>";
                                echo "<td>".$sensor->__get('sensor')->__get('descricao')."</td>";
                                echo "<td>".$sensor->__get('dt_hr')."</td>";                
                                echo "<td>".$sensor->__get('valor')."</td></tr>";
                        }
                
                        echo"</tr>";
                echo"</tbody>";
        echo"</table>";

        //echo "<a href='?i=exporta&tp=".$sensores[0]->__get('tipo_sensor')->__get('id')."' target='_blank'>Exportar para o Excel</a>";
        echo "<a href='../dados_gerais_export.php' target='_blank'>Exportar para o Excel</a>";
        echo"</div><br><br><br>";

        
        

} // Fim IF   
        

?>
