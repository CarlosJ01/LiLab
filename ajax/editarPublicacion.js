$(editaPublicacion());

function editaPublicacion(codigo)
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
	//informacion asociada de una Publicacion para ser modificado, esta funcion manda por el metodo POST la variable codigo(codigo de la publicacion)
	//el intermediario es editarPublicacion.php quien contiene la estructura del modal editaPublicacion y nuestro id destino es el id del modal
	//editaPublicacion en cualquier modulo donde este especificado.
	$.ajax({
		url: 'editaPublicacion.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {codigo: codigo},
	})
	.done(function(respuesta){
		$("#editaPublicacion").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}


// Esta funcion es la que se ejecuta para nuestro boton editar Publicacion
function editarPublicacion()
{
	// leemos el valor de nuestro input para saber a cual codigo editar
	var valor = document.getElementById("valueModificarPublicacion").value;
	
	if (valor != "") 
	{
		editaPublicacion(valor);
	}else{
		editaPublicacion();
	}
}