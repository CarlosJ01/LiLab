function seleccionarPublicacion(fila)
{
  cod = fila.id;
  

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

  document.getElementById("btnEliminaPu").href = "eliminar_Nota.php?cod="+cod;
  document.getElementById("valueModificarPublicacion").value = cod;
}
