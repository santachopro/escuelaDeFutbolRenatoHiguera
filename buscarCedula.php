<?php 

	include "inicio.php";

?>

	<h1 class="text-center">Lista de resultados</h1>
	
	<!-- Tarea
	
	1. establecer la conexion a la base de datos
	-->
	
	<?php
	require_once "DB.php";
	
	
	
	/*
	2. Formar una consulta sql con un where que recibe el parámetro del formulario de búsqueda
	*/
	
	$sql = "select cedula,nombre,apellido,fechaNacimiento,descripcion
                from usuarios as u        
                join tipoUsuarios as tp 
                on u.tipoUsuario=tp.idTipoUsuario          
                 where u.cedula = $_REQUEST[txtCedula]";
	
	/*3. Ejecutar la consulta, mostrar los resultados*/
	
	$datos = $conexion->query($sql)or die("Error en el sistema...");
		
	if($fila =$datos->fetch_array()){
		echo "
        <div class='container'>
            <form action='buscarCedula.php' method='Post' class='d-flex'>
                 <input class='form-control me-2' name='txtCedula' type='search' placeholder='Busque la cédula para (Borrar ó Actualizar):' aria-label='Buscar'>
                 <button class='btn btn-outline-primary' type='submit'>Buscar</button>
            </form>
      </div>

		<table class='table table-dark table-hover' style='margin-top:35px'>
        <tr>
           <th>Cedula</th>
           <th>Nombre</th>
           <th>Apellidos</th>
           <th>Fecha de nacimiento</th>
           <th>Tipo De Usuario</th>
       </tr>	
       <tr> 
         <td>$fila[cedula]</td>
         <td>$fila[nombre]</td>
         <td>$fila[apellido]</td>
         <td>$fila[fechaNacimiento]</td>
         <td>$fila[descripcion]</td>						
       
        </tr>
		</table>	
			<button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#VentanaEliminar'>Eliminar</button>
			<button type='button' class='btn btn-info' data-bs-toggle='modal' data-bs-target='#VentanaEditar'>Actualizar</button>
		
			"
			;			
		
	}else{/*4. Si no reciben resultados, mostrar una alerta*/
		echo "
			<div class='alert alert-warning' role='alert'>
				No se encuentran datos de la cédula: $_REQUEST[txtCedula]
			</div>
		";		
	}	
	
	include "piePagina.php";
?>



<!-- Modal de eliminar-->
<div class="modal fade" id="VentanaEliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Borrar estudiante</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Esta seguro que desea borrar al estudiante con cédula <?="$_REQUEST[txtCedula]"?>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <form action="eliminarUsuarios.php" method="post">
			<input type ="hidden" name="txtCedulaBorrar" value =<?="$_REQUEST[txtCedula]"?>>
			<button type="submit" class="btn btn-primary">Si</button>
		</form>
      </div>
    </div>
  </div>
</div>

<!-- Modal de actualizar...-->
<div class="modal fade" id="VentanaEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  <form action="actualizarUsuarios.php" method="post">
	  <div class="mb-3">
              <label for="txtcedulaNueva" class="form-label">Cedula</label>			  
              <input type="text" name="txtcedulaNueva" value ="<?="$fila[cedula]"?>" class="form-control" id="txtcedula" required>
            </div>
            <div class="mb-3">
                <label for="txtnombre" class="form-label">Nombre</label>
                <input type="text" name="txtnombre" value ="<?="$fila[nombre]"?>" class="form-control" id="txtnombre" required>
              </div>
              <div class="mb-3">
                <label for="txtapellido" class="form-label">Apellidos</label>
                <input type="text" name="txtapellido" value ="<?="$fila[apellido]"?>" class="form-control" id="txtapellido" required>
              </div>
              <div class="mb-3">
                <label for="txtfecha" class="form-label">Fecha de nacimiento</label>
                <input type="date" name="txtfecha" value ="<?="$fila[fechaNacimiento]"?>" class="form-control" id="txtfecha" required>
              </div>
              <br/>
       <div class="mb-3">
         <label for="txtrol" class="form-label">Tipo de Usuario:</label>
         <select name="txtRol" required>
             <?=$sql= "SELECT * FROM tipoUsuarios";
             $datos = $conexion ->query($sql);
             while($fila = $datos->fetch_array()):
                 echo "
                     <option value='$fila[idTipoUsuario]'>$fila[descripcion]</option>
                 ";
             endwhile;
             ?>

      </div>
      <div class="modal-footer">
        	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
			<input type ="hidden" name="txtCedulaAnterior" value =<?="$_REQUEST[txtCedula]"?>>
			<button type="submit" class="btn btn-primary">Actualizar</button>
		</form>
      </div>
    </div>
  </div>
</div>