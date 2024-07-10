<?php
  //Datos Analisis
  $fchSub = $_POST["fchE"];
  $fchCad = date("Y-m-d",strtotime($fchSub."+ 2 month"));
  $tpo = $_POST["tpoAnaE"];
  $cod = $_POST["codE"];
  $idAna = $_POST["idAnaE"];
  $dirPDF = " ";

  if ($_FILES['docE']['tmp_name'] != "") {
    //Subimos el documento PDF
    if ( isset($_FILES) && isset($_FILES['docE']) && !empty($_FILES['docE']['name'] && !empty($_FILES['docE']['tmp_name']))) {
        if(! is_uploaded_file( $_FILES['docE']['tmp_name'] ) )//Si se subio el temporal
          exit;

        $dirOri = $_FILES['docE']['tmp_name'];//Direccion original del archivo
        $dirNva = substr(__DIR__, 0, -8)."Documentos_Analisis/".$cod."/".$cod."_".$idAna.".pdf";//Direccion nueva a donde se va a guardar el documento

        if (!@move_uploaded_file($dirOri, $dirNva)) {//Subimos el documento
          @unlink(ini_get('upload_tmp_dir').$_FILES['docE']['tmp_name']);//Si no se subio borramos el temporal
          exit;
        }
    }
  }

  include("../Validaciones/query.php");
  $qry = 'UPDATE analisis SET fchPublicacion="'.$fchSub.'", caduca = "'.$fchCad.'", tipoAnalisis = "'.$tpo.'"
          WHERE idAnalisis="'.$idAna.'" AND codigoPaciente = "'.$cod.'"';
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
