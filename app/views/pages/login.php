<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="app/public/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="app/public/css/style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3359b3a2da.js" crossorigin="anonymous"></script>


    <title>Acesse</title>
  </head>
  <body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

    <div class="row">
        <div class="p-5">
            <form class="user" method="POST" action='#'>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="usuario"  placeholder="Usuário">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-password" id="senha"  placeholder="Senha">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control form-control-user" id="csrf" value='56f4d65f4df4d654'>
                </div>
                                            
                <input type="button" onclick="login()" class="btn btn-primary btn-user btn-block" value="Entrar">
            </form>
        </div>
    </div>

    </div>

</div>


<script> 


function login(){

    var user = $('#usuario').val();
    var senha = $('#senha').val();

    if(user != "" && senha != ""){
        // console.log(user + " - " + senha);

        var json = {'user':user, 'senha':senha};

            $.ajax({
            type:"POST", crossDomain: true, cache: false,
            dataType:'json',
            url: '../app/login-v.php',
            //url: '..app/controllers/UsuarioController.php',
            data: {user: user, senha: senha},
            sucess: function(retorno) {
                console.log(retorno);
                window.location.href='./index.php';
            },
            error: function(e){
                console.log(e);
            }

        });
    }
    else{
        alert('Os campos não podem ser vazios.');
    }
   
}


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



<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

    
 </body>
</html>
