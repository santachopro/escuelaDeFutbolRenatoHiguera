<?php

//si no estan vacios...
if(!empty($_POST['txtcedula']) && !empty($_POST['txtnombre']) && !empty($_POST['txtapellido']) && !empty($_POST['txtpassword']) && !empty($_POST['txtEmail'])):{

 require "DB.php";
$sql="INSERT INTO usuarios(nombre,apellido,cedula,fechaNacimiento,tipoUsuario,email,password)
 values 
         ($_POST[txtnombre],
          $_POST[txtapellido],
          $_POST[txtcedula],
          $_POST[txtfechaNacimiento],
          $_POST[txtRol]),
          $_POST[txtEmail], 
          $_POST[txtpassword])";
}else:{
    header('Location: login.php');
}


echo'
 <h1 style="margin-top: 20px;">Formulario de registro de usuarios</h1>

 <form action="nuevoUsuario.php" method="POST">

     <div class="mb-3">
       <label for="txtcedula" class="form-label">Cedula:</label>
       <input type="text" name="txtcedula" class="form-control" id="txtcedula" required>
     </div>
     <div class="mb-3">
         <label for="txtnombre" class="form-label">Nombre:</label>
         <input type="text" name="txtnombre" class="form-control" id="txtnombre" required>
       </div>
       <div class="mb-3">
         <label for="txtapellido" class="form-label">Apellido:</label>
         <input type="text" name="txtapellido" class="form-control" id="txtapellido" required>
       </div>
       <div class="mb-3">
         <label for="txtEmail" class="form-label">email:</label>
         <input type="email" name="txtEmail" class="form-control" id="txtEmail" required>
       </div>
       <div class="mb-3">
         <label for="txtfechaNacimiento" class="form-label">fecha Nacimiento:</label>
         <input type="date" name="txtfechaNacimiento" class="form-control" id="txtfechaNacimiento" required>
       </div>
       <div class="mb-3">
         <label for="txtpassword" class="form-label">Contraseña</label>
         <input type="password" name="txtpassword" class="form-control" id="txtpassword" required>
       </div>
       <div class="mb-3">
         <label for="txtrol" class="form-label">Tipo de Usuario</label>
         <select name="txtRol" required>
             <!-- Traer todos los roles-->'
           ?>

           <?php
             require_once "DB.php";
             $sql="SELECT * FROM tipoUsuario";
             $datos = $conexion ->query($sql);
             while($fila = $datos->fetch_array()):
                 echo '
                     <option value="$fila[idTipoUsuario]">$fila[descripcion]</option>
                 ';
             endwhile;
           ?>
            
         </select>
       </div>

     <button type="submit" class="btn btn-primary">Enviar datos</button>
   </form>
<?php
    //  include "piePagina.php"  NO SE QUE ERROR ES ESE...YA MAÑANA LE SIGO,QUE TENGO QUE SALIR!
?>