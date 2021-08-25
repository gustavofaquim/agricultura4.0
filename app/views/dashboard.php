<?php 
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dados gerais</h1>
    </div>


    <!-- Content Row -->
     <div class="row">

        <!-- UMIDADE DO SOLO-->
        
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                       <div class="col mr-2">
                           <a href="?i=umidade">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Umidade do Solo</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">± 0,045</div>
                            </a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tint fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CHUVA -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                       <div class="col mr-2">
                            <a href="?i=chuva">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">CHUVA</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">20%</div>
                            </a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-cloud-rain fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

         <!-- Quantidade de acionamentos -->
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
        </div>


        <!-- Temperatura -->
         <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                       <div class="col mr-2">
                                <a href="?i=temperatura">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Temperatura</div>
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


     </div>
</div>
