

<!--<script src="../public_html/assets/js/dashboard.js"></script> -->


<?php 
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);




if(isset($_GET['c'])){
   $_SESSION['central_cod'] = $_GET['c'];
}
$central = $_SESSION['central_cod'];
$sensorC = new SensorController();
$sensores = $sensorC->sensores_dashboard($central);
$centralC = new CentralController();
$central = $centralC->pesquisaId($central);


if(isset($_GET['retornos'])){
    $pagina = addslashes($_GET['retornos']); 
    //var_dump($pagina);
}



?>
    <div class='container-fluid' id='card-geral'>
        <div class="">
            <h1 class=''><?php echo $central->__get('descricao') ?></h1>
            <span>Ultima atualização: data</span>
        </div>
        <br> 
        
        <div class="row">

            <!-- UMIDADE DO SOLO-->
            <?php 
            if (is_array($sensores) || is_object($sensores)){
                foreach($sensores as $id =>$sensor){
                    $color = $sensor->__get('sensor')->__get('tipo_sensor')->__get('color');
                    echo"<div class='col-xl-2 col-md-6 mb-4' id='sensores'>";
                        echo"<div class='card border-left-".$color." shadow h-100 py-2'>";
                            echo"<div class='card-body'>";
                                echo"<div class='row no-gutters align-items-center'>";
                                echo"<div class='col mr-2'>";
                                //echo"<a href='?i=".$sensor['link']."'>";
                                echo"<a href='?i=dados&tp=".$sensor->__get('sensor')->__get('tipo_sensor')->__get('id')."'>";
                                                echo "<div id='sensor-".$sensor->__get('sensor')->__get('tipo_sensor')->__get('tipo')."' class='text-xs font-weight-bold text-".$color." text-uppercase mb-1'>".$sensor->__get('sensor')->__get('tipo_sensor')->__get('tipo')."</div>";
                                                echo "<div id='valor-".$sensor->__get('sensor')->__get('tipo_sensor')->__get('tipo')."'class='h5 mb-0 font-weight-bold text-gray-800'>".$sensor->__get('valor')."</div>";          
                                    echo"</a></div>";
                                    echo"<div class='col-auto'>";
                                        echo"<i class='".$sensor->__get('sensor')->__get('tipo_sensor')->__get('icon')." text-gray-300'></i>";
                                    echo"</div>";
                                echo"</div>";
                            echo"</div>";
                        echo"</div>";
                    echo"</div>";
                }
            }
            else{
                echo "<h4>Sem dados para exibir no momento</h4>";
            }
            ?>
        </div>

    </div>

    <?php 
        if (is_array($sensores) || is_object($sensores)){
            foreach($sensores as $id =>$sensor){
               // include_once(__DIR__.'/../graficos/grafico_'.$sensor->__get('tipo_sensor')->__get('tipo').".php");
                $color = $sensor->__get('sensor')->__get('tipo_sensor')->__get('color');
                echo "<h4 class='text-uppercase titulo font-weight-bold bg-".$color."'>".$sensor->__get('sensor')->__get('tipo_sensor')->__get('tipo')."</h4>";
                echo "<div class='container-fluid sensores id='card-page-sensores' > ";
                    echo "<div class='container text-justify'>";
                        
                   // <!--  Grafico -->
                    echo "<div class='col-xl-8 col-lg-6'>";
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






<script>
$(document).ready(function(){
	var att = window.localStorage.getItem('retornos'); //Criamos a variável ATT para receber a variável global retornos
	setInterval(function(){//Quando o documento estiver pronto, dê um setinvertal em qualquerCoisa()
    qualquerCoisa(att); //Enviamos os valores contidos na variável ATT como parâmetro na execução do ajax
    	}, 5000 );//o setInterval será executado a cada 2 segundo, caso queira que seja executado a cada 5 segundos seria "5000".	
});
 function qualquerCoisa(retornos){ //Recebemos o parâmetro com o nome de "retornos"
	$.ajax({
		type:'post',		
		dataType: 'json',	
		url: '../app/ajax.php',
        data: {retornos},//Enviamos "retornos" para o PHP usando o "data", ele será recebido no PHP como "$_POST['retornos']".
		success: function(dados){
            
            for (var item in dados){
                //console.log(item + " - " + dados[item].valor);
                $("#valor-" + item).html(dados[item].valor);
            }
            
           
            /*if(dados['umidade'].valor != $('#cardSensor').text()){
                $('cardSensor'.text())
            }*/
            //console.log($('#valor-'+dados['umidade'].tipo_sensor.tipo).text());
            //$("#cardSensor").html(dados['umidade'].valor);
			
            window.localStorage.setItem('retornos', dados.length);//Salvamos os dados retornados no success na nossa variável, e na próxima execução ela estará alterada para o valor de retornos que tivemos do PHP.
		}
	});
  }

</script>