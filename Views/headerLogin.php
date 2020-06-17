<?php namespace Views;?>
  
  <!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="<?= FRONT_ROOT ?>home/indexLogin">Movie Pass</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?= FRONT_ROOT ?>home/viewCarteleraLogin">Cartelera</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= FRONT_ROOT ?>home/viewBuscarG">Buscar Pelicula por Genero</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= FRONT_ROOT ?>home/viewBuscarF">Buscar Pelicula por Fecha</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= FRONT_ROOT ?>home/viewCinesLogin">Cines</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= FRONT_ROOT ?>user/logout">Cerrar Sesion</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>