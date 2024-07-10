<?php

	header( 'Content-type: text/html; charset=iso-8859-1' );
	
		SESSION_START();
		
		
		switch($_SESSION['tipo'])
		  {
			  case "Administrador":
				$dir = 'indexAdmin.php?state=-3';
				break;
				
			  case "Publicitario":
				$dir = 'indexPublicitario.php?state=-3';
				break;
			  
		  }
	
	
	
$mdH = '
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header bg-dark">
				<h5 class="modal-title text-white" id="editaPublicacionTitle">Editar Publicación</h5>
		    	<a href="'.$dir.'" class="close text-white">x</a>
			  </div>
			  <div class="modal-body">';




  include("Validaciones/query.php");
include('bd.php');
$id= @$_POST['codigo'];


$qry = 'SELECT COUNT(*) AS existe FROM anuncio WHERE id_anuncio = "'.$id.'"';
$res = bd_query($qry);
  
  if (mysqli_fetch_assoc($res)["existe"] == 1) 
  {
	$alter="select * from anuncio where id_anuncio='".$id."';";
	$resultinsert=bd_consulta($alter);
	$rowinsert=mysqli_fetch_assoc($resultinsert);

	$mdMD = '
		<!-- Form newPublicacion -->
		<script src="Validaciones/validarFormularioPublicacion.js"></script>
		<form action="modificar_nota_procesa.php" id="SubirEP" method="post" enctype="multipart/form-data" >
		
		  <div class="form-group">
			<label style="font-weight: bold;" for="tituloPublicacion">Titulo</label>
			<input type="text" name="title" id="title" class="form-control" value="'.$rowinsert['titulo'].'" />
			<input type="text" name="id" id="id" value="'.$id.'" hidden>
		  </div>
		  
		  <div class="form-group">
			<label style="font-weight: bold;" for="descripcionPublicacion">Descripción</label>
			<textarea class="form-control" name="text" id="text" placeholder="Que quieres Publicar??" rows="5" required>'.$rowinsert['descripcion'].'</textarea>
		  </div>
		  
		  <div class="form-group">
			<label style="font-weight: bold;" for="imgCarrusel">Imagen para Carrusel</label>
			<input type="file" class="form-control-file" id="imgCarruselEP" name="imgCarruselEP" accept="image/*">
		  </div>
	  
		  <div class="form-group">
			<label style="font-weight: bold;" for="imgCuerpo">Imagen para Cuerpo</label>
			<input type="file" class="form-control-file" id="imgCuerpoEP" name="imgCuerpoEP" accept="image/*">
		  </div>';
  }
  else
  {
	  $mdMD = "No Puedes Hacer eso, 
				Primero Intenta Selecionar una Publicación<br>
				Para seleccionar una debes hacer click sobre el registro de alguna Publicación";
  }
  

$mdF = '			
		  </div>
		  <div class="modal-footer">
			<a href="'.$dir.'"> <button type="button" class="btn btn-secondary">Cancelar</button> </a>
			<button form="SubirEP" type="submit" class="btn btn-primary">Guardar Cambios</button>
		  </div>
	  
	  <!-- Termina Form Edita Paciente -->
		</form>
	  
	  
    </div>
  </div>';
  
  echo $mdH.$mdMD.$mdF;



?>