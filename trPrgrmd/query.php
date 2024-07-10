<?php
/*
Funcion que crea la conexion con la base de datos
	Resive la sentencia SQL que queremo ejecutar sobre la base de datos,
	Declaramos las variables necesarias para la conexion hacia la base de datos
	como el hostname, usuario, contraseña del usuario, base de datos,
	Realizamos la connecion hacia la base de datos y si no fue exitosa mandamos mensajes de error
	Ejecutamos la sentencia requerida y el resultado de esta la guardamos en $result,
	Cerramos la conexion y regresamos el resultado de la consulta
*/
function bd_query($query){
	$hostname="localhost";
	$user="laborator_root";
	$password="~8I1ea_TrYv}";
	$bd="laborator_lilab2";
	$connection = mysqli_connect($hostname , $user , $password);

	if (!$connection->set_charset("utf8")) {
		 printf("Error cargando el conjunto de caracteres utf8: %s\n",
			$mysqli->error);
		 exit();
	}
	if($connection == false)
		$mensaje_form="Ha habido un error".mysqli_connect_error();

	mysqli_select_db ($connection, $bd);
	$result = mysqli_query($connection, $query);
	mysqli_close($connection);
	return $result;
}
?>
