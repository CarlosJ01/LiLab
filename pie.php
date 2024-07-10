<!-- Ejemplo de mision y vision -->

<br  id="wuats" >
</div>

<!-- Footer c: con responsividad -->
<footer id="pie">
<div id="Encuentranos" class="footer-top">
<div class="container">
  <div class="row">
    <div class="col-md-4 col-sm-12 col-xs-12 segment-one">
      <h3>Ponte en contacto</h3>
	  <p><a href="#"><i class="icono icono-phone text-white"></i></a>  Tel: 314-15-88</p>
      <p> <a><i class="icono icono-whatsapp text-white"></i></a>  443-587-60-57</p>
      <p>Tambien puedes encontrarnos en nuestras redes sociales</p>
      
      <a href="https://www.facebook.com/lilablaboratorios.morelia" target="_blank"><i class="icono icono-facebook text-white"></i></a>
      <a href="https://instagram.com/lilab.laboratorio?igshid=arp0me2a19n4" target="_blank"><i class="icono icono-instagram text-white"></i></a>
      <br>

	  <h3 style="margin-top: 18%;">Horario de Atencion</h3>
      <p>Lunes a Sabado</p>
      <p>8:00am - 2:00pm</p>
      <p>5:00am - 7:00pm</p>
    </div>

     <div class="col-md-4 col-sm-12 col-xs-12 segment-two">
       <h3>Encuentranos <i class="icono icono-location"></i></h3>
       <a href="#"></a>
       <p>Av. Maestro 773 Int.2 - Col. Lomas de Hidalgo - C.P. 58240 - Morelia, Michoacán</p>
       <div class="frame">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3756.3477061672347!2d-101.16173448525997!3d19.6978153867342!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842d11ffafbea073%3A0xe6c4ecf2cb80e0c0!2sAv%20del%20Maestro%20773%2C%20Lomas%20de%20Hidalgo%2C%2058240%20Morelia%2C%20Mich.!5e0!3m2!1ses-419!2smx!4v1574699397845!5m2!1ses-419!2smx"width="300" height="300" frameborder="0" style="border:0;" allowfullscreen="true"></iframe>
       </div>
     </div>

<!-- Contactanos -->
<script src="Validaciones/validarContactanos.js"></script>
 <div class="col-md-4 col-sm-12 col-xs-12 segment-three">
   <h3>Dejanos tu Mensaje</h3>
   <form class="formulario" method="post" action="nuevobuzon.php" name="buzon" id="buzon" onsubmit="return validarContactanos()">
     <input type="text" name="nombre" id="nom" placeholder="Tu nombre" required>
     <input type="tel" name="telefono" id="tel" placeholder="Numero de telefono" required>
     <input type="email" name="correo" id="email" placeholder="Correo(Opcional)">
     <br>
     <textarea type="text" style="height:100px;" name="mensaje" id="sms" placeholder="Tu mensaje" required></textarea>
     <br>
     <button class="btn btn-dark" type="submit" >Enviar</button>
   </form>
 </div>

  </div>
</div>
</div>
<p class="footer-bottom-text">Todos los derechos reservados por &copy;LiLab 2019</p>
</footer>
<!-- Implementacion del jQuery para algunas herramientas de bootstrap -->


<?php

if(@$_GET['op'] == -10)
{	
	echo '
	<div class="content" style="position:absolute; top:0; width:100%; margin-top:15%;">
		<div class="alert alert-info" style="text-align:center; width:230px; height:auto; margin-left:auto; margin-right:auto;">
			<img src="img/ok.png" height="40" width="40">
			<h3>Tu Mensaje ha sido enviado!!!<h3>
			<p style="font-weight:100;  font-size: 15px;" >Alguien de nuestro personal pronto se pondra en Contacto contigo</p>
		</div>
	</div>';
}
?>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="principal_js/jquery.js"></script>
<script src="principal_js/bootstrap.min.js"></script>

	<script src="js/alert.js"></script>

<!-- JQuery -->
            <script
              src="https://code.jquery.com/jquery-3.4.1.min.js"
              integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
              crossorigin="anonymous">
            </script>

            <!-- Mostrar Lista PDF -->
            <script type="text/javascript">
              $(function (){
                var btnRlt = $('#verRlt');
                btnRlt.on('click', function(e){
                  cod = document.getElementById("codigo").value.trim();
                  if (cod != "") {
                    var ajax = $.ajax({
                      data: {cod},
                      url: "descargar.php",
                      type: 'POST',
                      success: function (response){
                        document.getElementById("tablaResultados").innerHTML = "";
                        document.getElementById("tablaResultados").innerHTML = response;
                      },
                      error: function(response, status, error){
                        alert("Error al conectar, reintente de nuevo");
                      }
                    })
                  } else {
                    alert("Ingrese un codigo")
                    document.getElementById("tablaResultados").innerHTML = "";
                  }
                })
              })
            </script>
			
			<script type="text/javascript">
			$(document).ready(function() {
				setTimeout(function() {
					$(".content").fadeOut(1500);
				},3000);
			});
			</script>
			<script type="text/javascript">
			 function Cerrar() {
				alert('Mensaje')
				return "Te estás saliendo del sitio…";
			}
			</script>

</body>
</html>
