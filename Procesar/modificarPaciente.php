<?php
  include("../Validaciones/query.php");
  $nom = $_POST["nomE"];
  $apePat = $_POST["apePatE"];
  $apeMat = $_POST["apeMatE"];
  $tel = $_POST["telE"];
  $cod = $_POST["codigoE"];

  $qry = 'UPDATE paciente
          SET nombre = "'.$nom.'", apellidoP = "'.$apePat.'", apellidoM = "'.$apeMat.'", telefono = "'.$tel.'"
          WHERE codigoPaciente = "'.$cod.'"';
  bd_query($qry);

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
