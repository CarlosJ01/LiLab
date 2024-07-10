
<?php

	header( 'Content-type: text/html; charset=iso-8859-1' );
	
	
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
	
	
	
	// Preparamos div's de nuestro modal, para que se vea bonito
	$mdH = '
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header bg-dark">
				<h5 class="modal-title text-white" id="editaPacienteTitle">Informacion del Paciente</h5>
				<a href="'.$dir.'" class="close text-white">x</a>
				 
			  </div>
			  <div class="modal-body">';


	// Recibimos el codigo del paciente al cual editarele la informacion
  $cod = @$_POST["codigo"];

  //Si existe el codigo
  include("Validaciones/query.php");
  $qry = 'SELECT COUNT(*) AS existe FROM paciente WHERE codigoPaciente = "'.$cod.'"';
  $res = bd_query($qry);
  if (mysqli_fetch_assoc($res)["existe"] == 1) 
  {
	  // Hacemos nuestra consulta con el codigo de paciente que recibimos
	  
	  $qry = 'SELECT * FROM paciente WHERE codigoPaciente = "'.$cod.'"';
	  $res = bd_query($qry);
	  $row = mysqli_fetch_assoc($res);
	  
	  
  // LLenamos nuestro modal con la informacion requerida por el modal
	  $mdMD = '
            

	  
	  <!-- Form Edita Paciente -->
            <script src="Validaciones/validarEditarPaciente.js"></script>
            <!-- Formulario -->
       <form action="Procesar/modificarPaciente.php" id="SubirE" method="POST" enctype="multipart/form-data" onsubmit="return validarEditarPaciente()">
		
		  <div class="form-group">
			<label style="font-weight: bold;" for="nombrePaciente">Nombre</label>
			<input type="text" class="form-control" id="nomE" name="nomE" placeholder="Nombre(s)" value="'.$row["nombre"].'">
		  </div>
		  
		  <div class="form-group">
			<label style="font-weight: bold;" for="apellidoPaterno">Apellido Paterno</label>
			<input type="text" class="form-control" id="apePatE" name="apePatE" placeholder="Apellido Paterno" value="'.$row["apellidoP"].'">
		  </div>
		  
		  <div class="form-group">
			<label style="font-weight: bold;" for="apellidoMaterno">Apellido Materno</label>
			<input type="text" class="form-control" id="apeMatE" name="apeMatE" placeholder="Apellido Materno" value="'.$row["apellidoM"].'">
		  </div>
		  
		  <div class="form-group">
			<label style="font-weight: bold;" for="telefono">Telefono</label>
			<input type="text" class="form-control" id="telE" name="telE" placeholder="Telefono" value="'.$row["telefono"].'">
		  </div>
	  
		  <div class="form-group">
			
			   <div class="archivo paciente">
               <p class="textCenter" style="margin-top:2px; font-weight: bold;">Codigo de Paciente</p>
              <label style="font-weight: bold; padding: 20px; border: 1px solid #000; background: #acef9f;" id="cod">'.$row["codigoPaciente"].'</label>
              <input type="hidden" name="codigoE" value="'.$row["codigoPaciente"].'">
             </div>
	  
		  </div>';

  }
  else 
  {
	  
	  // Si no existe el codigo del paciente en nuestra base de datos o recibimos un codigo vacio mostra este mensaje dentro del modal
	  $mdMD = "No Puedes Hacer eso, 
				Primero Intenta Selecionar un Paciente<br>
				Para seleccionar uno debes hacer click sobre el registro de algún Paciente";
  }


	// Cerramos nuestros div's del modal y ponemos los botones de cancelar o enviar
   $mdF = '			
		  </div>
		  <div class="modal-footer">
			<a href="'.$dir.'"> <button type="button" class="btn btn-secondary">Cancelar</button> </a>
			<button form="SubirE" type="submit" class="btn btn-primary">Guardar Cambios</button>
		  </div>
	  
	  <!-- Termina Form Edita Paciente -->
		</form>
	  
	  
    </div>
  </div>';
  
  
  // con esto le damos salida a toda a estrucuta de nuestro modal con la informacion del paciente
  echo $mdH.$mdMD.$mdF;
?>