<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>
    
  <!-- Bootstrap core CSS -->
  <link href="<?php echo BASE; ?>Assets/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo BASE; ?>Assets/css/modern-business.css"" rel="stylesheet"> 

  <!-- FontAwesome-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
</head>


<body>

    <?php
      include_once (VIEWS_PATH.'header.php');
    ?>

<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Login</h5>
            <form class="form-signin" action="<?= FRONT_ROOT  ?>user/login" method='post'>
              <div class="form-label-group">
              <br> 
                <label for="inputEmail">Email</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus>
              </div>
              <br> 
              <div class="form-label-group">
                <label for="inputPassword">Contaseña</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pass"required>
              </div>
              <br> 

              

              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Iniciar Sesion</button>
              <!--<button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Registrarse</button>-->
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-lg btn-outline-info btn-block text-uppercase" data-toggle="modal" data-target="#openModal">
                Registrarse
              </button>
            </form>
            <head></head>  

            <!-- Modal -->
                <div class="modal fade" id="openModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Registrarse</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <form action="<?= FRONT_ROOT ?>user/create" method="POST">
                            <div class="form-group">
                                  <label for="nombre">Nombre</label>
                                  <input type="text" class="form-control" id="name" placeholder="Nombre" name="name" required>
                              </div>
                              <div class="form-group">
                                  <label for="apellido">Apellido</label>
                                  <input type="text" class="form-control" id="apellido" placeholder="Apellido" name="apellido" required>
                              </div>
                              <div class="form-group">
                                  <label for="email">Email</label>
                                  <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                              </div>
                              <div class="form-group">
                                  <label for="dni">DNI</label>
                                  <input type="number" class="form-control" id="dni" placeholder="DNI" name="dni" required>
                              </div>

                              <div class="form-group">
                                  <label for="pass">Contraseña</label>
                                  <input type="password" class="form-control" id="pass" placeholder="Contraseña" name="pass" required>
                              </div>
                              <button type="submit" class="btn btn-primary">Crear usuario</button>
                          </form>
                      </div>
                    </div>
                  </div>
                </div>

                <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign in with Facebook</button>
                
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php include("footer.php"); ?>


  
</body>  
</html>
