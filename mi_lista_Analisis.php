<?php 
	
	  $cod = $_POST["codigo"];

	  //Si existe el codigo
	  include("Validaciones/query.php");
	  $qry = 'SELECT COUNT(*) AS existe FROM paciente WHERE codigoPaciente = "'.$cod.'"';
	  $res = bd_query($qry);
	  if (mysqli_fetch_assoc($res)["existe"] == 1) 
	  {
			$out = '<div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header bg-dark">
						<h5 class="modal-title text-white" id="listaAnalisisTitle">Lista de Analisis</h5>
						<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
						  <div class="modal-body" id="mod">
							
								<div style="justify-content: center;  display: flex; width:100%;">
									<!-- Mis Pacientes -->
										<table class="table  textCenter bg-white miScroll" style="margin-top: 2%; width:100%;">
											<thead style="width:100%; background:#5d97e2;">
											  <tr>
												<th scope="col"></th>
											    <th scope="col">Tipo Analisis</th>
											    <th scope="col">Publicado</th>
											    <th scope="col">Caduca</th>
											    <th scope="col">Analisis</th>
											  </tr>
											</thead>
										
										
											<tbody>
												  <tr class="aHover1" >
													<th scope="row">h</th>
													<td>ii</td>
													<td>fgh</td>
													<td>dfgh</td>
													<td><a class="link" href="#" >Ver.pdf</a></td>
												  </tr>
											</tbody>
										 </table>
											<!--Termina Mis Pacientes -->
											
											
											
											
								
											<div class="m-t-20 p-l-15">
												<div class="aHover"><a data-toggle="modal" data-target="#newPaciente">
													<i style="font-size: 28px;" class="fo fa-user-plus text-primary">
														<label style="width: 94px; padding-top: 5px; padding-bottom:5px; font-size: 12px; background: rgba(0,0,0,0.8);" 
														class="rounded row-icon icon1 text-white">Nuevo Paciente</label>
													</i></a><br>
												</div>
												
												<div class="aHover m-t-9">
													<a href="#">
														<i style="font-size: 28px;" class="fo fa-edit text-secondary">
															<label style="width: 40px; padding-top: 5px; padding-bottom:5px; font-size: 12px; background: rgba(0,0,0,0.8);" 
															class="rounded row-icon icon1 text-white">Editar</label>
														</i>
													</a><br>
												</div>
												
												<div class="aHover m-t-8">
													<a href="#">
														<i style="font-size: 28px;" class="fo fa-trash text-danger">
															<label style="width: 52px; padding-top: 5px; padding-bottom:5px; font-size: 12px; background: rgba(0,0,0,0.8);" 
															class="rounded row-icon icon1 text-white">Eliminar</label>
														</i>
													</a><br>
												</div>
											</div>
								
										</div>
						  
						  
						  
						   </div>
					</div>
				  </div>';
		  
			
			
		  }
		  else 
		  {
			  $out = '<div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header bg-dark">
						<h5 class="modal-title text-white" id="listaAnalisisTitle">Lista de Analisis</h5>
						<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
						  <div class="modal-body" id="mod">
						  
								nel
						  </div>
						   
						  <div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-primary">Guardar</button>
						  </div>
					</div>
				  </div>';
		  }
		  
		  echo $out;
 ?>