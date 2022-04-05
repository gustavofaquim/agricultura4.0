
<?php 

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);



if(isset($_GET['tp'])){
        $tp = $_GET['tp']; 
   
        $sensorC = new SensorController();
        $central = $_SESSION['central_cod'];
        $sensores = $sensorC->listar_por_tipo($tp,$central);
        $cor = '';

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
                $color = $sensores[0]->__get('sensor')->__get('tipo_sensor')->__get('color');
                echo "<h4 class='text-uppercase titulo font-weight-bold bg-".$color."'>".$sensores[0]->__get('sensor')->__get('tipo_sensor')->__get('tipo')."</h4>";
        
                echo"<div class='container-fluid'> <br>";
                echo"<table class='table table-striped' id='tabela'>";
                        echo"<thead class='bg-".$color."text-white'> <tr>";
                                echo "<th scope='col'>SENSOR</th> <th scope='col'>HORÀRIO</th> <th scope='col'>VALOR</th> </tr> </thead>";
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
                echo "<a href='../xls.php?tp=".$sensores[0]->__get('sensor')->__get('tipo_sensor')->__get('id')."' target='_blank'>Exportar para o Excel</a>";
                echo"</div>";

                

                //grafico
                echo"<div class='row'>";

                
                $color = $sensor->__get('sensor')->__get('tipo_sensor')->__get('color');
                echo "<div class='col-xl-8 col-lg-7' > ";
                    echo "<div class='container text-justify'>";
                        
                 
                    echo "<div class='col-xl-7 col-lg-6'>";
                          echo "<div class='card shadow mb-4'>";
                              echo "<div class='card-body'>";
                                  echo "<div class='chart-pie pt-4'>";
                                      echo "<div id='grafico-".$sensores[0]->__get('sensor')->__get('tipo_sensor')->__get('tipo')."'></div>";
                                  echo"</div>";
                              echo"</div>";
                          echo"</div>";
                      echo"</div>";
                    
                    echo "</div>";

                echo "</div>";             
        

 
                echo"</div>";
                        

        } // Fim IF   
        
}
else{
        echo '<div class="d-sm-flex align-items-center justify-content-between mb-4"> <h1 class="h3 mb-0 text-gray-800">Nenhum sensor identificado</h1></div>';
}
?>



<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      
<!-- TEMPERATURA -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'Dia');
      data.addColumn('number', <?php $sensores[0]->__get('sensor')->__get('tipo_sensor')->__get('tipo') ?>);

      data.addRows([
        <?php 
            $sensorCT = new SensorController();
            $sensoresG = $sensorCT->listar_por_tipo($tp,$_SESSION['central_cod']);
            foreach($sensoresG as $id => $sensorG){
                echo "[".substr($sensorG->__get('dt_hr'),9,2).", ".$sensorG->__get('valor')."],";       
        }    
        ?>
      ]);

    
      var options = {
        legend: { position: 'bottom' },
        series: {
            0: { color: '<?php echo $cor ?>' },
          }
      };

      var chart = new google.charts.Line(document.getElementById('grafico-<?php echo $sensorG->__get('sensor')->__get('tipo_sensor')->__get('tipo') ?>'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    }
  </script>


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
