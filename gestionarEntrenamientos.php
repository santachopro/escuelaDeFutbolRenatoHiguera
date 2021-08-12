<?php
include "DB.php";
include "inicio.php";

    $datos = $conexion->query("select idEntrenamiento,nombre,cedula,idCancha,fechaEntrenamiento,archivoAdjunto
                                from entrenamientos as e        
                                join usuarios as u
                                on e.cedula=u.cedula");
								
						
				   
			echo"
			<table class='table table-dark table-hover' style='margin-top:35px'>
				<tr>
					<th>Nombre Entrenamiento</th>
					<th>Nombre Entrenador</th>
					<th>cancha</th>
					<th>Fecha de entrenamiento</th>
					<th>Tipo De entrenamiento</th>
                    <th>Evidencia</th>
				</tr>
			"
			;
			
			while($fila = $datos->fetch_array()){
				echo "
					<tr> 
						<td>$fila[nombre]</td>
						<td>$fila[cedula]</td>
						<td>$fila[idCancha]</td>
                        <td>$fila[fechaEntrenamiento]</td>
						<td>$fila[archivoAdjunto]</td>						
						
					</tr>	
						";				
			}
			
			echo " </table> 
                  </div>";








            include "piePagina.php";


?>