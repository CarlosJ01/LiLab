<?php
	include('bd.php');
	$id=$_GET['cod'];
	
	//Sacamos las rutas de las imagenes
	$qry = 'SELECT img_1, img_2 FROM anuncio WHERE id_anuncio="'.$id.'"';
	$result = bd_consulta($qry);
	$row=mysqli_fetch_assoc($result);
	
	//Eliminamos las imagenes
	echo unlink($row["img_1"]);
	echo unlink($row["img_2"]);
	
	$query='DELETE FROM anuncio
			WHERE id_anuncio="'.$id.'" ';
	bd_consulta($query);
	
	SESSION_START();
  switch($_SESSION['tipo'])
  {
	  case "Administrador":
		header('Location: indexAdmin.php?state=-3');
		break;
		
	  case "Quimico":
		echo "No seas Travieso";
		break;
		
	  case "Publicitario":
		header('Location: indexPublicitario.php?state=-3');
		break;
	  
  }
?>
