<?php
  require "DB.php";
  include "head.html";

  $datos = $conexion->prepare( "delete from usuarios where cedula = $_REQUEST[txtCedulaBorrar]");

 $datos->execute() or die("<div class='alert alert-danger' role='alert'>
       
Error interno del sistema...<a href='inicio.php'>Volver</a></div>");

echo "
    <div class='alert alert-success' role='alert'>
        borrado exitosamente
        <a href='inicio.php'>volver</a>
    </div>";


?>