$(document).ready(function(){
	var att = window.localStorage.getItem('retornos'); //Criamos a variável ATT para receber a variável global retornos
	setInterval(function(){//Quando o documento estiver pronto, dê um setinvertal em qualquerCoisa()
    qualquerCoisa(att); //Enviamos os valores contidos na variável ATT como parâmetro na execução do ajax
    	}, 2000 );//o setInterval será executado a cada 2 segundo, caso queira que seja executado a cada 5 segundos seria "5000".	
});
 function qualquerCoisa(retornos){ //Recebemos o parâmetro com o nome de "retornos"
	$.ajax({
		type:'post',		
		dataType: 'json',	
		url: '../app/ajax.php',
        data: {retornos},//Enviamos "retornos" para o PHP usando o "data", ele será recebido no PHP como "$_POST['retornos']".
		success: function(dados){
			console.log(dados[0]);
			for(var i=0;dados.length>i;i++){
				var d = $('#db');
				d.append('<p> Tipo Sensor: ' + dados[i].tipo_sensor + '</p>');
        d.append('<p> Descrição>: ' + dados[i].desc  + '</p>');
        d.append('<p> Valor: ' + dados[i].valor +'</p>');
        d.append('<p> Data:' + dados[i].dt_hr +'</p>');
			}
        window.localStorage.setItem('retornos', dados.length);//Salvamos os dados retornados no success na nossa variável, e na próxima execução ela estará alterada para o valor de retornos que tivemos do PHP.
		}
	});
  }