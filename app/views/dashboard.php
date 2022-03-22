

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


<h4 class='text-uppercase titulo-meteorologico font-weight-bold'>Dados meteorológicos</h4>
    <div class='container-fluid' id='card-meteorologicos'>    
        <div class="row">
            <?php 
            if (is_array($sensores) || is_object($sensores)){
                foreach($sensores as $id =>$sensor){
                    if($sensor->__get('sensor')->__get('tipo_sensor')->__get('tipo') != 'solo'){ //apagar depois
                      $color = $sensor->__get('sensor')->__get('tipo_sensor')->__get('color');
                        echo"<div class='col-xl-2 col-md-6 mb-4' id='sensores'>";
                            echo"<div class='card border-left-".$color." shadow h-100 py-2'>";
                                echo"<div class='card-body'>";
                                    echo"<div class='row no-gutters align-items-center'>";
                                    echo"<div class='col mr-2'>";
                                    //echo"<a href='?i=".$sensor['link']."'>";
                                    echo"<a href='?i=dados&tp=".$sensor->__get('sensor')->__get('tipo_sensor')->__get('id')."'>";
                                                    echo "<div id='sensor-".$sensor->__get('sensor')->__get('tipo_sensor')->__get('tipo')."' class='text-xs font-weight-bold text-".$color." text-uppercase mb-1'>".$sensor->__get('sensor')->__get('tipo_sensor')->__get('tipo')." ambiente</div>";
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
                    
            }
            else{
                echo "<h4>Sem dados para exibir no momento</h4>";
            }
            ?>
      </div>
    </div>

    <h4 class='text-uppercase titulo-solo font-weight-bold'>Sensores de Umidade do Solo</h4>
      
    <div class='container-fluid' id='card-solo'>  
      <div class="row">
        <?php

              
          $sensorCT = new SensorController();
          $sensoresG = $sensorCT->listar_por_tipo(5,$_SESSION['central_cod']);

          if (is_array($sensoresG) || is_object($sensoresG)){
            foreach($sensoresG as $id =>$sensorG){
              $color = $sensor->__get('sensor')->__get('tipo_sensor')->__get('color');
                          echo"<div class='col-xl-2 col-md-6 mb-4' id='sensores'>";
                              echo"<div class='card border-left-".$color." shadow h-100 py-2'>";
                                  echo"<div class='card-body'>";
                                      echo"<div class='row no-gutters align-items-center'>";
                                      echo"<div class='col mr-2'>";
                                      //echo"<a href='?i=".$sensor['link']."'>";
                                      echo"<a href='?i=dados&tp=".$sensorG->__get('sensor')->__get('tipo_sensor')->__get('id')."'>";
                                                      echo "<div id='sensor-".$sensorG->__get('sensor')->__get('tipo_sensor')->__get('tipo')."' class='text-xs font-weight-bold text-".$color." text-uppercase mb-1'>".$sensorG->__get('sensor')->__get('descricao')."</div>";
                                                      echo "<div id='valor-".$sensorG->__get('sensor')->__get('tipo_sensor')->__get('tipo')."'class='h5 mb-0 font-weight-bold text-gray-800'>".$sensorG->__get('valor')."</div>";          
                                          echo"</a></div>";
                                          echo"<div class='col-auto'>";
                                              echo"<i class='".$sensorG->__get('sensor')->__get('tipo_sensor')->__get('icon')." text-gray-300'></i>";
                                          echo"</div>";
                                      echo"</div>";
                                  echo"</div>";
                              echo"</div>";
                          echo"</div>";
            }
          }
        
        ?>
    </div>
    </div>

    

  



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