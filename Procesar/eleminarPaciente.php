<?php
  $cod = $_GET["cod"];

  //Si existe el codigo
  include("../Validaciones/query.php");
  $qry = 'SELECT COUNT(*) AS existe FROM paciente WHERE codigoPaciente = "'.$cod.'"';
  $res = bd_query($qry);
  if (mysqli_fetch_assoc($res)["existe"] == 1) 
  {
    //Eliminamos sus Analisis
    $qry ='DELETE FROM analisis WHERE codigoPaciente = "'.$cod.'"';
    bd_query($qry);

    //Eliminamos al paciene
    $qry ='DELETE FROM paciente WHERE codigoPaciente = "'.$cod.'"';
    bd_query($qry);

    //Eliminamos todos los ficheros de la carpeta del Paciente
    $dir = substr(__DIR__, 0, -8)."Documentos_Analisis/".$cod;
    $files = glob($dir.'/*');
    foreach($files as $file){
      if(is_file($file))
        unlink($file);
    }
    //Eliminamos la carpeta
    rmdir($dir);
  }
  
  
  SESSION_START();
  switch($_SESSION['tipo'])
  {
	  case "Administrador":
		header('Location: ../indexAdmin.php?state=-2');
		break;
		
	  case "Quimico":
		header('Location: ../indexQuimico.php?state=-2');
		break;
		
	  case "Publicitario":
		echo "No seas Travieso";
		break;
	  
  }
?>
