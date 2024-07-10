<?php
SESSION_START();
  switch($_SESSION['tipo'])
  {
	  case "Administrador":
		$tipo = "Admin";
		break;
		
	  case "Quimico":
		$tipo = "Quimico";
		break;
		
	  case "Publicitario":
		echo "No seas Travieso";
		break;
	  
  }
  
  
	header( 'Content-type: text/html; charset=iso-8859-1' );
    $servername = "localhost";
    $username = "laborator_root";
  	$password = "~8I1ea_TrYv}";
  	$dbname = "laborator_lilab2";

	$conn = new mysqli($servername, $username, $password, $dbname);
      if($conn->connect_error){
        die("Conexión fallida: ".$conn->connect_error);
      }
	  
	  if (!$conn->set_charset("utf8")) {
		 printf("Error cargando el conjunto de caracteres utf8: %s\n",
			$mysqli->error);
		 exit();
		}

    $salida = "";

    $query = "SELECT * FROM paciente ORDER BY apellidoP DESC";

    if (isset($_POST['consulta'])) {
    	$q = $conn->real_escape_string($_POST['consulta']);
    	$query = "SELECT * FROM paciente WHERE nombre LIKE '$q%' or telefono LIKE '$q%' or apellidoP LIKE '$q%' or apellidoM LIKE '$q%' or codigoPaciente LIKE '$q%'";
    }

    $resultado = $conn->query($query);

    if ($resultado->num_rows>0) 
	{
    	$salida.='
		
					<table class="table  textCenter bg-white miScroll" style="margin-top: 1%; width:100%; height:auto;">
						<thead style="width:100%; background:#5d97e2;">
						  <tr id="headTR">
							<th scope="col">Codigo</th>
							<th scope="col">Nombre</th>
							<th scope="col">Apellido Paterno</th>
							<th scope="col">Apellido Materno</th>
							<th scope="col">Telefono</th>
							<th scope="col">Lista de Análisis</th>
						  </tr>
						</thead>
			
			
						<tbody>
							
							
							';

    	while ($fila = $resultado->fetch_assoc()) 
		{
    		$salida.=	'
				
				
				  <tr class="aHover1" onclick="seleccionarPaciente(this);">
					<th scope="row">'.$fila["codigoPaciente"].'</th>
					<td style=" word-break: break-word; " >'.$fila["nombre"].'</td>
					<td style=" word-break: break-word; " >'.$fila["apellidoP"].'</td>
					<td style=" word-break: break-word; " >'.$fila["apellidoM"].'</td>
					<td style=" word-break: break-word; " >'.$fila["telefono"].'</td>
					<td style=" word-break: break-word; " ><a class="link" href="index'.$tipo.'.php?state='.$fila["codigoPaciente"].'">Abrir Expediente</a></td>
				  </tr>
				
				
				';

    	}
    	$salida.="</tbody></table>";
    }
	else
	{
    	$salida.="<br><br><h4>NO ENCONTRAMOS PACIENTES :(</h4>";
    }


    echo $salida;

    $conn->close();


//<td><a href=".$fila['rutaPDF']." target='_blank'>Resultados.pdf</a></td>
?>
