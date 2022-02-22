<?php 

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);



if(isset($_GET['tp'])){
        $tp = $_GET['tp']; 
   
        $sensorC = new SensorController();
        $sensores = $sensorC->listar_por_tipo($tp);
        
        if(!empty($sensores)){
                echo"<div class='d-sm-flex align-items-center justify-content-between mb-4'>";
                        echo"<h1 class='h3 mb-0 text-gray-800 text-uppercase'>".$sensores[0]->__get('tipo_sensor')->__get('tipo')."</h1> </div>";


                echo"<table class='table table-striped'>";
                        echo"<thead class='bg-".$sensores[0]->__get('tipo_sensor')->__get('color')."text-white'> <tr>";
                                echo "<th scope='col'>SENSOR</th> <th scope='col'>VALOR</th> <th scope='col'>HORÁRIO</th> </tr> </thead>";
                                echo"<tbody> <tr>";
                                        
                                foreach($sensores as $id => $sensor){
                                        echo "<tr>";
                                        echo "<td>".$sensor->__get('descricao')."</td>";
                                        echo "<td>".$sensor->__get('valor')."</td>";
                                        echo "<td>".$sensor->__get('dt_hr')."</td></tr>";                
                                }
                        
                                echo"</tr>";
                        echo"</tbody>";
                echo"</table>";

                //echo "<a href='?i=exporta&tp=".$sensores[0]->__get('tipo_sensor')->__get('id')."' target='_blank'>Exportar para o Excel</a>";
                echo "<a href='../xls.php?tp=".$sensores[0]->__get('tipo_sensor')->__get('id')."' target='_blank'>Exportar para o Excel</a>";
        
        } // Fim IF   
        
}
else{
        echo '<div class="d-sm-flex align-items-center justify-content-between mb-4"> <h1 class="h3 mb-0 text-gray-800">Nenhum sensor identificado</h1></div>';
}
?>
      



<!-- Content Row 
<div class="row">

    
        <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
           
                <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Media Relativa da Umidade do Solo</h6>
                <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header"></div>
                        <a class="dropdown-item" href="#">Exportar Gráfico</a>
                        <a class="dropdown-item" href="#">Mudar Série Temporal</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Visualizar Gráfico por Sensor</a> 
                        </div>
                </div>
                </div>
                
                <div class="card-body">
                <div class="chart-area">
                        <canvas id="graficoUmidade"></canvas>
                </div>
                </div>
        </div>
        </div>
</div>  -->
