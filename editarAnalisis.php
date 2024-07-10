<?php

	header( 'Content-type: text/html; charset=iso-8859-1' );
	
	
	$cod = @$_POST["codigo"];
	$id = @$_POST["id"];
	
	SESSION_START();
		
		
		switch($_SESSION['tipo'])
		  {
			  case "Administrador":
				$dir = 'indexAdmin.php?state=-2';
				break;
				
			  case "Quimico":
				$dir = 'indexQuimico.php?state=-2';
				break;
			  
		  }
	
	
	
	
$mdH = '
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header bg-dark">
				<h5 class="modal-title text-white" id="editaAnalisisTitle">Informacion del Analisis</h5>
				<a href="'.$dir.'" class="close text-white" >x</a>
				 
			  </div>
			  <div class="modal-body">';

	date_default_timezone_set('America/Mexico_City');
	
	

	include("Validaciones/query.php");
	$qry = 'SELECT COUNT(*) AS existe FROM analisis WHERE idAnalisis="'.$id.'" AND codigoPaciente = "'.$cod.'"';
	$rsl = bd_query($qry);
	if (mysqli_fetch_assoc($rsl)["existe"] == 1) 
	{
		$qry = 'SELECT fchPublicacion, tipoAnalisis FROM analisis WHERE idAnalisis="'.$id.'" AND codigoPaciente = "'.$cod.'"';
		$rsl = bd_query($qry);
		$row = mysqli_fetch_assoc($rsl);
		
		$mdMD = '
			<!-- Form newAnalisis -->
			  <script src="Validaciones/validarEditarAnalisis.js"></script>
				  
				<form action="Procesar/modificarAnalisis.php" id="SubirEA" method="post" enctype="multipart/form-data" onsubmit="return validarEditarAnalisis()">
				
				  <div class="form-group">
					<label style="font-weight: bold;" for="fchE">Fecha</label>
					 <input type="date" id="fchE" name="fchE" class="form-control" value="'.$row["fchPublicacion"].'" required/>
					 <input type="hidden" id="fchAct" name="fchAct" value="'.date('Y-m-d').'">
				  </div>
				  
				  <div class="form-group">
					<label style="font-weight: bold;" for="tpoAnaE">Tipo de Analisis</label>
                   <input type="text" id="tpoAnaE" name="tpoAnaE" class="form-control" placeholder="Ej: Examen de Funciones Hepaticas" value="'.$row["tipoAnalisis"].'" required/>
				  </div>
			  
				  <div class="form-group">
					
					  <div class="archivo">
						<label style="font-weight: bold;"> Subir PDF </label><br>
						<input type="file" id="docE" name="docE" accept="application/pdf">
					  </div>
			  
				  </div>
				  
				  
				  <input type="hidden" name="codE" value="'.$cod.'">
				  <input type="hidden" name="idAnaE" value="'.$id.'">
			';
	}
	else
	{
		$mdMD = "No Puedes Hacer eso, 
				Primero Intenta Selecionar un Análisis<br>
				Para seleccionar alguno debes hacer click sobre el registro de algún Análisis";
	}

	$mdF = '			
				  </div>
				  <div class="modal-footer">
					<a href="'.$dir.'"> <button type="button" class="btn btn-secondary">Cancelar</button> </a>
					<button form="SubirEA" type="submit" class="btn btn-primary">Guardar Cambios</button>
				  </div>
			  
			  <!-- Termina Form Edita Paciente -->
				</form>
			  
			  
			</div>
		  </div>';
		  
	 echo $mdH.$mdMD.$mdF;

?>