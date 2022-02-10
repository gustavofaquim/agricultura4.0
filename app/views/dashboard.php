<?php 
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);


$sensorC = new SensorController();
//$sensores = $sensorC->listar();
$tiposensor = $sensorC->tipos_sensores();
$sensores = $sensorC->sensores_dashboard();
#$sensor = $sensorC->pesquisaId(1);


?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dados gerais</h1>
    </div>


    <!-- Content Row -->
     <div class="row">

        <!-- UMIDADE DO SOLO-->
        <?php 
        
        foreach($sensores as $id =>$sensor){
            $color = $sensor->__get('tipo_sensor')->__get('color');
        echo"<div class='col-xl-3 col-md-6 mb-4'>";
            echo"<div class='card border-left-".$color." shadow h-100 py-2'>";
                echo"<div class='card-body'>";
                    echo"<div class='row no-gutters align-items-center'>";
                       echo"<div class='col mr-2'>";
                       //echo"<a href='?i=".$sensor['link']."'>";
                       echo"<a href='?i=dados&tp=".$sensor->__get('tipo_sensor')->__get('id')."'>";
                                    echo "<div class='text-xs font-weight-bold text-".$color." text-uppercase mb-1'>".$sensor->__get('tipo_sensor')->__get('tipo')."</div>";
                                    echo "<div id='cardSensor'class='h5 mb-0 font-weight-bold text-gray-800'>".$sensor->__get('valor')."</div>";          
                        echo"</a></div>";
                        echo"<div class='col-auto'>";
                            echo"<i class='".$sensor->__get('tipo_sensor')->__get('icon')." text-gray-300'></i>";
                        echo"</div>";
                    echo"</div>";
                echo"</div>";
            echo"</div>";
        echo"</div>";
        }
        ?>

     
         <!-- Quantidade de acionamentos 
         <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                       <div class="col mr-2">
                                <a href="?i=acionamento">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Acionamentos</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">5</div>
                                </a>
                        </div>
                        <div class="col-auto">
                            <i class="far fa-arrow-alt-circle-up fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
     </div>
</div>
