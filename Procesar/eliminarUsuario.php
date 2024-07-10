<?php
  include("../Validaciones/query.php");
  $usr = $_GET["usr"];
  $qry = 'SELECT COUNT(*) AS num FROM usuario WHERE nickname = "'.$usr.'"';
  $rsl =  bd_query($qry);
  $row = mysqli_fetch_assoc($rsl);

  //Si el codigo existe
  if ($row["num"] == 1) {
    if ($usr != "lilab773") {
      $qry = 'DELETE FROM usuario WHERE nickname = "'.$usr.'"';
      $rsl =  bd_query($qry);
    }
  }
  
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
?>
