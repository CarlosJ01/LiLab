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
    
	<!-- LLamado al bootstrap local -->
	<link rel="stylesheet" href="form_css/style.css" type="text/css" media="all" /><!-- Style-CSS -->
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

<body onload='<?php echo "generarCodigo(".json_encode($arrCodigos).")"; ?>' onunload="salir.php">



<!-- Modal Nuevo Paciente -->
<div class="modal fade" id="newPaciente" tabindex="-1" role="dialog" aria-labelledby="newPacienteTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-white" id="newPacienteTitle">Nuevo Paciente</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  
	  <!-- Form newPaciente -->
	  <script src="Validaciones/validarFormularioPaciente.js"></script>
	  
		<form action="Procesar/insertarPaciente.php" id="Subir" method="post" enctype="multipart/form-data" onsubmit="return validarFormularioPaciente()">
		
		  <div class="form-group">
			<label style="font-weight: bold;" for="nombrePaciente">Nombre</label>
			<input type="text" class="form-control" id="nom" name="nom" placeholder="Nombre(s)" required>
		  </div>
		  
		  <div class="form-group">
			<label style="font-weight: bold;" for="apellidoPaterno">Apellido Paterno</label>
			<input type="text" class="form-control" id="apePat" name="apePat" placeholder="Apellido Paterno" required>
		  </div>
		  
		  <div class="form-group">
			<label style="font-weight: bold;" for="apellidoMaterno">Apellido Materno</label>
			<input type="text" class="form-control" id="apeMat" name="apeMat" placeholder="Apellido Materno">
		  </div>
		  
		  <div class="form-group">
			<label style="font-weight: bold;" for="telefono">Telefono</label>
			<input type="text" class="form-control" id="tel" name="tel" placeholder="Telefono" required>
		  </div>
	  
		  <div class="form-group">
			
			
			<!-- Generar nuevos codigos aleatorios que no se repiten en la base de datos -->
			 <div class="archivo paciente">
               <p class="textCenter" style="margin-top:2px; font-weight: bold;">Codigo de Paciente</p>
               <label style="font-weight: bold; padding: 20px; border: 1px solid #000; background: #acef9f;" id="cod"> CODIGO </label>
               <input type="hidden" name="codEnv" value="CODIGO" id="codEnv" readonly>
               <button form="crearCodigo" class="signinbutton miPublicar" style="background: #af9055; margin: 0px; width: 50%; margin-left:auto; margin-right:auto;"
                onclick='<?php echo "generarCodigo(".json_encode($arrCodigos).")"; ?>'>Generar Codigo</button>
             </div>
	  
		  </div>
	  
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
			<button type="submit" class="btn btn-primary">Guardar</button>
		  </div>
	  
	  <!-- Termina Form newPaciente -->
		</form>
	  
	  
    </div>
  </div>
</div>
<!-- Termina Modal Nuevo Paciente -->




<!-- Modal Edita Paciente -->
<!-- Este modal funciona con AJAX la funcion es editarPaciente.js la cual muestra 
editarPaciente.php este archivo contiene la informacion del paciente a Modificar-->
<div class="modal fade" id="editaPaciente" tabindex="-1" role="dialog" aria-labelledby="editaPacienteTitle" aria-hidden="true">
  
</div>
<!-- Termina Modal Edita Paciente -->




