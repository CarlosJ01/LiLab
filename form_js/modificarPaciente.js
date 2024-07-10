$(paciente());

function paciente(codigo)
{
	$.ajax({
		url: 'modificarPaciente.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {codigo: codigo},
	})
	.done(function(respuesta){
		$("#listaAnalisis").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}


$(document).on('click','#ver-lista', function()
{
	var valor = "jiji";
	if (valor != "") {
		paciente(valor);
	}else{
		paciente();
	}
});