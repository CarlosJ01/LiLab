$(cualBarra());

function cualBarra(cual)
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
		url: 'barras.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {cual: cual},
	})
	.done(function(respuesta){
		$("#miBarra").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}


function miBarra(x)
{
	
	var paciente = "pills-profile-tab"
	var publicacion = "pills-contact-tab";
	
	
	if(x.id == paciente)
	{
		cualBarra(2);
	}
	else
	{
		if(x.id == publicacion)
		{
			cualBarra(3);
		}
		else
			cualBarra(0);
	}
}