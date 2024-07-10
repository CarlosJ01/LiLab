function seleccionarPaciente(fila) 
{
  cod = fila.getElementsByTagName("th")[0].innerText;

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

  document.getElementById("btnEliminaPaciente").href = "Procesar/eleminarPaciente.php?cod="+cod;
  document.getElementById("valueModificarPaciente").value = cod;
}
