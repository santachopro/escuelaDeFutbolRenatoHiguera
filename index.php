<?php include "head.html";?>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Escuela De Futbol Renato Higuera</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="contactenos.php">Contactanos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">iniciar sesión</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="signup.php">registrarme</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"> ¡Sin lucha no hay progreso!</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- carrusel --> 
<div class="container">
    <div class="row">
      <div class="col-sm-12">

      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img\escuelafut1.png" class="d-block w-100" alt="...">
  
    </div>
    <div class="carousel-item">
      <img src="img\estrategia.png" class="d-block w-100" alt="...">
   
    </div>
    <div class="carousel-item">
      <img src="img\carrusel3.png" class="d-block w-100" alt="...">
  
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">anterior</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">siguiente</span>
  </button>
</div>
      </div>
    </div>
 </div>
<?php
include "piePagina.php";