<!-- Modal Nuevo Analisis -->
<div class="modal fade" id="newAnalisis" tabindex="-1" role="dialog" aria-labelledby="newAnalisisTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-white" id="newAnalisisTitle">Nuevo Analisis</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  
	  
	  <?php
		  date_default_timezone_set('America/Mexico_City');
		  $cod = $_GET["state"];

		  //Si existe el codigo
		  $qry = 'SELECT COUNT(*) AS existe FROM paciente WHERE codigoPaciente = "'.$cod.'"';
		  $res = bd_query($qry);
		  if (mysqli_fetch_assoc($res)["existe"] == 1) {
		?>
	  
	  <!-- Form newAnalisis -->
	  <script src="Validaciones/validarFormularioAnalisis.js"></script>
          
          <form action="Procesar/insertarAnalisis.php" id="Subir" method="post" enctype="multipart/form-data" onsubmit="return validarFormularioAnalisis()">
		
		  <div class="form-group">
			<label style="font-weight: bold;" for="fch">Fecha</label>
			 <input type="date" id="fch" name="fch" class="form-control" value="<?php echo date('Y-m-d');?>" required/>
			 <input type="hidden" id="fchAct" name="fchAct" value="<?php echo date('Y-m-d');?>">
		  </div>
		  
		  <div class="form-group">
			<label style="font-weight: bold;" for="tpoAna">Tipo de Analisis</label>
                 <input type="text" id="tpoAna" name="tpoAna" class="form-control" placeholder="Ej: Examen de Funciones Hepaticas" required/>
		  </div>
	  
		  <div class="form-group">
			
			  <div class="archivo">
                <label style="font-weight: bold;"> Subir PDF </label><br>
                <input type="file" id="doc" name="doc" accept="application/pdf" required>
              </div>
	  
		  </div>
		  
		  <input type="hidden" name="cod" value="<?php echo $cod; ?>">
		  <?php
			}
			else 
			{
			  echo "no Puedes hacer eso";
			}
			?>
	  
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
			<button type="submit" class="btn btn-primary">Guardar</button>
		  </div>
	  
	  <!-- Termina Form newAnalisis -->
		</form>
	  
	  
    </div>
  </div>
</div>
<!-- Termina Modal Nuevo Analisis -->


<!-- Modal Edita Analisis -->
<!-- Este div. espera con si ID la funcion AJAX, muestra los datos relacionadoa un anañlisis que un usuario selecciono. -->
<div class="modal fade" id="editaAnalisis" tabindex="-1" role="dialog" aria-labelledby="editaAnalisisTitle" aria-hidden="true">
  
</div>
<!-- Termina Modal Edita Analisis -->


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
			<label style="font-weight: bold;" for="descripcionPublicacion">Descripcion</label>
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
<!-- De igual manera esta funcion necesita de editarPublicacion.php y editarOublicacion.js
		Utiliza ajax, y muestra de fomra dinamica los datos de alguna publicacion.-->
<div class="modal fade" id="editaPublicacion" tabindex="-1" role="dialog" aria-labelledby="editaPublicacionTitle" aria-hidden="true">
  
</div>




<!-- Modal Nuevo Usuario-->
<div class="modal fade" id="newUsuario" tabindex="-1" role="document" aria-labelledby="newUsuarioTitle" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-white" id="newPacienteTitle">Nuevo Usuario</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  
	  <?php  //Extraer codigos de la base de datos

             $qry = "SELECT nickname FROM usuario";
             $rsl = bd_query($qry);

             $arrUsr = array();
             while ($row = mysqli_fetch_assoc($rsl)) {
               $arrUsr[] = $row['nickname'];
             }
          ?>
	  
	  <!-- Form newUsuario -->
      <script src="Validaciones\validarFormularioUsuario.js"></script>
	  
		<form action="Validaciones\registrarUsuario.php" method="post" onsubmit='<?php echo "return validarFormularioUsuario(".json_encode($arrUsr).");"; ?>'>
		
		  <div class="form-group">
			<label style="font-weight: bold;" for="nomU">Nombre</label>
            <input type="text" name="nomU" id="nomU" class="form-control" placeholder="Ej: Juan Carlos" required/>
		  </div>
		  
		  <div class="form-group">
			<label style="font-weight: bold;" for="apePatU">Apellido Paterno</label>
                <input type="text" name="apePatU" id="apePatU" class="form-control" placeholder="Ej: Perez" required />
		  </div>
		  
		  <div class="form-group">
			<label style="font-weight: bold;" for="apeMatU">Apellido Materno</label>
                <input type="text" name="apeMatU" id="apeMatU" class="form-control" placeholder="Ej: Castro"/>
		  </div>
		  
		  <div class="form-group">
			<label style="font-weight: bold;" for="nick">Nickname</label>
                <input type="text" name="nick" id="nick" class="form-control" placeholder="Nickname" required/>
		  </div>
	  
		  <div class="form-group">
			<label style="font-weight: bold;" for="tpoU">Tipo Usuario</label>
			<select id="tpoU" name="tpoU" class="form-control">
                    <?php
                      $qry = "SELECT * FROM tipo";
                      $rsl = bd_query($qry);
                      while ($row = mysqli_fetch_assoc($rsl)) {
                    ?>
                    <option value="<?php echo $row["idTipo"]; ?>"><?php echo  $row["tipo"]; ?></option>
                    <?php
                      }
                    ?>
             </select>
		  </div>
		  
		  <div class="form-group">
			<label style="font-weight: bold;" for="nick">Contraseña</label>
                <input type="password" name="pass" id="pass" class="form-control" placeholder="Ingresa una contraseña" required/>
		  </div>
		  
		  <div class="form-group">
			<label style="font-weight: bold;" for="nick">Repite Contraseña</label>
                <input type="password" name="passRep" id="passRep" class="form-control" placeholder="Ingresa de nuevo la contraseña" required/>
		  </div>
		 
	  
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
			<button type="submit" class="btn btn-primary">Crear Usuario</button>
		  </div>
	  
	  <!-- Termina Form newUsuario -->
		</form>
	  
	  
    </div>
  </div> 
