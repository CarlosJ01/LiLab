<?php 
											
$barra = "";
	switch(@$_POST['cual'])
	{
		case 2:
		$barra = '
		<input value="" class="form-control mr-sm-2 rounded-pill" style="width:150px;" 
			type="text" placeholder="Buscar" aria-label="Search" name="caja_busquedaCodigo" id="caja_busquedaCodigo">';
		break;

		case 3:
		$barra = '
		<input value="" class="form-control mr-sm-2 rounded-pill" style="width:150px;" type="text" 
			placeholder="Buscar" aria-label="Search" name="caja_busqueda" id="caja_busqueda">';
		break;
		
		
		case 0:
		$barra = '
		<input class="form-control mr-sm-2 rounded-pill" style="width:150px;" type="text" 
			placeholder="Buscar" aria-label="Search" >';
		break;
		
	}

echo $barra;
?>