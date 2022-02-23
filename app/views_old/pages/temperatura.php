<?php 

?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Temperatura</h1>
</div>


<table class="table table-striped">
        <thead class='cabecalho-tabela'>
                <tr>
                <th scope='col'>SENSOR</th>
                <th scope='col'>VALOR</th>
                <th scope='col'>HORÁRIO</th>
                </tr>
        </thead>
        <tbody>
                <tr>
                        <?php
                        foreach($sensores as $id => $sensor){
                                echo "<tr>";
                                echo "<td>".$sensor->__get('descricao')."</td>";
                                echo "<td>".$sensor->__get('valor')."</td>";
                                echo "<td> 02/02/2022 15h20</td></tr>";
                        }
                        ?>
                </tr>
        </tbody>
</table>



 
<!-- Temperatura 
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                        <a href="?i=temperatura">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Temperatura atual</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">32°C</div>
                        </a>
                </div>
                <div class="col-auto">
                    <i class="fas fa-temperature-low fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
        
        <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
               
                <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-danger">Media da Temperatura</h6>
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
                        </div>
                </div>
                </div>
                
                <div class="card-body">
                <div class="chart-area">
                        <canvas id="graficoTemperatura"></canvas>
                </div>
                </div>
        </div>
        </div>
</div> -->