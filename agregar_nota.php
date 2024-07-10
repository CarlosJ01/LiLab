<?php
date_default_timezone_set('America/Mexico_City');
include('bd.php');
$titulo=$_POST['tituloPublicacion'];
$text=$_POST['descripcionPublicacion'];


$hoy = date(' jny Gis ') ;

// Para imagen 1
    $uploadfile_temporal=$_FILES['imgCarrusel']['tmp_name'];
	
	$fin=end(explode(".", $_FILES['imgCarrusel']['name']));
	$name = pathinfo($_FILES['imgCarrusel']['name'], PATHINFO_FILENAME).$hoy." carrusel";
	$uploadfile_foto1="principal_img/".$name.".".$fin;
	  
	  if (is_uploaded_file($uploadfile_temporal))
	  {
		move_uploaded_file($uploadfile_temporal,$uploadfile_foto1);
	  }
	  $dir =  $fin;
	  
	  
	  
// Para imagen 2
   $uploadfile_temporal=$_FILES['imgCuerpo']['tmp_name'];
	
	$fin=end(explode(".", $_FILES['imgCuerpo']['name']));
	$name = pathinfo($_FILES['imgCuerpo']['name'], PATHINFO_FILENAME).$hoy." body";
	$uploadfile_foto2="principal_img/".$name.".".$fin;
	  
	  if (is_uploaded_file($uploadfile_temporal))
	  {
		move_uploaded_file($uploadfile_temporal,$uploadfile_foto2);
	  }
	$dir2 =  $fin;


if($dir != "" && $dir2 == "")
{
	$insert="insert into anuncio values (NULL , '".$titulo."', '".$text."', '".$uploadfile_foto1."', NULL,CURRENT_TIMESTAMP);";
}
else
{
	if($dir == "" && $dir2 != "")
	{
		
	$insert="insert into anuncio values (NULL , '".$titulo."', '".$text."', NULL, '".$uploadfile_foto2."',CURRENT_TIMESTAMP);";
	}
	else
		$insert="insert into anuncio values (NULL , '".$titulo."', '".$text."', '".$uploadfile_foto1."', '".$uploadfile_foto2."',CURRENT_TIMESTAMP);";
}




//echo $insert;


bd_consulta($insert);



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
