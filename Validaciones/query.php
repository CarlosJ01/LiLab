<?php
function bd_query($query){
	$hostname="localhost";
	$user="laborator_root";
	$password="~8I1ea_TrYv}";
	$bd="laborator_lilab2";
  $connection = mysqli_connect($hostname , $user , $password);

	if (!$connection->set_charset("utf8")) {
		 printf("Error cargando el conjunto de caracteres utf8: %s\n", $mysqli->error);
		 exit();
	}
	if($connection == false)
    printf("Ha habido un error <br>".mysqli_connect_error());

	mysqli_select_db($connection, $bd);
	$result = mysqli_query($connection, $query);
	mysqli_close($connection);
	return $result;
}
?>
