<?php
  include("query.php");
  $nom =  $_POST["nomUE"];
  $apePat = $_POST["apePatUE"];
  $apeMat = $_POST["apeMatUE"];
  $nick = $_POST["nickE"];
  $nickOld = $_POST["nickActE"];
  $tpo = $_POST["tpoUE"];
  $pass = $_POST["passE"];

  if ($pass == "") {
    $qry = 'UPDATE usuario
            SET nickname = "'.$nick.'", nombre="'.$nom.'", apellidoP = "'.$apePat.'", apellidoM = "'.$apeMat.'", idTipo = '.$tpo.'
            WHERE nickname = "'.$nickOld.'"';
  }else {
    $qry = 'UPDATE usuario
            SET nickname = "'.$nick.'", nombre="'.$nom.'", apellidoP = "'.$apePat.'", apellidoM = "'.$apeMat.'", PASSWORD = "'.$pass.'", idTipo = '.$tpo.'
            WHERE nickname = "'.$nickOld.'"';
  }

  $rsl = bd_query($qry);
  if ($rsl) //Si todo es correcto vamos a administrar codigos
  { 
   
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
  else
  {
	echo "Error al alctualizar nuevo usuario, reintente";
  }
?>
