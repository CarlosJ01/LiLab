<?php
  //Datos Analisis
  $fchSub = $_POST["fch"];
  $fchCad = date("Y-m-d",strtotime($fchSub."+ 2 month"));
  $tpo = $_POST["tpoAna"];
  $cod = $_POST["cod"];
  $dirPDF = " ";

  //Lo registramos en la base de datos sin la ruta
  include("../Validaciones/query.php");
  $qry = 'INSERT INTO analisis VALUES (NULL, "'.$cod.'", " ", "'.$fchSub.'", "'.$fchCad.'", "'.$tpo.'")';
  bd_query($qry);

  //Sacamos el id generado
  $qry = 'SELECT  idAnalisis FROM analisis WHERE codigoPaciente = "'.$cod.'" ORDER BY idAnalisis DESC';
  $rsl = bd_query($qry);
  $idAna = mysqli_fetch_assoc($rsl)["idAnalisis"];

  //Subimos el documento PDF
  if ( isset($_FILES) && isset($_FILES['doc']) && !empty($_FILES['doc']['name'] && !empty($_FILES['doc']['tmp_name']))) {
      if(! is_uploaded_file( $_FILES['doc']['tmp_name'] ) )//Si se subio el temporal
        exit;

      $dirOri = $_FILES['doc']['tmp_name'];//Direccion original del archivo
      $dirNva = substr(__DIR__, 0, -8)."Documentos_Analisis/".$cod."/".$cod."_".$idAna.".pdf";//Direccion nueva a donde se va a guardar el documento

      if (is_file($dirNva)) { //Si ya existe el archivo borramos el temporal
        @unlink(ini_get('upload_tmp_dir').$_FILES['doc']['tmp_name']);
      }

      if (!@move_uploaded_file($dirOri, $dirNva)) {//Subimos el documento
        @unlink(ini_get('upload_tmp_dir').$_FILES['doc']['tmp_name']);//Si no se subio borramos el temporal
        exit;
      }

      //Se subio correctamente
      $dirPDF = "Documentos_Analisis/".$cod."/".$cod."_".$idAna.".pdf";
  }

  //Actualizamos la direccion
  $qry = 'UPDATE analisis SET rutaPDF = "'.$dirPDF.'"
          WHERE idAnalisis = '.$idAna.' AND codigoPaciente = "'.$cod.'"';
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
