$(buscar_datosCodigo());

function buscar_datosCodigo(consulta)
{
	$.ajaxSetup({
		'beforeSend' : function(xhr) {
		try{
		xhr.overrideMimeType('text/html; charset=UTF-8');
		}
		catch(e){
		 
		 
		}
		}});
	 
	 
	$.ajax({
		url: 'buscarCodigo.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$("#datosCodigo").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}


$(document).on('keyup','#caja_busquedaCodigo', function()
{
	var valor = $(this).val();
	if (valor != "") {
		buscar_datosCodigo(valor);
	}else{
		buscar_datosCodigo();
	}
});