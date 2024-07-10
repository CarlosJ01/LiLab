<body onunload="salir.php">
<!-- Implementacion de la barra social -->
    <div class="social-bar">
      <a href="https://www.facebook.com/lilablaboratorios.morelia" class="icon icon-facebook2" target="_blank"></a>
      <a href="https://instagram.com/lilab.laboratorio?igshid=arp0me2a19n4" class="icon icon-instagram" style="text-decoration: none;" target="_blank"></a>
      <a href="#wuats" class="icon icon-whatsapp"  style="text-decoration: none;"></a>
    </div>

    <!-- Creacion del modal -->
    <div class="container justify-content-center">
      <div class="modal fade" id="modal1">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <img src="principal_img\modal.png" alt="" height="80" width="120">
              <h5 class="modal-title">INGRESA CODIGO PARA CONSULTAR TUS RESULTADOS</h5>
              <button type="button font-size-sm" class="close"
              data-dismiss="modal" aria-label="Close">
                &times;
              </button>
            </div>
            <div class="modal-body">
              <input type="text" class="form-control" id="codigo" autofocus placeholder="Ingresa tu código aquí">
            </div>
            <div class="modal-footer">
              <p class="font-weight-light text-muted">Si no cuentas con algun código y deseas hacerte análisis clínicos te invitamos a que te pongas en contacto para agendarte una cita</p>
              <button type="button" class="btn btn-primary" id="verRlt">Ver resultados</button>
            </div>
            <div class="container" id="tablaResultados">

            </div>
          </div>
        </div>
      </div>
    </div>



    <!-- Barra de navegacion ejemplo -->
    <div class="">
      <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top" >
        <div class="container">
          <a class="navbar-brand" href="index.html">
            <img src="principal_img\logo-slim.png" width="120" height="75" class="" alt="">
          </a>
          <div class="ml-0 mr-4">
            <h4 class="text-light">ANÁLISIS</h4>
            <h4 class="font-weight-bold text-primary">CLÍNICOS</h4>
          </div>

          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

		<!-- Parte de los botones del nav -->
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <div class="navbar-nav mr-3 ml-auto text-center">
            <a class="nav-item nav-link active" href="index.php">INICIO<!-- <span class="sr-only">(current)</span>--></a>

			<!-- Boton con mensaje emergente -->
            <div class="d-flex flex-row justify-content-center">
              <button type="button" class="btn btn-primary text-light" data-toggle="modal" data-target="#modal1">TENGO UN CÓDIGO</button>
            </div>
            <a class="nav-item nav-link active" href="#quienes">¿QUIÉNES SOMOS?</a>
            <a class="nav-item nav-link active" href="#Encuentranos">CONTÁCTANOS</a>
              <a class="nav-item nav-link"href="controlador.php" target="blank">LOGIN</a>
            </div>
          </div>
        </div>
        </nav>
      </div>
      <br>
      <br>
      <br>
      <br><br>
	  
	 
