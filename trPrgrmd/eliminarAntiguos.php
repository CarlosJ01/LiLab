<?php
/*
Eliminamos los analisis que tengan dos meses de antiguead
  Definimos la fecha limite apartir de la fecha actual del servidor menos 2 meses
  Buscamos todos los registros de la base de dato de la tabla analisis que su fecha de caducidad sea menor a la fecha limite
  Mostramos el listado de registros en consola y guardomos la rutaPDF de estos en un arreglo,
  Eliminamos los archivos pdf listados en el arreglo,
  Eliminamos los registros de la base de datos
  */
  //Definimos la fecha limite
  date_default_timezone_set('America/Mexico_City');
  $fchLim = date("Y-m-d",strtotime(date('Y-m-d')."- 2 month"));
  echo "Fecha limite : ".$fchLim."\n";
  
  //Buscamos los archivos a eliminar
  include("query.php");
  $qry = 'SELECT * FROM analisis WHERE caduca <= "'.$fchLim.'"';
  $rsl = bd_query($qry);

  //Mostramos los analisis
  echo "ANALISIS A ELIMINAR\n";
  echo "\tCodigo Paciente\tTipo\tRuta PDF\t\t\t\tFecha Publicacion\tFecha caduca\n\n\n";
  $cont = 1;
  $rutas = array();
  while ($row = mysqli_fetch_assoc($rsl)) {
    echo $cont."\t";
    echo $row["codigoPaciente"]."\t";
    echo $row["tipoAnalisis"]."\t";
    echo $row["rutaPDF"]."\t";
    $rutas[] = $row["rutaPDF"];
    echo $row["fchPublicacion"]."\t\t";
    echo $row["caduca"]."\n";
    $cont++;
  }

  //Eliminar Archivos
  for ($i=0; $i <count($rutas); $i++) {
    $rutas[$i] = substr(__DIR__, 0, -8).$rutas[$i];
    unlink($rutas[$i]);
  }

  //Eliminamos de la base de datos
  $qry = 'DELETE FROM analisis WHERE caduca <= "'.$fchLim.'"';
  bd_query($qry);

  echo "Eliminados analisis con 2 meses de antiguedad\n";
?>
