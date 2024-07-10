<?php
include('bd.php');
$nombre=$_POST['nombre'];
$telefono=$_POST['telefono'];
$correo=$_POST['correo'];
$mensaje=$_POST['mensaje'];

if ($correo == "") {
  $correo = " ";
}

$fch = date('Y-m-d');

$insert="insert into buzon values (NULL ,'".$nombre."','".$telefono."','".$correo."','".$mensaje."','".$fch."')";
$resultinsert=bd_consulta($insert);


//pon donde Jahir muestra todos los mensajes
header('Location: index.php?op=-10');

 ?>
