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

    <title>Cines</title>
    
  <!-- Bootstrap core CSS -->
  <link href="<?php echo BASE; ?>Assets/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo BASE; ?>Assets/css/modern-business.css" rel="stylesheet"> 

  <!-- FontAwesome-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
</head>


<body>

    <?php
      include_once (VIEWS_PATH.'headerLogin.php');

     use DAO\cineDAO as D_Cine;
      use Models\Cine as Cine;

      $dao = new D_Cine();
      $cineList = $dao->readAll();
    ?>
    <main class="py-5">
     <section id="listado" class="mb-5">
          
               <h2 class="mb-4">Listado de Cines en Mar del Plata</h2>
               <tbody>
                         <?php
                              foreach($cineList as $cine)
                              {
                                   ?>
                                        <tr>
                                            
                                             <div class="list-group">
                                             <a class="list-group-item list-group-item-action flex-column align-items-start">
                                             <div class="d-flex w-100 justify-content-between">
                                              <h5 class="mb-1"><?php echo $cine->getNombre() ?></h5>
                                             </div>
                                             <p class="mb-1">Direccion: <?php echo $cine->getDireccion() ?></p>
                                             <small>Cantidad de Salas: <?php echo $cine->getCantidadSalas() ?></small>
                                             </a>
                                             <br>
                                             <br>


                                        </tr>
                                   <?php
                              }
                         ?>                         
                    </tbody>
     </section>


  
 
  <?php include("footer.php"); ?>

</body>

</html>