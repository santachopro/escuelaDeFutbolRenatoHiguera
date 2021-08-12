<?php

//si no estan vacios...
//if(!empty($_POST['txtcedula']) && !empty($_POST['txtnombre']) && !empty($_POST['txtapellido']) && !empty($_POST['txtpassword']) && !empty($_POST['txtEmail'])):{
 require 'partials/header.php';
 include "head.html";
echo'

<body>
 <h2 style="margin-top: 20px;">Formulario de registro de usuarios</h2>

 <form action="nuevoUsuario.php" method="POST">
 

     <div class="mb-3">
       <label for="txtcedula" class="form-label">Cedula:</label>
       <input type="text" name="txtcedula" class="form-control" id="txtcedula" placeholder="Cédula:" required>
     </div>

     <div class="mb-3">
         <label for="txtnombre" class="form-label">Nombre:</label>
         <input type="text" name="txtnombre" class="form-control" id="txtnombre" placeholder="Nombre:" required>
       </div>

       <div class="mb-3">
         <label for="txtapellido" class="form-label">Apellidos:</label>
         <input type="text" name="txtapellido" class="form-control" id="txtapellido" placeholder="Apellidos:" required>
       </div>
      
       <div class="mb-3">
         <label for="txtpassword" class="form-label">Contraseña:</label>
         <input type="password" name="txtpassword" class="form-control" id="txtpassword" placeholder="password:" required>
       </div>

       <div class="mb-3">
       <label for="txtfechaNacimiento" class="form-label">fecha Nacimiento:</label>
       <input type="date" name="txtfechaNacimiento" class="form-control" id="txtfechaNacimiento" required>
     </div>

       <div class="mb-3">
         <label for="txtrol" class="form-label">Tipo de Usuario:</label>
         <select name="txtRol" required>'
           ?>
           <?php
           //Traer todos los roles
           //por que no me trae los datos?
            require "DB.PHP";
             $sql= "SELECT * FROM tipoUsuarios where idTipoUsuario>1";
             $datos = $conexion ->query($sql);
             while($fila = $datos->fetch_array()):
                 echo "
                     <option value='$fila[idTipoUsuario]'>$fila[descripcion]</option>
                 ";
             endwhile;
           echo'
            
         </select>        
       </div> 
       <button type="submit"  class="btn btn-primary">Enviar</button>
   </form>'
?>