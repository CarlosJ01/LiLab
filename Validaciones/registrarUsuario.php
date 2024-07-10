<?php //Subir un usuario a la base de datos
  include("query.php");
  $nom =  $_POST["nomU"];
  $apePat = $_POST["apePatU"];
  $apeMat = $_POST["apeMatU"];
  $nick = $_POST["nick"];
  $tpo = $_POST["tpoU"];
  $pass = $_POST["pass"];

  $qry = 'INSERT INTO usuario VALUES ("'.$nick.'","'.$nom.'","'.$apePat.'","'.$apeMat.'","'.$pass.'",'.$tpo.')';
  $rsl = bd_query($qry);
  if ($rsl) { //Si todo es correcto vamos a administrar codigos
   
   
   SESSION_START();
  switch($_SESSION['tipo'])
  {
	  case "Administrador":
		header('Location: ../indexAdmin.php?state=-5');
		break;
		
	  case "Quimico":
		echo "No seas Travieso";
		break;
		
	  case "Publicitario":
		echo "No seas Travieso";
		break;
	  
  }
   
   
  }
  echo "Error al registrar nuevo usuario, reintente";
?>
