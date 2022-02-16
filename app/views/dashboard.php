

<!--<script src="../public_html/assets/js/dashboard.js"></script> -->


<?php 
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);


$sensorC = new SensorController();
//$tiposensor = $sensorC->tipos_sensores();
$sensores = $sensorC->sensores_dashboard();


if(isset($_GET['retornos'])){
    $pagina = addslashes($_GET['retornos']); 
    //var_dump($pagina);
}


?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dados gerais</h1>
    </div>


    <!-- Content Row -->
     <div class="row">

        <!-- UMIDADE DO SOLO-->
        <?php 
        if (is_array($sensores) || is_object($sensores)){
            foreach($sensores as $id =>$sensor){
                $color = $sensor->__get('tipo_sensor')->__get('color');
                echo"<div class='col-xl-3 col-md-6 mb-4' id='sensores'>";
                    echo"<div class='card border-left-".$color." shadow h-100 py-2'>";
                        echo"<div class='card-body'>";
                            echo"<div class='row no-gutters align-items-center'>";
                            echo"<div class='col mr-2'>";
                            //echo"<a href='?i=".$sensor['link']."'>";
                            echo"<a href='?i=dados&tp=".$sensor->__get('tipo_sensor')->__get('id')."'>";
                                            echo "<div id='sensor-".$sensor->__get('tipo_sensor')->__get('tipo')."' class='text-xs font-weight-bold text-".$color." text-uppercase mb-1'>".$sensor->__get('tipo_sensor')->__get('tipo')."</div>";
                                            echo "<div id='valor-".$sensor->__get('tipo_sensor')->__get('tipo')."'class='h5 mb-0 font-weight-bold text-gray-800'>".$sensor->__get('valor')."</div>";          
                                echo"</a></div>";
                                echo"<div class='col-auto'>";
                                    echo"<i class='".$sensor->__get('tipo_sensor')->__get('icon')." text-gray-300'></i>";
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