</div>
<!--Termina Modal Nuevo Usuario-->


<!-- Modal Edita Usuario-->
<!-- De igual manera esta funcion necesita de editarUsuario.php y editarUsuario.js
		Utiliza ajax, y muestra de fomra dinamica los datos de algun Usuario.-->
<div class="modal fade" id="editaUsuario" tabindex="-1" role="document" aria-labelledby="editaUsuarioTitle" aria-hidden="true">
	
</div>
<!--Termina Modal Edita Usuario-->






<!-- Comienza Barra de navegacion -->	
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
							  
									<!-- Boton INICIO que hace referencia al subModulo INICIO -->
								    <li class="nav-item">
										<a class="btn btn-primary <?php if($_GET['state'] == -1 || $_GET['state'] == -10 ) echo 'active'; ?>" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true" onclick="miBarra(this)">Inicio</a>
								    </li>
								    <li class="nav-item">
									  <p class="nav-link text-white" href="#"></p>
									</li>

									<!-- Boton PACIENTES que hace referencia al subModulo PACIENTES -->
									<li class="nav-item">
									<a class="btn btn-primary <?php if($_GET['state'] == -2) echo 'active'; ?> " id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false" onclick="miBarra(this)">Pacientes</a>
									</li>
									<li class="nav-item">
									  <p class="nav-link text-white" href="#"></p>
									</li>

									<!-- Boton PUBLICACIONES que hace referencia al subModulo PUBLICACIONES -->
									<li class="nav-item">
									<a class="btn btn-primary <?php if($_GET['state'] == -3) echo 'active'; ?>"  id="pills-contact-tab"  data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false" onclick="miBarra(this)" >Publicaciones</a>
									</li>
									<li class="nav-item">
									  <p class="nav-link text-white" href="#"></p>
									</li>


									<!-- Boton BUZON que hace referencia al subModulo BUZON -->
									<li class="nav-item">
									<a class="btn btn-primary <?php if($_GET['state'] == -4) echo 'active'; ?>" id="pills-buzon-tab" data-toggle="pill" href="#pills-buzon" role="tab" aria-controls="pills-buzon" aria-selected="false" onclick="miBarra(this)" >Buzón</a>
									</li>
									<li class="nav-item">
									  <p class="nav-link text-white" href="#"></p>
									</li>


									<!-- Boton SISTEMA que hace referencia al subModulo SISTEMA -->
									<li class="nav-item">
									<a class="btn btn-primary <?php if($_GET['state'] == -5) echo 'active'; ?>" id="pills-sistema-tab" data-toggle="pill" href="#pills-sistema" role="tab" aria-controls="pills-sistema" aria-selected="false"  >Sistema</a>
									</li>
									<li class="nav-item">
									  <p class="nav-link text-white" href="#"></p>
								    </li>
								  
								  
									<!-- BARRA DE NAVEGACION, UN ARCHIVO ESPECIFIVO "barras.php y barras.js" 
											se encargan de poner aqui la barra especifica para cada submodulo.-->
									<li class="nav-item">
										<form id="miBarra" class="form-inline" style="width:150px;">
										
										 
										 
										</form>
									</li>
								</ul>
									
					</div>
					
					<!-- Boton SALIR que hace referencia a "salir.php"-->
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
						
						  
						  <!-- subModulo Inicio -->
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
						  <!-- Termina subModulo Inicio -->
						  
						 

						 <!-- subModulo Usuarios -->
						  <div class="tab-pane fade <?php if($_GET['state'] == -5) echo 'show active'; ?> " id="pills-sistema" role="tabpanel" aria-labelledby="pills-sistema-tab">
							<div class="wrapper">
									<div class="bg-light" style = "box-shadow: 1px 1px 10px 2px rgba(0,0,0,0.9);  margin-bottom: 1%; margin-top: 2%; padding: 5px 20px;  border-radius: 10px;">
								
										<div class="textCenter archivo bg-light" style="margin-top:15px;">
											<h3 style=" font-weight: bold;">Usuarios</h3>
											<p style="font-size:15px; margin-left:auto; margin-right:auto; width: 50%;" class="text-info">
											Aqui se pueden definir los usuarios que tendran Acceso al Sistema.</p>
										</div>
								
								<div style="margin-left:auto; justify-content: center;  display: block; width:98%;">
								
									<div style="display: flex; ">
										
											<a class="text-center rounded bHover btnOpt" style="margin-left: 0px;" data-toggle="modal" data-target="#newUsuario">
												<div style="font-size: 28px;" class="fo fa-user-plus text-primary"></div>
												<div style="cursor:pointer; font-size: 12px;" class="text-dark">Nuevo Usuario</div>
											</a>
											
											
											
											<a class="text-center rounded bHover btnOpt"  id="btnModificarUsuario" data-toggle="modal" data-target="#editaUsuario" onclick="editarUsuario()">
										
												<div style="font-size: 28px;" class="fo fa-edit text-secondary"></div>
												
												<div style="cursor:pointer; font-size: 12px;" class="text-dark">Cambiar Datos del Usuario</div>
											</a>
												
												
											<a class="text-center rounded bHover btnOpt"  id="btnEliminaUsuario" style="text-decoration:none;">
												
												<div style="font-size: 28px;" class="fo fa-trash text-danger"></div>
												
												<div style="font-size: 12px;" class="text-dark">Eliminar Usuario</div>
											</a>
												
												
										</div>
										
										<!-- Muestro Mis Usuario -->
										
									<table class="table  textCenter bg-white miScroll" style="margin-top: 1%; width:100%; height:auto;">
											
											<thead style="width:100%; background:#5d97e2;">
											  <tr id="headTR">
												<th scope="col">Nickname</th>
												<th scope="col">Nombre</th>
												<th scope="col">Tipo de usuario</th>
											  </tr>
											</thead>
								
								
											<tbody>
											
											   <?php
												  $qry = 'SELECT nickname, PASSWORD, CONCAT(nombre," ",apellidoP," ",apellidoM) AS nombreComp, tipo
														  FROM usuario INNER JOIN tipo ON usuario.idTipo = tipo.idTipo';
												  $rsl = bd_query($qry);

												  while ($row = mysqli_fetch_assoc($rsl)) 
												  {
												?>
												  <tr class="aHover1" onclick="seleccionarUsuario(this)" id="<?php echo $row["nickname"]; ?>">
													  <th th scope="row"><?php echo $row["nickname"]; ?></th>
													  <td><?php echo $row["nombreComp"]; ?></td>
													  <td><?php echo $row["tipo"]; ?></td>
												  </tr>
												   <?php
													}
													?>
												</tbody>
											</table>
											<!-- Termino de mostrar Mis Usuarios -->
											
								
										</div>
									</div>
								</div>
						  
						  
						  </div>
						  <!-- Termina subModulo Usuarios -->
						  
						  
						  
						  
						  <!-- subModulo Pacientes -->
						  <div class="tab-pane fade <?php if($_GET['state'] == -2) echo 'show active'; ?> " id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
								<div class="wrapper">
									<div class="bg-light" style = "box-shadow: 1px 1px 10px 2px rgba(0,0,0,0.9);  margin-bottom: 1%; margin-top: 2%; padding: 5px 20px;  border-radius: 10px;">
								
										<div class="textCenter archivo bg-light" style="margin-top:15px;">
											<h3 style="font-weight: bold;">Pacientes</h3>
											<p style="font-size:15px; margin-left:auto; margin-right:auto; width: 50%;" class="text-info">En esta seccion usted puede ver todo un listado de los pacientes.
											Para ver los Análisis o Subir uno nuevo, de click en "Abrir Expediente".</p>
										</div>
								
										<div style="margin-left:auto; justify-content: center;  display: block; width:98%;">
							
										
										
										<script src="Validaciones/seleccionarPaciente.js"></script>
										
										
										<!-- Muestro Mis Pacientes -->
										
										<div style="display: flex; ">
										
											<a class="text-center rounded bHover btnOpt" style="margin-left: 0px;" data-toggle="modal" data-target="#newPaciente">
												<div style="font-size: 28px;" class="fo fa-user-plus text-primary"></div>
												<div style="cursor:pointer; font-size: 12px;" class="text-dark">Nuevo Paciente</div>
											</a>
											
											
											
											<a class="text-center rounded bHover btnOpt" id="btnModificarPaciente" data-toggle="modal" data-target="#editaPaciente" onclick="editarPaciente()">
										
												<div style="font-size: 28px;" class="fo fa-edit text-secondary"></div>
												
												<div style="cursor:pointer; font-size: 12px;" class="text-dark">Cambiar Datos del Paciente</div>
											</a>
												
												
											<a class="text-center rounded bHover btnOpt"  id="btnEliminaPaciente" style="text-decoration:none;">
												
												<div style="font-size: 28px;" class="fo fa-trash text-danger"></div>
												
												<div style="font-size: 12px;" class="text-dark">Eliminar Paciente</div>
											</a>
												
												
										</div>
										
												<div id="datosCodigo" class="table table-hover" style="margin-top:0px; width:100%; margin-left: auto; margin-right: auto;">
											

												</div>
												
												
												
											<!-- Termino de mostrar Mis Pacientes -->
											
								
										</div>
									</div>
								</div>
							</div>
						   <!-- Termina subModulo Pacientes -->
						   
						   
						   
						   
						   <!-- subModulo Lista Analisis -->
						  <div class="tab-pane fade <?php 
						  
								  if($_GET['state'] != -10 && $_GET['state'] != -1 && $_GET['state'] != -2  && $_GET['state'] != -3  && $_GET['state'] != -4 && $_GET['state'] != -5 && $_GET['state'] != ""  ) 
									  echo 'show active'; 
								  
									?> " id="pills-lista" role="tabpanel" aria-labelledby="pills-lista-tab">
								<div class="wrapper">
									<div class="bg-light" style = "box-shadow: 1px 1px 10px 2px rgba(0,0,0,0.9);  margin-bottom: 1%; margin-top: 2%; padding: 5px 20px;  border-radius: 10px;">
									
										<script src="Validaciones/seleccionarAnalisis.js"></script>
										
										 <?php
											 $cod = $_GET["state"];

											  //Si existe el codigo
											  $qry = 'SELECT COUNT(*) AS existe FROM paciente WHERE codigoPaciente = "'.$cod.'"';
											  $res = bd_query($qry);
											  if (mysqli_fetch_assoc($res)["existe"] == 1) 
											  {
												  $cod = $_GET['state'];
												  $qry = 'SELECT CONCAT(nombre, " ", apellidoP, " ", apellidoM) AS nombreC
														  FROM paciente WHERE codigoPaciente = "'.$cod.'"';
												  $res = bd_query($qry);
												  $row = mysqli_fetch_assoc($res);
										?>
										<div class="textCenter archivo bg-light" style="margin-top:15px;">
											<h3 style=" font-weight: bold;"><?php echo $row["nombreC"]." (".$cod.")"; ?></h3>
											<p style="font-size:15px; margin-left:auto; margin-right:auto; width: 50%;" class="text-info">
											En esta seccion usted puede Ver, Subir, Editar o Eliminar Análisis
											para este Paciente.</p>
										</div>
								
										<div style="margin-left:auto; justify-content: center;  display: block; width:98%;">
										
												<div style="display: flex; width:100%;">
												
													<a class="text-center rounded bHover btnOpt" style="margin-left: 0px;"  data-toggle="modal" data-target="#newAnalisis">
														<div style="font-size: 28px;" class="fo fa-plus-circle text-primary"></div>
														<div style="cursor:pointer; font-size: 12px;" class="text-dark">Nuevo Análisis</div>
													</a>
													
													
													
													<a class="text-center rounded bHover btnOpt" id="btnModificarAnalisis" data-toggle="modal" data-target="#editaAnalisis" onclick="editarAnalisis()">
												
														<div style="font-size: 28px;" class="fo fa-edit text-secondary"></div>
														
														<div style="cursor:pointer; font-size: 12px;" class="text-dark">Cambiar Datos del Análisis</div>
													</a>
														
														
													<a style="text-decoration:none;" class="text-center rounded bHover btnOpt"  id="btnEliminarAnalisis" style="text-decoration:none;">
														
														<div style="font-size: 28px;" class="fo fa-trash text-danger"></div>
														
														<div style="font-size: 12px;" class="text-dark">Eliminar Análisis</div>
													</a>
													
													<a style="text-decoration:none;" class="text-center rounded bHover btnOpt" href="indexAdmin.php?state=-2">
														
														<div style="font-size: 28px;" class="fo fa-arrow-left text-success"></div>
														
														<div style="font-size: 12px;" class="text-dark">Volver</div>
													</a>	
												</div>
							
										<!-- Muestro Mis Analisis -->
										<table class="table  textCenter bg-white miScroll" style="margin-top: 1%; width:100%; height:auto;">
											<thead style="width:100%; background:#5d97e2;">
											  <tr id="headTR">
												<th scope="col"></th>
										   	    <th scope="col">Tipo Análisis</th>
										        <th scope="col">Publicado</th>
											    <th scope="col">Caduca</th>
											    <th scope="col">Análisis</th>
											  </tr>
											</thead>
								
								
											<tbody>
												<?php
												  $qry = 'SELECT COUNT(*) AS existe FROM analisis WHERE codigoPaciente = "'.$cod.'"';
												  $res = bd_query($qry);
												  
												  if (mysqli_fetch_assoc($res)["existe"] != 0)
												  {
												  $qry = 'SELECT * FROM analisis WHERE codigoPaciente = "'.$cod.'"';
												  $res = bd_query($qry);
												  $num = 1;
												  while ($row = mysqli_fetch_assoc($res)) 
												  {
													//Cambiar la fecha al formato deseado
													$row["fchPublicacion"] = substr($row["fchPublicacion"],8,2)."/".substr($row["fchPublicacion"],5,2)."/".substr($row["fchPublicacion"],0,4);
													$row["caduca"] = substr($row["caduca"],8,2)."/".substr($row["caduca"],5,2)."/".substr($row["caduca"],0,4);
												?>
												  <tr class="aHover1" onclick="seleccionarAnalisis(this, '<?php echo $cod; ?>', '<?php echo $row["idAnalisis"]; ?>');">
													<th scope="row"><?php if ($num<10) echo "0"; echo $num; ?></th>
													<td style=" word-break: break-word; " ><?php echo $row["tipoAnalisis"]; ?></td>
													<td style=" word-break: break-word; " ><?php echo $row["fchPublicacion"]; ?></td>
													<td style=" word-break: break-word; " ><?php echo $row["caduca"]; ?></td>
													<td style=" word-break: break-word; " ><a class="link" href="<?php echo $row["rutaPDF"]; ?>" target="_blank">Ver Análisis</a></td>
												  </tr>
												<?php
													$num++;
													}
											    }
												else
												{
												?>	
													<tr>
													<th></th>
													<td style=" word-break: break-word; " ></td>
													<td style=" word-break: break-word; " >NO TIENE ANÁLISIS ESTE PACIENTE</td>
													<td style=" word-break: break-word; " ></td>
													<td style=" word-break: break-word; " ></td>
												  </tr>
												<?php
												}						
												?>
											</tbody>
										 </table>
											<!-- Termino de mostar Mis Pacientes -->
											
										</div>
										<?php
										  }
										  else 
										  {
											echo '<div class="textCenter archivo bg-light" style="margin-top:15px;">
														<h3 style=" font-weight: bold;">Portate Bien</h3>
													</div>';
										  }
										 ?>
									</div>
									
								</div>
							</div>
						   <!-- TERMINA subModulo Lista Analisis -->
						   
						   
						  
						  
						   <!-- subModulo Publicaciones -->
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
							<!-- Termina subModulo Publicaciones -->
						
						
						<!-- subModulo Buzon -->
						<div class="tab-pane fade <?php if($_GET['state'] == -4) echo 'show active'; ?> " id="pills-buzon" role="tabpanel" aria-labelledby="pills-buzon-tab">
								
								<div class="wrapper">
									<div class="bg-light" style = "box-shadow: 1px 1px 10px 2px rgba(0,0,0,0.9);  margin-bottom: 1%; margin-top: 2%; padding: 5px 20px;  border-radius: 10px;">
								
										<div class="textCenter archivo bg-light" style="margin-top:15px;">
											<h3 style=" font-weight: bold;">Buzón</h3>
											<p style="font-size:15px; margin-left:auto; margin-right:auto; width: 50%;" class="text-info">
											Listado de Mensajes que los Pacientes o visitantes de la Página Web han dejado.</p>
										</div>
								
										<div style="margin-left:auto; justify-content: center;  display: block; width:98%;">
										
											<div style="display: flex; ">
													
													<a class="text-center rounded bHover btnOpt" id="btnEliminaMsj" style="margin-top: 0px; text-decoration:none;">
														
														<div style="font-size: 28px;" class="fo fa-trash text-danger"></div>
														
														<div style="font-size: 12px;" class="text-dark">Eliminar Mensaje</div>
													</a>
															
															
											</div>
								
								
											<table class="table  textCenter bg-white miScroll" style="margin-top: 1%; width:100%; height:auto;">
												<thead style="width:100%; background:#5d97e2;">
												  <tr id="headTR">
													<th scope="col">Nombre</th>
													<th scope="col">Telefono</th>
													<th scope="col">Correo</th>
													<th scope="col">Asunto</th>
													<th scope="col">Fecha</th>
												  </tr>
												</thead>
									
												<script src="Validaciones\seleccionarMensaje.js"></script>
												<tbody>
												  <?php //Optener los codigos registrados
												  $qry = 'SELECT COUNT(*) AS existe FROM buzon';
												  $rsl =  bd_query($qry);
												  
												  if(mysqli_fetch_assoc($rsl)['existe'] > 0)
												  {
													$qry = 'SELECT * FROM buzon';
													$rsl =  bd_query($qry);

													while ($row = mysqli_fetch_assoc($rsl)) 
													{
													?>
													  <tr class="aHover1" id="<?php echo $row["idBuzon"]; ?>" onclick="seleccionarMensaje(this)" >
														<th scope="row"><?php echo $row["nombre"]; ?></th>
														<td style=" word-break: break-word; " ><?php echo $row["telefono"]; ?></td>
														<td style=" word-break: break-word; " ><?php echo $row["correo"]; ?></td>
														<td style=" word-break: break-word; " ><?php echo $row["asunto"]; ?></td>
														<td style=" word-break: break-word; " > <?php echo $row["fecha"]; ?> </td>
													  </tr>
													  
												  <?php 
													}
												  } 
												  else
												  {
												  ?>
													 <tr>
														<th scope="row"></th>
														<td style=" word-break: break-word; " ></td>
														<td style=" word-break: break-word; " >	NO HAY NUEVOS MENSAJES</td>
														<td style=" word-break: break-word; " ></td>
														<td style=" word-break: break-word; " ></td>
													  </tr> 
												   <?php 
												  }
												  
												  ?>
													  
													</tbody>
												</table>
								
										</div>
									</div>
								</div>
						  
						  </div>
						<!-- Termina subModulo Buzon -->
						
						
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