

<script type="text/javascript">
      google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'Dia');
      data.addColumn('number', 'Umidade do Solo');
     
    
    
      /*data.addRows([
        [1,  37.8],
        [2,  30.9],
        [3,  100.0],
        [4,  11.7],
        [5,  11.9],
        [6,   8.8],
        [7,   7.6],
        [8,  12.3],
        [9,  16.9],
        [10, 12.8],
        [11,  5.3],
        [12,  6.6],
        [13,  4.8],
        [14,  4.2]
      ]);*/

      data.addRows([
        <?php 

            $sensorCT = new SensorController();
            $sensoresG = $sensorCT->listar_por_tipo($sensores->get('tipo_sensor')->__get('tipo'));
          

            $cont = 0;
            foreach($sensores as $id => $sensorG){
                $cont ++;
                echo "[".$cont.", ".$sensorG->__get('valor')."],";          
        }   
            
            
        ?>
      ]);

      var options = {
        legend: { position: 'bottom' },
        series: {
            0: { color: <?php echo "'".$color."'" ?> },
          }
      };

      var chart = new google.charts.Line(document.getElementById('grafico-<?php echo $sensorG->__get('tipo_sensor')->__get('tipo') ?>'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    }
  </script>