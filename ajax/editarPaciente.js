$(editaPaciente());

function editaPaciente(codigo)
{
	// establemecemos sistema de caracteres especiales en AJAX, para mostar ñ's y acentos
	$.ajaxSetup({
		'beforeSend' : function(xhr) {
		try{
		xhr.overrideMimeType('text/html; charset=UTF-8');
		}
		catch(e){
		 
		 
		}
		}});
	
	
	
	// aqui nuestra funcion AJAX que siempre nos va a mostrar un modal con la 
	//informacion asociada de un paciente para ser modificado, esta funcion manda por el metodo POST la variable codigo(codigo del paciente a editar informacion)
	//el intermediario es editarPaciente.php quien contiene la estructura del modal editaPaciente. y nuestro id destino es el id del modal
	//editaPaciente en cualquier modulo donde este especificado.
	$.ajax({
		url: 'editarPaciente.php' ,
		encoding:"UTF-8",
		type: 'POST' ,
		dataType: 'html',
		data: {codigo: codigo},
	})
	.done(function(respuesta){
		$("#editaPaciente").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}


// Esta funcion es la que se ejecuta para nuestro boton editar Paciente
function editarPaciente()
{
	// leemos el valor de nuestro input para saber a cual codigo editar
	var valor = document.getElementById("valueModificarPaciente").value;
	
	
	// verificamos que no sea valor vacio
	if (valor != "") 
	{
		editaPaciente(valor);
	}else{
		editaPaciente();
	}
}
