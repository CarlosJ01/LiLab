$(editaUsuario());

function editaUsuario(codigo)
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
	//informacion asociada de un usuario para ser modificado, esta funcion manda por el metodo POST la variable codigo(codigo del usuario a editar informacion)
	//el intermediario es editarUsuario.php quien contiene la estructura del modal editaUsuario y nuestro id destino es el id del modal
	//editaUsuario en cualquier modulo donde este especificado.
	$.ajax({
		url: 'editarUsuario.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {codigo: codigo},
	})
	.done(function(respuesta){
		$("#editaUsuario").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}



// Esta funcion es la que se ejecuta para nuestro boton editar Usuario
function editarUsuario()
{
	// leemos el valor de nuestro input para saber a cual codigo editar
	var valor = document.getElementById("valueModificarUsuario").value;
	
	if (valor != "") 
	{
		editaUsuario(valor);
	}else{
		editaUsuario();
	}
}