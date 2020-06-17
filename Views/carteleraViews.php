<?php
namespace Views;
use Controllers\PeliculaController as C_Pelicula;
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cartelera</title>
    
  <!-- Bootstrap core CSS -->
  <link href="<?php echo BASE; ?>Assets/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo BASE; ?>Assets/css/modern-business.css" rel="stylesheet"> 

  <!-- FontAwesome-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
</head>


<body>

<?php
      include_once (VIEWS_PATH.'header.php');
  
      use DAO\generoDAO as D_Genero;
      use DAO\peliculaDAO as D_Pelicula;
      use Models\Peliculas as Pelicula;
      use Models\Genero as Genero;

      $dao = new D_Pelicula();
      $peliculaList = $dao->readAll();
    ?>
    <div class="row"> 
    <?php
            $i =0;
                              foreach($peliculaList as $pelicula)
                              {
                                   ?>
                                         <div class="col-lg-4 col-sm-6 portfolio-item">
                                         <div class="card h-100">
                                         <a><img class="card-img" width="500" height="650" src="<?php echo FRONT_ROOT.IMG_PELICULA.$pelicula->getImagen();?>" class="card-img-top" alt=""></a>
                                         <h4 class="card-title">
                                         <a ><?php echo $pelicula->getTitulo();?></a>
                                         </h4>
                                         <p class="card-text"><?php echo $pelicula->getResenia();?></p>
                                         </div>
                                         </div>
                                   <?php
                              }
                         ?>                         
     
               </table>
          </div>
     </section>
</main>
<?php include("footer.php"); ?> 
</body>