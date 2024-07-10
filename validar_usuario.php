<?php 
	
  include("Validaciones/query.php");
	include('bd.php');
	
	$usuario = $_POST['usuario'];
	$password = $_POST['pass'];








	$qry = 'SELECT COUNT(*) AS existe FROM usuario WHERE nickname = "'.$usuario.'" and password = "'.$password.'";';
    

	$res = bd_query($qry);
	$res2 = bd_consulta($qry);


    

if(mysqli_fetch_assoc($res)["existe"] == 1)
{
	// Ver si es Admin
	$query = "select nombre, apellidoP, apellidoM, tipo from usuario inner join tipo
	where usuario.idTipo = tipo.idTipo and nickname = '".$usuario."' and password = '".$password."'";
	
	//echo $query;
	
	$result=bd_consulta($query); 
	
	
	if( $row = mysqli_fetch_assoc($result))
	{
		
		
		SESSION_START();
		$_SESSION['userOK']=true;
		$_SESSION['nickname']=$usuario;
		$_SESSION['nombre']=$row['nombre'];
		$_SESSION['apellidoP']=$row['apellidoP'];
		$_SESSION['apellidoM']=$row['apellidoM'];
		$_SESSION['tipo']=$row['tipo'];
		
		
		switch($_SESSION['tipo'])
		  {
			  case "Administrador":
				header('Location: indexAdmin.php?state=-1');
				break;
				
			  case "Quimico":
				header('Location: indexQuimico.php?state=-1');
				break;
				
			  case "Publicitario":
				header('Location: indexPublicitario.php?state=-1');
				break;
			  
		  }
		  
		
	}
	else
	{
		header('Location: controlador.php');
	}
}
else
{
	header('Location: controlador.php');
}












?>