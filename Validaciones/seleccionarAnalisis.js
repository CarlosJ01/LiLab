function seleccionarAnalisis(fila, cod, id) 
{
	
  filas = document.getElementsByTagName("tr");
  for (var i = 0; i < filas.length; i++)
  {
	 if(filas[i].id != "headTR")
	 {
		filas[i].style.background = "#ffffff";
		filas[i].className = "aHover1";
	 }
  }
  fila.style.background = "#b0d8ff";

  document.getElementById("btnEliminarAnalisis").href = "Procesar/eliminarAnalisis.php?cod="+cod+"&&id="+id;
  document.getElementById("valueModificarAnalisis").value = id;
  document.getElementById("valueModificarPaciente").value = cod;
}
