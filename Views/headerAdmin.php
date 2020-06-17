<?php namespace Views;?>
  
  <!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
    <a class="navbar-brand" href="<?= FRONT_ROOT ?>home/indexAdmin">Menu Admin</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?= FRONT_ROOT ?>funciones/readAllFuncion">Administrar Funciones</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= FRONT_ROOT ?>cine/readAllCine">Administrar Cines</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= FRONT_ROOT ?>pelicula/readAllPelicula">Administrar Peliculas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= FRONT_ROOT ?>user/readAllUser">Administrar Usuarios</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="<?= FRONT_ROOT ?>user/logout">Cerrar Sesion</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>