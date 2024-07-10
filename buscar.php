<?php


	header( 'Content-type: text/html; charset=iso-8859-1' );
	$servername = "localhost";
    $username = "laborator_root";
  	$password = "~8I1ea_TrYv}";
  	$dbname = "laborator_lilab2";

	$conn = new mysqli($servername, $username, $password, $dbname);
      if($conn->connect_error)
	  {
        die("Conexión fallida: ".$conn->connect_error);
      }
	  
	  if (!$conn->set_charset("utf8")) {
		 printf("Error cargando el conjunto de caracteres utf8: %s\n",
			$mysqli->error);
		 exit();
		}

    $salida = "";

    $query = "SELECT * FROM anuncio WHERE titulo NOT LIKE '' ORDER By fecha desc";

    if (isset($_POST['consulta'])) {
    	$q = $conn->real_escape_string($_POST['consulta']);
    	$query = "SELECT * FROM anuncio WHERE titulo LIKE '$q%' OR fecha LIKE '$q%' OR descripcion LIKE '$q%'";
    }

    $resultado = $conn->query($query);

    if ($resultado->num_rows>0) {
    	$salida.='
		
		<table class="table  textCenter bg-white miScroll" style="margin-top: 1%; width:100%; height:auto;">
											
			<thead style="width:100%; background:#5d97e2;">
			  <tr id="headTR">
				<th scope="col">ID</th>
				<th style="width: 250px;" scope="col">Titulo</th>
				<th scope="col">Fecha</th>
				<th style="width: 350px;" scope="col">Descripcion</th>
				<th scope="col">Carrusel</th>
				<th scope="col">Cuerpo</th>
			  </tr>
			</thead>
			<tbody>';
			

    	while ($fila = $resultado->fetch_assoc()) 
		{
			
			if($fila['img_1'] == "")
				$im1 = "";
			else
				$im1 = "IMG Carrusel";
			
			if($fila['img_2'] == "")
				$im2 = "";
			else
				$im2 = "IMG Body";
			
    		$salida.=	"
				<tr class='aHover1' id='".$fila['id_anuncio']."' onclick='seleccionarPublicacion(this);'  >
					<th scope='row'> ".$fila['id_anuncio']." </th>
					<td style='width: 250px; word-break: break-word; ' > ".$fila['titulo']." </td>
					<td style=' word-break: break-word; width: 120px;'> ".$fila['fecha']."</td>
					<td style='width: 350px; word-break: break-word; ' > ".$fila['descripcion']." </td>
					<td style=' word-break: break-word; ' ><a class='link' href='".$fila['img_1']."' target='_blank'> ".$im1." </td>
					<td style=' word-break: break-word; ' ><a class='link' href='".$fila['img_2']."' target='_blank'> ".$im2." </td>
				</tr>";
				
				/*
				<tr class="aHover1" >
					<th scope="row">1</th>
					<td>2x1</td>
					<td>mucho</td>
					<td><a href="#" class="link">carrucel.jpg</a></td>
					<td><a href="#" class="link">cuerpo.jpg</a></td>
				  </tr>
				  */

    	}
    	$salida.="</tbody></table>";
    }
	else
	{
    	$salida.="NO ENCONTRAMOS PUBLICACIONES :(";
    }


    echo $salida;

    $conn->close();



?>
