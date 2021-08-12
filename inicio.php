<?php include "head.html"?> 
<body>
	<div class="container">
	<title>Escuela De Futbol Renato Higuera</title>
	<?php 
		session_start();
		if(isset($_SESSION['usuario']))://¿Entro un usuario?
            //Si, entro algún usuario
            echo "
            <nav class='navbar navbar-expand-lg navbar-light bg-light'>
                <div class='container-fluid'>
                    <a class='navbar-brand' href='inicio.php'><i class='bi bi-life-preserver'></i>
$_SESSION[usuario]</a>
                    <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                        <span class='navbar-toggler-icon'></span>
                    </button>
                    <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                        <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
            
            ";   
			      
            if($_SESSION['rolUsuario']=='administrador'):
                $datosMenu = array(
					'Gestionar entrenamientos' => 'gestionarEntrenamientos',
					'ver jugadores' => 'gestionarJugadores',
					'ver entrenadores' => 'gestionarEntrenadores',
					'Gestionar Resultados' => 'gestionarResultados'
				);
            elseif($_SESSION['rolUsuario']=='entrenador'):
                $datosMenu = array(
					'Ver entrenamientos' => 'verEntrenamientos',
					'subir evidencia' => 'evidenciaEntrenamiento',					
					'Ver jugadores' => 'gestionarJugadores',					
				);				
            elseif($_SESSION['rolUsuario']=='jugador'):
			  $datosMenu = array(
					'ver entrenamientos' => 'verEntrenamientos',
					'ver jugadores' => 'gestionarJugadores',
					'Ver resultados' => 'resultadosEntrenamientos'
				);                
            endif; 			
			foreach ($datosMenu as $menu => $pagina):
				echo"            
                    <li class='nav-item'>
                        <a class='nav-link active' aria-current='page' href='$pagina.php'>$menu</a>
                    </li>";
			endforeach;			
            
	?>
			</ul>
			<ul class='navbar-nav me-auto mb-2 mb-lg-0 text-end'>
				<li class="nav-item">
				  <a class="nav-link" href="cerrarSesion.php"><i class='bi bi-power'></i>Cerrar sesión</a>
				</li>				
			  </ul>			  
			</div>
		  </div>
	    </div>
		</nav>


		
<?php 
	else:
		echo "
		<div class='alert alert-danger' role='alert' style='margin-top:55px;'>
            Acceso denegado. 
			Debe <a href='login.php'>iniciar sesión</a>
        </div>";        
		exit;//evitar que se muestre el resto de página
    endif;
	
?>	