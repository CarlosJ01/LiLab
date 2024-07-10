<?php
SESSION_START();

// Para evitar que puedan acceder al sistema sin haber estado logueados
if($_SESSION['userOK']==true)
{
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Inicio</title>
    <!-- Metaviewport para el responsive -->
	<meta http-equiv=content-type content=text/html; charset=utf-8>
	<meta charset=utf-8>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- LLamado al bootstrap local --><link rel="stylesheet" href="form_css/style.css" type="text/css" media="all" /><!-- Style-CSS -->
    <link href="form_css/font-awesome.css" rel="stylesheet"><!-- font-awesome-icons -->
    <link href="form_css/stylenota.css" rel="stylesheet"><!-- font-awesome-icons -->
    <link rel="stylesheet" href="form_css/bootstrap.min.css">
	<link rel="stylesheet" href="icomoon/style.css">
    <link rel="stylesheet" href="icomoon2/style.css">
    <link rel="stylesheet" href="form_css/styleMarketing.css">
    <link rel="stylesheet" href="form_css/utiles.css">
	<script src="form_js/dinamico.js"></script>
	
	
	
</head>

<?php  //Extraer codigos de la base de datos
header("Content-Type: text/html;charset=utf-8");
  include("Validaciones/query.php");

  $donde = 0;
  
  $qry = "SELECT codigoPaciente FROM paciente";
  $res = bd_query($qry);

  $arrCodigos = array();
  while ($row = mysqli_fetch_assoc($res))
    $arrCodigos[] = $row['codigoPaciente'];
?>
<script src="Validaciones/generarCodigo.js"></script>

<body onload='<?php echo "generarCodigo(".json_encode($arrCodigos).")"; ?>' >

<!-- Modal Nueva Publicacion -->
<div class="modal fade" id="newPublicacion" tabindex="-1" role="dialog" aria-labelledby="newPublicacionTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-white" id="newPublicacionTitle">Nueva Publicación</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  
	  <!-- Form newPublicacion -->
		<script src="Validaciones/validarFormularioPublicacion.js"></script>
		<form action="agregar_nota.php" id="Subir" method="post" enctype="multipart/form-data" onsubmit="return validarFormularioPublicacion()">
		
		  <div class="form-group">
			<label style="font-weight: bold;" for="tituloPublicacion">Titulo</label>
			<input type="text" class="form-control" id="tituloPublicacion" name="tituloPublicacion" placeholder="Titulo" required>
		  </div>
		  
		  <div class="form-group">
			<label style="font-weight: bold;" for="descripcionPublicacion">Descripción</label>
			<textarea class="form-control" id="descripcionPublicacion" name="descripcionPublicacion" placeholder="Que quieres Publicar??" rows="5" required></textarea>
		  </div>
		  
		  <div class="form-group">
			<label style="font-weight: bold;" for="imgCarrusel">Imagen para Carrusel</label>
			<input type="file" class="form-control-file" id="imgCarrusel" name="imgCarrusel" accept="image/*">
		  </div>
	  
		  <div class="form-group">
			<label style="font-weight: bold;" for="imgCuerpo">Imagen para Cuerpo</label>
			<input type="file" class="form-control-file" id="imgCuerpo" name="imgCuerpo" accept="image/*">
		  </div>
	  
	  
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
			<button type="submit" class="btn btn-primary">Guardar</button>
		  </div>
	  
	  <!-- Termina Form newPublicacion -->
		</form>
	  
	  
    </div>
  </div>
</div>
<!-- Termina Modal Nueva Publicacion -->



<!-- Modal Edita Publicacion -->
<div class="modal fade" id="editaPublicacion" tabindex="-1" role="dialog" aria-labelledby="editaPublicacionTitle" aria-hidden="true">
  
</div>

	<div class="p-t-100">
			<nav class="navbar container-fluid col-md-12 fixed-top bg-dark"  >
			
				<div class = "container col-md-2">
					<div class="bg-white rounded" style="padding: 5px;">
						<img class="bg-white" src="form_img/logo-slim.png" width="100" height="65">	
					</div>
				</div>
				
			 
				<div class="container col-md-9">
		   
							<a class="navbar-brand " href="#"></a>
							  <ul class="nav nav-pills justify-content-end" id="pills-tab" role="tablist">
							  
								  <li class="nav-item">
									<a class="btn btn-primary <?php if($_GET['state'] == -1 || $_GET['state'] == -10 ) echo 'active'; ?>" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true" onclick="miBarra(this)">Inicio</a>
								  </li>

									<li class="nav-item">
									  <p class="nav-link text-white" href="#"></p>
									</li>

									<li class="nav-item">
									<a class="btn btn-primary <?php if($_GET['state'] == -3) echo 'active'; ?>"  id="pills-contact-tab"  data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false" onclick="miBarra(this)" >Publicaciones</a>
									</li>

									<li class="nav-item">
									  <p class="nav-link text-white" href="#"></p>
									</li>
								  
								  
									<li class="nav-item">
									  <p class="nav-link text-white" href="#"></p>
								  </li>
								  
								  
									<li class="nav-item">
										<form id="miBarra" class="form-inline" style="width:150px;">
										
										 
										 
										</form>
									</li>
								</ul>
									
					</div>
					
					
					<div class="container col-md-1" >
						<div class="dropdown">
						  <button class="btn text-white btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fa fa-settings"></i>
						  </button>
						  
						  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" href="salir.php">Salir</a>
						  </div>
						</div>
					</div>
					
					
				
			  </nav>

		
			<section>
			
						<div class="tab-content" id="pills-tabContent">
						
						  
						<!-- Inicio -->
						  <div  class="tab-pane fade <?php if($_GET['state'] == -1 || $_GET['state'] == -10 ) echo 'show active'; ?>" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"> 
							<div class="wrapper" style="width: 50%;">
									<div class="bg-light" style = "box-shadow: 1px 1px 10px 2px rgba(0,0,0,0.9);  margin-bottom: 5%; margin-top: 2%; padding: 5px 20px;  border-radius: 10px;">
								
										<div class="textCenter archivo bg-light" style="margin-top:15px;">
											<h3 style=" font-weight: bold;">Inicio</h3>
										</div>
								
										<div style="margin-left:auto; margin-right:auto; justify-content: center;  display: flex; width:98%;">
										
											<div class="container d-block" style="margin-left:auto; margin-right:auto; justify-content: center;">
												<div class="container textCenter bg-dark text-white"  style="width: 60%; ">
													<h3> Bienvenido!!! </h3>
												</div>
												
												<div class="container textCenter bg-light text-dark"  style="width: 60%; ">
													<p> Por seguridad recuerda siempre cerrar tu Sesión </p>
													<p> Para cerrar Sesión pulsa sobre este icono <a href="salir.php" style="text-decoration:none;" class="aHover"><i  class="fo fa-cog text-dark" style="text-decoration:none; font-size: 25px;" ></i></a></p><p> o puedes buscarlo en la barra superior y despues da click en la opción "Salir"</p>
												</div>
												
											</div>
										</div>
									</div>
							</div>
						  </div>
						  <!-- Termina Inicio -->
						  
						 

						
						   <!-- Publicaciones -->
						  <div class="tab-pane fade <?php if($_GET['state'] == -3) echo 'show active'; ?> " id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"> 
							
							<div class="wrapper">
									<div class="bg-light" style = "box-shadow: 1px 1px 10px 2px rgba(0,0,0,0.9);  margin-bottom: 1%; margin-top: 2%; padding: 5px 20px;  border-radius: 10px;">
								
										<div class="textCenter archivo bg-light" style="margin-top:15px;">
											<h3 style=" font-weight: bold;">Publicaciones</h3>
											<p style="font-size:15px; margin-left:auto; margin-right:auto; width: 50%;" class="text-info">
											En esta seccion usted puede Ver, Subir, Editar o Eliminar las Publicaciones de su Página Web.</p>
										</div>
								
										<div style="margin-left:auto; justify-content: center;  display: block; width:98%;">
							
												<div style="display: flex; ">
												
													<a class="text-center rounded bHover btnOpt" style="margin-left: 0px;" data-toggle="modal" data-target="#newPublicacion">
														<div style="font-size: 28px;" class="fo fa-plus-circle text-primary"></div>
														<div style="cursor:pointer; font-size: 12px;" class="text-dark">Nueva Publicación</div>
													</a>
													
													
													
													<a class="text-center rounded bHover btnOpt" id="btnModificarPublicacion" data-toggle="modal" data-target="#editaPublicacion" onclick="editarPublicacion()">
												
														<div style="font-size: 28px;" class="fo fa-edit text-secondary"></div>
														
														<div style="cursor:pointer; font-size: 12px;" class="text-dark">Editar Publicación</div>
													</a>
														
														
													<a class="text-center rounded bHover btnOpt"  id="btnEliminaPu" style="text-decoration:none;">
														
														<div style="font-size: 28px;" class="fo fa-trash text-danger"></div>
														
														<div style="font-size: 12px;" class="text-dark">Eliminar Publicación</div>
													</a>
														
														
												</div>
										
												<div id="datos" class="table table-hover" style="width:100%; margin-left: auto; margin-right: auto;">
												

													</div>
								
								
										</div>
									</div>
								</div>
							
						  </div>
							<!-- Termina Publicaciones -->
						
						
						
						
						</div>
						
						
					</div>
					
					
					
				
				</div>
			</section>
	
	</div>
	
	
	<script src="form_js/jquery.min.js"></script>
	<script src="form_js/jquery.js"></script>
	<script src="form_js/bootstrap.min.js"></script>
	<script src="ajax/editarPaciente.js"></script>
	<script src="ajax/editarAnalisis.js"></script>
	<script src="ajax/editarPublicacion.js"></script>
	<script src="ajax/editarUsuario.js"></script>
	<script src="ajax/miBarra.js"></script>
	<script src="ajax/main.js"></script>
	<script src="ajax/mainCodigo.js"></script>
    <script src="Validaciones/seleccionarPublicacion.js"></script>
    <script src="Validaciones/seleccionarUsuario.js"></script>
    <script src="Validaciones/validarModificarUsuario.js"></script>
	
	
	<input type="hidden" id="valueModificarPaciente" name="valueModificarPaciente" value="">
	<input type="hidden" id="valueModificarAnalisis" name="valueModificarAnalisis" value="">
	<input type="hidden" id="valueModificarPublicacion" name="valueModificarPublicacion" value="">
	<input type="hidden" id="valueModificarUsuario" name="valueModificarUsuario" value="">

</body>
</html>
<?php
}
else
{
	header('Location: controlador.php');
}
?>