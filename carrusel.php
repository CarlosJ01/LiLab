<?php
  $query="SELECT * FROM anuncio order by fecha";
  $resul=bd_consulta($query);
?>
<!-- *************************************************************************-->
<div class="container col-md-11 col-sm-12">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <?php
            for($i=0;$row=mysqli_fetch_assoc($resul);$i++){
              if($i==0){
                echo "<li data-target="."#carouselExampleIndicators" ."data-slide-to=".$i." class="."active"."></li>";
              }
              else{
                echo "<li data-target="."#carouselExampleIndicators" ."data-slide-to=".$i."></li>";
              }
            }
          ?>
        </ol>
          <div class="carousel-inner">

            <?php
              $query = "SELECT img_1, id_anuncio FROM anuncio WHERE img_1 != ''";
              $resul=bd_consulta($query);
                for($i=0;$row=mysqli_fetch_assoc($resul);$i++){
                   if($i==0){
                     $first='<div class="carousel-item active">
                       <a href="index.php#'.$row['id_anuncio'] .'P"><img class="d-block w-100" src="';
                   }
                   else{
                     $first='<div class="carousel-item">
                       <a href="index.php#'.$row['id_anuncio'] .'P"><img class="d-block w-100" src="';
                   }
                   $img="" .$row['img_1'];
                   $last='" alt="Second slide">
                   <div class="d-none d-md-block d-sm-none carousel-caption ">
                    <button type="button" class="btn btn-primary" name="button" style="width:100px;"><a style="text-decoration: none;" class="btn-primary" href="index.php#'.$row['id_anuncio'] .'P">Ver más</a></button>
                  </div>
                   </a></div>';
                  echo ($first .$img .$last);
                }
              ?>
            </div>

            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>

        </div>
    </div>

<!-- *****************************************************************************-->

  <div class="d-block d-sm-block d-md-block d-lg-none container text-center shadow my-5 col-sm-2 col-md-4">
    <br>
    <img src="principal_img/btn2.png" alt="" widht="80px" height="100px"><br><br>
    <button type="button" class="btn btn-primary text-light btn-lg" data-toggle="modal" data-target="#modal1">TENGO UN CÓDIGO</button>
    <br><br>
  </div>


<div class="container bg-white card border-0 shadow my-5">
    <?php
	  $que = "SELECT * FROM anuncio WHERE img_2 != '' AND titulo != '' AND descripcion != '' ORDER BY fecha DESC";
      $resl=bd_consulta($que);
      for($i=0;$row=mysqli_fetch_assoc($resl);$i++){

        if($i%2 == 0){
          //echo "Par";
          if($i==0){
            $res='
    			  <br id="'.$row['id_anuncio'] .'P">
    			  <div class="container">
    				<section class="main row">
    				  <article class="col-md-7">
    					<h1>' .$row['titulo'] .'</h1>
    					<p>' .$row['descripcion'] .'</p>
    				  </article>
    				  <aside class="col-md-5">
    					<img src="' .$row['img_2'] .'" class="d-block w-100" style="max-width:350px;" alt="...">
    				  </aside>
    				</section>
    			  </div>';
          }
    		  else if($row['img_2'] != ""){
    			  $res='
    			  <hr id="'.$row['id_anuncio'] .'P">
    			  <br>
    			  <div class="container">
    				<section class="main row">
    				  <article class="col-md-7">
    					<h1>' .$row['titulo'] .'</h1>
    					<p>' .$row['descripcion'] .'</p>
    				  </article>
    				  <aside class="col-md-5">
    					<img src="' .$row['img_2'] .'" class="d-block w-100" style="max-width:350px;" alt="...">
    				  </aside>
    				</section>
    			  </div>';
    		  }
		      else{
    			  $res='
    			  <hr  id="'.$row['id_anuncio'] .'P" >
    			  <br>
    			  <div class="container">
    				<section class="main row">
    				  <article class="col-md-7">
    					<h1>' .$row['titulo'] .'</h1>
    					<p>' .$row['descripcion'] .'</p>
    				  </article>
    				  <aside class="col-md-5">
    				  </aside>
    				</section>
    			  </div>';
		     }
          echo($res);
        }
        else{
          if($row['img_2'] != ""){
    			  $res='<br>
    			  <hr id="'.$row['id_anuncio'] .'P" >
    			  <br>
    			  <div class="container">
    				<section class="main row">
    				  <aside class="col-md-5">
    					<img style="max-width:350px;" src="' .$row['img_2'] .'" alt="" class="d-block w-100">
    				  </aside>
    				  <article class="col-md-7">
    					<h1>' .$row['titulo'] .'</h1>
    					<p>' .$row['descripcion'] .'</p>
    				  </article>
    				</section>
    			  </div>
    			  ';
		     }
		     else{
    			  $res='<br>
    			  <hr id="'.$row['id_anuncio'] .'P" >
    			  <br>
    			  <div class="container">
    				<section class="main row">
    				  <aside class="col-md-5"><img style="max-width:350px;" src="' .$row['img_2'] .'" alt="" class="d-block w-100">
    				  </aside>
    				  <article class="col-md-7">
    					<h1>' .$row['titulo'] .'</h1>
    					<p>' .$row['descripcion'] .'</p>
    				  </article>
    				</section>
    			  </div>
    			  ';
		    }
          echo($res);
       }
    }
    ?>
    <br>
</div></div><hr id="quienes">

<!-- Ejemplo de mision y vision -->
<div class="container">
  <h2>¿Quienes somos?</h2>
  <p>El renovado Laboratorio de Análisis Clínicos LILAB, tiene como objetivo esencial brindar de manera eficiente, oportuna y certera todo tipo de exámenes médicos que el paciente requiera en área de Bioquímica, Hematología, Parasitología, Bacteriología, Inmunología y Hormonas. Además, tenemos la ventaja de realizar exámenes de urgencia como Perfil Hematológico, PCR, Orina Completa y Test rápidos para la detección de enfermedades respiratorias, los cuales son entregados durante el día. Con profesionales altamente capacitados y tecnología de punta otorgamos confiabilidad en cada procedimiento. </p>
  <p> De la misma forma nuestros procesos son evaluados periódicamente por medio de controles de calidad externos, sumados a los efectuados diariamente por nuestros profesionales. </p>
  <p> Laboratorio LILAB cuenta con un moderno centro de operaciones, lo que permite a los pacientes acceder cómoda y oportunamente a los servicios que brinda nuestro laboratorio. Además, cuenta con una amigable plataforma Web para la descarga de resultados y resolver distintas consultas acerca de nuestros servicios. </p>
  <br>
  <div class="row">
    <div class="bg-primary text-light col-md-6">
      <h3>Mision</h3>
      <p> LiLab Laboratorios tienen como misión el contribuir con el mejoramiento de la calidad de vida del la población costarricense, a través del suministro de ayudas diagnósticas que satisfacen las exigencias de la medicina moderna, proporcionando resultados confiables y oportunos con el más alto desarrollo profesional, tecnológico y de servicio. </p>
	  </div>
    <div class="col-md-6">
      <h3>Vision</h3>
      <p>Proyectamos un crecimiento de nuestra empresa, acorde a nuestra importante trayectoria y lo que hemos consolidado en años de funcionamiento. Nuestro objetivo es constituirnos en el Laboratorio Clínico preferido, reconocido por su excelencia en servicio y calidad.</p>
    </div>
  </div>
</div>
<br>
