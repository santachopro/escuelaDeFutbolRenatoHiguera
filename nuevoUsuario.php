<?php
   
  //  if($_SESSION['rolusuario']!='administrador' && !isset($_POST['txtcedula'])):
   //     header('Location: inicio.php');
   // else:	
        require "DB.php";
        include "head.html";
//echo $_REQUEST;
//var_dump($_REQUEST);
// $sql = "insert into estudiantes values('$_REQUEST[txtcedula]','$_REQUEST[txtnombre]',
//'$_REQUEST[txtapellido]','$_REQUEST[txtfecha]', '$_REQUEST[txttelefono]')";

       
        $datos = $conexion->prepare("insert into usuarios (tipoUsuario,nombre,apellido,cedula,fechaNacimiento,password) values(?,?,?,?,?,?);");
        $password = md5($_POST['txtpassword']);
        $datos->bind_param('isssss',
                               $_POST["txtRol"],
                               $_POST["txtnombre"],
                               $_POST["txtapellido"],
                               $_POST["txtcedula"],
                               $_POST["txtfechaNacimiento"],
                               $password
                                );          
        
        $datos->execute() or die("<div class='alert alert-danger' role='alert'>
       
        Error interno del sistema: la cédula ya existe...<a href='signup.php'>Volver a Registrarme</a></div>");
        
        echo "
            <div class='alert alert-success' role='alert'>
                Registro exitoso
                <a href='login.php'>iniciar sesión</a>
            </div>";
   // endif;
                              
?>