function validarFormularioPublicacion()
{
  //Parte del usuario
  
  
  
  
      var img_1 = document.getElementById("imgCarrusel");
      var img_2 = document.getElementById("imgCuerpo");
	  var miExtensionIMG_1 = img_1.value;
	  var miExtensionIMG_2 = img_2.value;
	  var flag_1 = false;
	  var flag_2 = false;
	  

	
	if(miExtensionIMG_1 != "" || miExtensionIMG_2 != "") 
	{
	  //Mis imagenes
	  if (extencionIMG(miExtensionIMG_1))
	  {
		  flag_1 = true;
	  }
	  if(extencionIMG(miExtensionIMG_2))
	  {
		  flag_2 = true;
	  }
	  
	}
	else
	{
		alert('Por favor Seleccione una imagen del tipo .jpeg/.jpg/.png/.gif');
		img_1.value = '';
		img_2.value = '';
		return false;
	}
	
	
	if(flag_1 == true || flag_2 == true)
		return true;
	else
	{
		alert('Por favor Seleccione una imagen del tipo .jpeg/.jpg/.png/.gif');
		img_1.value = '';
		img_2.value = '';
		return false;
	}
}

function extencionIMG(doc)
{
  var miExtensiones = /(.jpg|.jpeg|.png|.gif)$/i;
  if(!miExtensiones.exec(doc))
  {
		return false;
  }
  else
	return true;
}