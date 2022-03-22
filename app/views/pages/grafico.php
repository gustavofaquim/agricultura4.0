  
    <div class="row">
      <?php 
          if (is_array($sensores) || is_object($sensores)){
              foreach($sensores as $id =>$sensor){

                  $color = $sensor->__get('sensor')->__get('tipo_sensor')->__get('color');
                  echo "<div class='col-xl-8 col-lg-7' > ";
                      echo "<div class='container text-justify'>";
                          
                    // <!--  Grafico -->
                      echo "<div class='col-xl-7 col-lg-6'>";
                            echo "<div class='card shadow mb-4'>";
                                //<!-- Card Header - Dropdown -->
                                //echo "<div class='card-header py-3'>";
                                  //echo"<h6 class='m-0 font-weight-bold text-primary'> Umidade do Solo </h6> ";
                                //echo"</div>";
                                //<!-- Card Body -->
                                echo "<div class='card-body'>";
                                    echo "<div class='chart-pie pt-4'>";
                                        echo "<div id='grafico-".$sensor->__get('sensor')->__get('tipo_sensor')->__get('tipo')."'></div>";
                                    echo"</div>";
                                echo"</div>";
                            echo"</div>";
                        echo"</div>";
                      
                      echo "</div>";

                  echo "</div>";
              }
          }

      ?>
    </div>


<?php 
            $sensorCT = new SensorController();
            $sensoresG = $sensorC->listar_por_tipo(3,$_SESSION['central_cod']);
            foreach($sensoresG as $id => $sensorG){
                echo "[".substr($sensorG->__get('dt_hr'),9,2).", ".$sensorG->__get('valor')."],";           
            }    
        ?>
                    
<!-- UMIDADE -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
      google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'Dia');
      data.addColumn('number', 'Umidade do Solo');
     
    
    
      data.addRows([
        <?php 
            $sensorCT = new SensorController();
            $sensoresG = $sensorCT->listar_por_tipo(1,$_SESSION['central_cod']);
            foreach($sensoresG as $id => $sensorG){
                echo "[".substr($sensorG->__get('dt_hr'),8,2).", ".$sensorG->__get('valor')."],";           
        }    
        ?>
      ]);
      

      var options = {
        legend: { position: 'bottom' },
        series: {
            0: { color: '#1cc88a' },
          }
      };

      var chart = new google.charts.Line(document.getElementById('grafico-umidade'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    }
  </script>



<!-- TEMPERATURA -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'Dia');
      data.addColumn('number', 'Temperatura');

      data.addRows([
        <?php 
            $sensorCT = new SensorController();
            $sensoresG = $sensorCT->listar_por_tipo(3,$_SESSION['central_cod']);
            foreach($sensoresG as $id => $sensorG){
                echo "[".substr($sensorG->__get('dt_hr'),9,2).", ".$sensorG->__get('valor')."],";           
        }    
        ?>
      ]);

      var options = {
        legend: { position: 'bottom' },
        series: {
            0: { color: '#e74a3b' },
          }
      };

      var chart = new google.charts.Line(document.getElementById('grafico-<?php echo $sensorG->__get('sensor')->__get('tipo_sensor')->__get('tipo') ?>'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    }
  </script>


<script type="text/javascript">
      google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'Dia');
      data.addColumn('number', 'Sensor de Ar');

      data.addRows([
        <?php 
            $sensorCT = new SensorController();
            $sensoresG = $sensorCT->listar_por_tipo(4);
            $cont = 0;
            foreach($sensoresG as $id => $sensorG){
                $cont ++;
                echo "[".substr($sensorG->__get('dt_hr'),8,2).", ".$sensorG->__get('valor')."],";       
        }    
        ?>
      ]);

      var options = {
        legend: { position: 'bottom' },
        series: {
            0: { color: '#36b9cc' },
          }
      };

      var chart = new google.charts.Line(document.getElementById('grafico-<?php echo $sensorG->__get('sensor')->__get('tipo_sensor')->__get('tipo') ?>'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    }
  </script>



