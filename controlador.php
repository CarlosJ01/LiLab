<?php
	include('bd.php'); // incluimos para poder conectar con la base de datos
	include('miEncabezado.php'); // Este archivo que incluimos contiene la definicion de la 
										//variable state y ademas iniciamos las variables de session que ofrece PHP.
	$miMensaje="";

	if(!$_SESSION['userOK']) // Si no esta Logueado mostramos LOGIN
	{
		include('LoginLiLab.html');
	}
?>