<?php
date_default_timezone_set('America/Mexico_City');
include('bd.php');
$titulo=$_POST['title'];
$text=$_POST['text'];
$id=$_POST['id'];

$hoy = date(' jny Gis ') ;

// Para imagen 1
    $uploadfile_temporal=$_FILES['imgCarruselEP']['tmp_name'];
	
	$fin=end(explode(".", $_FILES['imgCarruselEP']['name']));
	$name = pathinfo($_FILES['imgCarruselEP']['name'], PATHINFO_FILENAME).$hoy." carrusel";
	$uploadfile_foto1="principal_img/".$name.".".$fin;
	  
	  if (is_uploaded_file($uploadfile_temporal))
	  {
		move_uploaded_file($uploadfile_temporal,$uploadfile_foto1);
	  }
	 $dir =  $fin;
	  
	  
	  
	  
// Para imagen 2
   $uploadfile_temporal=$_FILES['imgCuerpoEP']['tmp_name'];
	
	$fin=end(explode(".", $_FILES['imgCuerpoEP']['name']));
	$name = pathinfo($_FILES['imgCuerpoEP']['name'], PATHINFO_FILENAME).$hoy." body";
	$uploadfile_foto2="principal_img/".$name.".".$fin;
	  
	  if (is_uploaded_file($uploadfile_temporal))
	  {
		move_uploaded_file($uploadfile_temporal,$uploadfile_foto2);
	  }
	   $dir2 =  $fin;
	  

if($dir == "" && $dir2 == "")
{
	$alter="UPDATE `anuncio` SET `titulo` = '".$titulo."', `descripcion` = '".$text."', `fecha` = CURRENT_TIMESTAMP WHERE `anuncio`.`id_anuncio` = ".$id.";";
}
else
{
	if($dir == "" && $dir2 != "")
	{
		$alter="UPDATE `anuncio` SET `titulo` = '".$titulo."', `descripcion` = '".$text."', 
			`img_2` = '".$uploadfile_foto2."', `fecha` = CURRENT_TIMESTAMP WHERE `anuncio`.`id_anuncio` = ".$id.";";
	}
	else
	{
		if($dir != "" && $dir2 == "")
		{
			$alter="UPDATE `anuncio` SET `titulo` = '".$titulo."', `descripcion` = '".$text."', 
				`img_1` = '".$uploadfile_foto1."', `fecha` = CURRENT_TIMESTAMP WHERE `anuncio`.`id_anuncio` = ".$id.";";
		}
		else
			$alter="UPDATE `anuncio` SET `titulo` = '".$titulo."', `descripcion` = '".$text."', 
			`img_1` = '".$uploadfile_foto1."', `img_2` = '".$uploadfile_foto2."', `fecha` = CURRENT_TIMESTAMP WHERE `anuncio`.`id_anuncio` = ".$id.";";
	}
}

//echo $alter;

$resultinsert=bd_consulta($alter);
$rowinsert=mysqli_fetch_assoc($resultinsert);

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
