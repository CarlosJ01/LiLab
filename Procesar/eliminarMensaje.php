<?php
  include("../Validaciones/query.php");
  $id = $_GET["id"];

  //Buscamos el codigo
  $qry = 'SELECT COUNT(*) AS num FROM buzon WHERE idBuzon  ="'.$id.'"';
  $rsl = bd_query($qry);
  $row = mysqli_fetch_assoc($rsl);

  //Si el codigo existe
  if ($row["num"] == 1) {
    $qry = 'DELETE FROM buzon WHERE idBuzon = "'.$id.'"';
    $rsl =  bd_query($qry);
  }
   
  SESSION_START();
  switch($_SESSION['tipo'])
  {
	  case "Administrador":
		header('Location: ../indexAdmin.php?state=-4');
		break;
		
	  case "Quimico":
		header('Location: ../indexQuimico.php?state=-4');
		break;
		
	  case "Publicitario":
		echo "No seas Travieso";
		break;
	  
  }
?>
