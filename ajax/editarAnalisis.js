$(editaAnalisis());

function editaAnalisis(codigo, id)
{
	// establemecemos siste de caracteres especiales en AJAX, para mostar ñ's y acentos
	$.ajaxSetup({
		'beforeSend' : function(xhr) {
		try{
		xhr.overrideMimeType('text/html; charset=UTF-8');
		}
		catch(e){
		 
		 
		}
		}});
	
	// aqui nuestra funcion AJAX que siempre nos va a mostrar un modal con la 
	//informacion asociada de un analisis para ser modificado, esta funcion manda por el metodo POST la variable codigo(codigo del paciente a editar informacion)
	//y la variable id(id del analisis) el intermediario es editarAnalisis.php quien contiene la estructura del modal editaAnalisis. y nuestro id destino es el id del modal
	//editaAnalsis en cualquier modulo donde este especificado.
	$.ajax({
		cache: false,
		url: 'editarAnalisis.php',
		type: 'POST',
		dataType: 'html',
		data: {codigo: codigo, id: id},
	})
	.done(function(respuesta){
		$("#editaAnalisis").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}


// Esta funcion es la que se ejecuta para nuestro boton editar Analisis
function editarAnalisis()
{
	// leemos el valor de nuestro input para saber a cual codigo editar y cual id editar
	var varCodigo = document.getElementById("valueModificarPaciente").value;
	var varId = document.getElementById("valueModificarAnalisis").value;
	
	if (varCodigo != "" && varId != "") 
	{
		editaAnalisis(varCodigo, varId);
	}else{
		editaAnalisis();
	}
}
