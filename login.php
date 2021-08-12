<?php
//adaptar el login al sistema...
$mensaje = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
require_once "DB.php";	    
$contraEncriptada = md5($_REQUEST['txtPassword']);
$sql = "select cedula,nombre,password,descripcion
            from usuarios as u        
        join tipoUsuarios as tp 
            on u.tipoUsuario=tp.idTipoUsuario          
        where u.cedula = ? 
        and u.password = ?
        ";		
//evitar inyección SQL
//echo $sql;
$datos = $conexion->prepare($sql);
//var_dump($datos);
//https://www.php.net/manual/es/mysqli-stmt.bind-param.php
$datos->bind_param('ss',$_REQUEST['txtCedula'],$contraEncriptada);
//Ya no se ejecuta directamente la consulta
//$datos = $myDB->query($sql) or die("Error en el sistema...");
$datos->execute();
$datos = $datos->get_result();
if($fila =$datos->fetch_assoc()){
    //acceder al archivo de sesion del servidor
    session_start();
    $_SESSION['usuario'] = $fila['nombre'];
    $_SESSION['rolUsuario'] = $fila['descripcion'];
    //redirreción - cargar otra página
    header('Location: inicio.php');
}else{
    $mensaje = "
    <div class='alert alert-danger' role='alert'>
        Datos incorrectos
    </div>
    ";
}
}

include "head.html";
?>




<body>
  <?php require 'partials/header.php' ?>

  <?php if(!empty($mensaje)): ?>
    <p> <?= $mensaje ?></p>
  <?php endif; ?>

  <h1>Login</h1>
  <span>or <a href="signup.php">Registrarse</a></span>

  <form action="login.php" method="POST">
    <input name="txtCedula" type="text" placeholder="ingrese su cédula">
    <input name="txtPassword" type="password" placeholder="ingrese su  Password">
    <input type="submit" value="Submit">
  </form>
<?php include "piePagina.php";