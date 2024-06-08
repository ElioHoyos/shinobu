<?php
require_once "controladores/Soporte.controlador.php";
$controlador = new ControladorSoporte();
$cantidadSoportes = $controlador->obtenerCantidadSoportes();
?>
<nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">

  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">

<!-- Aquí está el código del navbar -->
<li class="nav-item">     
    <a class="nav-link" href="soporte">
        <i class="far fa-comments"></i>
        <span class="badge badge-info navbar-badge"><?= $cantidadSoportes ?></span>
    </a>
</li>

     <li class="nav-item">     
      <a class="nav-link" href="uninivel">
        <i class="far fa-bell"></i>
        <span class="badge badge-dark navbar-badge">0</span>
      </a>
    </li>

     <li class="nav-item">
      <a class="nav-link" href="salir">
        <i class="fas fa-sign-out-alt"></i>
      </a>
    </li>

  </ul>

</nav>