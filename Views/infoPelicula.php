<?php
namespace Views;
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Peliculas</title>
    
  <!-- Bootstrap core CSS -->
  <link href="<?php echo BASE; ?>Assets/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo BASE; ?>Assets/css/modern-business.css" rel="stylesheet"> 

  <!-- FontAwesome-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
</head>

<body>

    <?php include_once (VIEWS_PATH.'headerLogin.php');
    
    ?>
    

<main class="py-5">
 <div class="container section">
 <?php

     foreach($funcionList as $funcion)
     {
        ?>
                <div class="row">
                 <div class="col-md-6">
                    <h2>
                      <?php echo $funcion->getPelicula()->getTitulo(); ?>
                    </h2>
                    <p>
                    <?php echo $funcion->getPelicula()->getResenia(); ?>
                    </p>
                    <br>
                    <h5>
                    Genero: <?php echo $funcion->getPelicula()->getGenero()->getNombre(); ?>
                    </h5>
                 </div>
                 <div class="col-md-6">
                    <img src="<?php echo FRONT_ROOT.IMG_PELICULA.$funcion->getPelicula()->getImagen(); ?>" width='320' height='450'alt="">
                 </div>
                </div>
                <?php
                break;
            
     
     }
     ?>  
 </div> 

 

<section class="pricing py-5">
  
  <div class="container">
  <h3 class="mb-4">Listado de Funciones</h3>
    <div class="row">
                       <?php
                              foreach($funcionList as $funcion)
                              {
                                   ?>
                                   <div class="col-lg-4">
                                   <div class="card mb-5 mb-lg-0">
                                   <div class="card-body">
                                   <h5 class="card-title text-muted text-uppercase text-center"><?php echo $funcion->getPelicula()->getTitulo(); ?></h5>
                                   <h6 class="card-price text-center">Precio: $<?php echo $funcion->getPrecio(); ?></h6>
                                   <hr>
                                    <ul class="fa-ul">
                                     <li><span class="fa-li"><i class="fas fa-check"></i></span>Día: <?php echo $funcion->getDia(); ?></li>
                                     <li><span class="fa-li"><i class="fas fa-check"></i></span>Hora: <?php echo $funcion->getHora(); ?></li>
                                     <li><span class="fa-li"><i class="fas fa-check"></i></span>Lenguaje: <?php echo $funcion->getLenguaje(); ?></li>
                                     <li><span class="fa-li"><i class="fas fa-check"></i></span><?php echo $funcion->getCine()->getNombre(); ?></li>
                                     <li><span class="fa-li"><i class="fas fa-check"></i></span>Sala: <?php echo $funcion->getSala()->getNombre(); ?></li>
                                    </ul>
                                    <form id="getPelicula" action="<?= FRONT_ROOT ?>funciones/comprarEntrada" method="POST">
                                     <a href="javascript:document.forms.getPelicula.submit()">
                                      <input type="hidden" name="id" value="<?= $funcion->getId(); ?>">
                                      <button class="btn btn-block btn-info text-uppercase">Comprar Entrada/s</button>
                                     </a>
                                    </form>
        
                                    </div>
                                    </div>
                                    </div>
                                   <?php
                              }
                         ?>  
                                         
     
          </div>  
        </div>
     </section>
    
</main>
<?php include("footer.php"); ?> 
</body>


</html>