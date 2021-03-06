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

<?php include_once (VIEWS_PATH.'headerLogin.php'); ?>

<main class="py-5">
     <div class="container">
      <div class="row">
               <?php
                              foreach($funcionList as $funcion)
                              {
                                   ?>                                      
                                   <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-0 shadow">
                                       
                                       <form id="getPelicula" action="<?= FRONT_ROOT ?>funciones/readByPelicula" method="POST">
                                        <a href="javascript:document.forms.getPelicula.submit()">
                                        <input type="hidden" name="id" value="<?= $funcion->getPelicula()->getId(); ?>">
                                        <button class="btn ">
                                        <img src="<?php echo FRONT_ROOT.IMG_PELICULA.$funcion->getPelicula()->getImagen(); ?>" class="card-img-top">
                                        <div class="card-body text-center">
                                         <h5 class="card-title mb-0"><?php echo $funcion->getPelicula()->getTitulo();?></h5>
                                        </div> 
                                        </button>
                                        </a>
                                       </form>  
                                    </div> 
                                   </div>      
                                  <?php
                              }
               ?>                         
       </div>
      </div> 
     </main> 
<?php include("footer.php"); ?> 
</body>



</html>