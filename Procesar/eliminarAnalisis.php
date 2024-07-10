<?php
  $cod = $_GET["cod"];
  $id = $_GET["id"];

  //Optenemos la ruta del archivo
  include("../Validaciones/query.php");
  $qry = 'SELECT rutaPDF FROM analisis WHERE idAnalisis="'.$id.'" AND codigoPaciente = "'.$cod.'"';
  $rsl = bd_query($qry);
  $rutaPDF = mysqli_fetch_assoc($rsl)["rutaPDF"];


  //Borramos el archivo de la carpeta
  $ruta = substr(__DIR__, 0, -8).$rutaPDF;
  unlink($ruta);

  //Borramos de la base de datos
  $qry = 'DELETE FROM analisis WHERE idAnalisis="'.$id.'" AND codigoPaciente = "'.$cod.'"';
  bd_query($qry);

  
  SESSION_START();
  switch($_SESSION['tipo'])
  {
	  case "Administrador":
		header('Location: ../indexAdmin.php?state='.$cod);
		break;
		
	  case "Quimico":
		header('Location: ../indexQuimico.php?state='.$cod);
		break;
		
	  case "Publicitario":
		echo "No seas Travieso";
		break;
	  
  }
?>
