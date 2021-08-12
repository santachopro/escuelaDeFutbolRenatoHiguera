<?php
include "DB.php";
include "inicio.php";

    $datos = $conexion->query("select cedula,nombre,apellido,fechaNacimiento,descripcion
                                from usuarios as u        
                                join tipoUsuarios as tp 
                                on u.tipoUsuario=tp.idTipoUsuario 
                                where u.tipoUsuario = 2 ");
								
								
				echo " 
					<div class='container'>
							<form action='buscarCedula.php' method='Post' class='d-flex'>
								<input class='form-control me-2' name='txtCedula' type='search' placeholder='Busque la cédula para (Borrar ó Actualizar):' aria-label='Buscar'>
								<button class='btn btn-outline-primary' type='submit'>Buscar</button>
							 </form>
				   
			
			<table class='table table-dark table-hover' style='margin-top:35px'>
				<tr>
					<th>Cedula</th>
					<th>Nombre</th>
					<th>Apellidos</th>
					<th>Fecha de nacimiento</th>
					<th>Tipo De Usuario</th>
				</tr>
			"
			;
			
			while($fila = $datos->fetch_array()){
				echo "
					<tr> 
						<td>$fila[cedula]</td>
						<td>$fila[nombre]</td>
						<td>$fila[apellido]</td>
                        <td>$fila[fechaNacimiento]</td>
						<td>$fila[descripcion]</td>						
						
					</tr>	
						";				
			}
			
			echo "</table>
			        </div>";








            include "piePagina.php";


?>