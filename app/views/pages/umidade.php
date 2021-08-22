<?php 

?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Umidade do Solo</h1>
</div>

<div class="col-lg-4">

        <!-- Collapsable Card Example -->
        <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-success">Sensor 01</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                        <div class="card-body">
                                <strong>± 0,023</strong> 
                        </div>
                </div>
        </div>

        <!-- Collapsable Card Example -->
        <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#sensor02" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="sensor02">
                        <h6 class="m-0 font-weight-bold text-success">Sensor 02</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="sensor02">
                        <div class="card-body">
                                <strong>± 0,034</strong> 
                        </div>
                </div>
        </div>

</div>

<!-- Content Row -->
<div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
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
                <!-- Card Body -->
                <div class="card-body">
                <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                </div>
                </div>
        </div>
        </div>
</div> <!-- Content Row -->
