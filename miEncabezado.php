<?php
	date_default_timezone_set('America/Mexico_City');
 	
	SESSION_START();
	if(!isset($_SESSION['userOK']))
	{
		$_SESSION['userOK']=false;
	}
	
	if(!isset($_GET['state']))
	{
		$state= -10; //la aplicación está iniciando
		$miMensaje="";
	}
	else
		$state=$_GET['state'];

?>