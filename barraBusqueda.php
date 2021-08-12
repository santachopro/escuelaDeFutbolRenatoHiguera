 <?php
 
 if($_SESSION['rolUsuario']=='administrador'):
    echo"
<div class='container'>
			<form action='buscarCedula.php' method='Post' class='d-flex'>
			<input class='form-control me-2' name='txtCedula' type='search' placeholder='Busque la cédula para (Borrar ó Actualizar):' aria-label='Buscar'>
			<button class='btn btn-outline-primary' type='submit'>Buscar</button>
		  </form>
		  </div>"
        elseif($_SESSION['rolUsuario']=='entrenador'):
            exit;				
        elseif($_SESSION['rolUsuario']=='jugador'):
            exit;                
        endif; 			
              exit;
        
?>