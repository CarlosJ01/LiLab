<?php

	header( 'Content-type: text/html; charset=iso-8859-1' );
	
		SESSION_START();
		
		
		switch($_SESSION['tipo'])
		  {
			  case "Administrador":
				$dir = 'indexAdmin.php?state=-5';
				break;
			  
		  }

$mdH = '
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header bg-dark">
				<h5 class="modal-title text-white" id="editaPacienteTitle">Informacion del Usuario</h5>
				<a href="'.$dir.'" class="close text-white">x</a>
			  </div>
			  <div class="modal-body">';


	include("Validaciones/query.php");
	  $usr = @$_POST["codigo"];
	  $qry = 'SELECT COUNT(*) AS num FROM usuario WHERE nickname = "'.$usr.'"';
	  $rsl =  bd_query($qry);
	  $row = mysqli_fetch_assoc($rsl);

	//Si el codigo existe
	  if ($row["num"] == 1) 
	  {
		  //Extraer codigos de la base de datos
               $qry = "SELECT nickname FROM usuario";
               $rsl = bd_query($qry);

               $arrUsr = array();
               while ($row = mysqli_fetch_assoc($rsl)) 
			   {
                 $arrUsr[] = $row['nickname'];
               }
			   
			   
			   $qry = 'SELECT nickname, nombre, apellidoP, apellidoM, PASSWORD, usuario.idTipo AS idTipo, tipo
						FROM usuario INNER JOIN tipo ON tipo.idTipo = usuario.idTipo WHERE nickname = "'.$usr.'"';
                  $rsl =  bd_query($qry);
                  $row = mysqli_fetch_assoc($rsl);
				  
			   $mdMD = '
			   
			          <!-- Form newUsuario -->
						<form id="SubirUE" action="Validaciones\modificarUsuario.php" method="post" onsubmit="return validarModificarUsuario("'.json_encode($arrUsr).'");" >  
						
						  <div class="form-group">
							<label style="font-weight: bold;" for="nomUE">Nombre</label>
							<input value="'.$row["nombre"].'" type="text" name="nomUE" id="nomUE" class="form-control" placeholder="Ej: Juan Carlos" required/>
						  </div>
						  
						  <div class="form-group">
							<label style="font-weight: bold;" for="apePatUE">Apellido Paterno</label>
								<input value="'.$row["apellidoP"].'" type="text" name="apePatUE" id="apePatUE" class="form-control" placeholder="Ej: Perez" required />
						  </div>
						  
						  <div class="form-group">
							<label style="font-weight: bold;" for="apeMatUE">Apellido Materno</label>
								<input value="'.$row["apellidoM"].'" type="text" name="apeMatUE" id="apeMatUE" class="form-control" placeholder="Ej: Castro"/>
						  </div>
						  
						  <div class="form-group">
							<label style="font-weight: bold;" for="nickE">Nickname</label>
								<input value="'.$row["nickname"].'" type="text" name="nickE" id="nickE" class="form-control" placeholder="Nickname" required/>
								<input type="hidden" name="nickActE" id="nickActE" value="'.$usr.'">
						 </div>
					  
						  <div class="form-group">
							<label style="font-weight: bold;" for="tpoUE">Tipo de Usuario</label>
							<select id="tpoUE" name="tpoUE" class="form-control">
								<option value="'.$row["idTipo"].'">'.$row["tipo"].'</option>';
							
									
					  $qry = "SELECT * FROM tipo";
					  $rsl = bd_query($qry);
					  while ($row = mysqli_fetch_assoc($rsl)) 
					  {
					
						$mdMD.= '<option value="'.$row["idTipo"].'">'.$row["tipo"].'</option>';
									
									
				      }
									
									
					$mdMD.='			
							 </select>
						  </div>
						  
						  <div class="form-group">
							<label style="font-weight: bold;" for="passE">Contraseña</label>
								<input type="password" name="passE" id="passE" class="form-control" placeholder="Ingresa una contraseña" />
						  </div>
						  
						  <div class="form-group">
							<label style="font-weight: bold;" for="passRepE">Repite Contraseña</label>
								<input type="password" name="passRepE" id="passRepE" class="form-control" placeholder="Ingresa de nuevo la contraseña" />
						  </div>';
			   
			   
	  }
	  else
	  {
		$mdMD = "No Puedes Hacer eso, 
				Primero Intenta Selecionar un Usuario<br>
				Para seleccionar un debes hacer click sobre el registro de algún Usuario";
	  }
	


$mdF = '			
		  </div>
		  <div class="modal-footer">
			<a href="'.$dir.'"> <button type="button" class="btn btn-secondary">Cancelar</button> </a>
			<button form="SubirUE" type="submit" class="btn btn-primary">Guardar Cambios</button>
		  </div>
	  
	  <!-- Termina Form Edita Paciente -->
		</form>
	  
	  
    </div>
  </div>';
  
  echo $mdH.$mdMD.$mdF;










?>