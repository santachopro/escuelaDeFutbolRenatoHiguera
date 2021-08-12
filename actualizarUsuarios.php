<?php

    //1.cargar encabezado

	include "inicio.php";

    //2.conectarse a la base de datos
    require_once "DB.php";
	

    //3.organizar una consulta update, entregar los datos del formulario
    $sql = "update usuarios 
                                set 
                                    cedula = '$_REQUEST[txtcedulaNueva]',
                                    nombre = '$_REQUEST[txtnombre]',
                                    apellido = '$_REQUEST[txtapellido]',
                                    fechaNacimiento = '$_REQUEST[txtfecha]',
                                    tipoUsuario = '$_REQUEST[txtRol]'
            where 
                cedula = '$_REQUEST[txtCedulaAnterior]'";    
    //4.ejecutar consulta
    $conexion->query($sql) or die("Error interno, contacte al administrador");    
    //5.mostrar mensajes de notificación
    echo "
			<div class='alert alert-success' role='alert'>
				usuario actualizado correctamente
			</div>
		";	
    
    include "piePagina.php";

?>