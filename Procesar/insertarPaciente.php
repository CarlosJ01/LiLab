<?php
  //Datos del paciente
  $nom = $_POST["nom"];
  $apePat = $_POST["apePat"];
  $apeMat = $_POST["apeMat"];
  $tel = $_POST["tel"];
  $cod = $_POST["codEnv"];

  //Insertamos en la base de datos
  include("../Validaciones/query.php");
  $qry = 'INSERT INTO paciente VALUES ("'.$cod.'", "'.$nom.'", "'.$apePat.'", "'.$apeMat.'", "'.$tel.'")';
  $res = bd_query($qry);

  //Creamos su carpetas
  $dir = substr(__DIR__, 0, -8)."Documentos_Analisis/".$cod;
  mkdir($dir, 0755);

  
  SESSION_START();
  switch($_SESSION['tipo'])
  {
	  case "Administrador":
		header('Location: ../indexAdmin.php?state=-2.php');
		break;
		
	  case "Quimico":
		header('Location: ../indexQuimico.php?state=-2.php');
		break;
		
	  case "Publicitario":
		echo "No seas Travieso";
		break;
	  
  }
?>
