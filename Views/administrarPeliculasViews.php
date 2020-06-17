<?php namespace Views; ?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Peliculas</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo BASE; ?>Assets/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

  <!-- Custom styles for this template -->
  <link href="<?php echo BASE; ?>Assets/css/modern-business.css" rel="stylesheet"> 

  <!-- FontAwesome-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
</head>

<body>

    <?php
      include_once (VIEWS_PATH.'headerAdmin.php');
    ?>
    <main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de Peliculas</h2>

               <table class="table bg-light">
                    <thead class="bg-dark text-white">
                         <th>ID</th>
                         <th>Titulo</th>
                         <th>Duracion</th>
                         <th>Reseña</th>
                         <th>Genero</th>
                         <th>Imagen</th>
                         <th></th>
                         <th></th>
                    </thead>
                   
                         <?php
                              foreach($peliculaList as $pelicula)
                              {
                                   ?>
                                   <tbody>
                                        <tr>
                                             <form action="<?= FRONT_ROOT ?>pelicula/updatePelicula" method="POST">
                                             <td><input type="hidden" name="id" value="<?= $pelicula->getId(); ?>"><?= $pelicula->getId(); ?></td>
                                             <td><input style="text" autocomplete="off" type="text" name="titulo" value="<?= $pelicula->getTitulo() ?>"></td>
                                             <td><input style="text" autocomplete="off" type="text" name="duracion" value="<?= $pelicula->getDuracion() ?>"></td>
                                             <td><input style="msg" autocomplete="off" type="msg" name="resenia" value="<?=$pelicula->getResenia() ?>"></td>
                                             <td><select class="form-control" name="id_genero" required>
                                             <option value="<?= $pelicula->getGenero()->getNombre(); ?>"><?= $pelicula->getGenero()->getNombre(); ?></option>
                                                     <?php if(isset($generoList)){ 
                                                        foreach ($generoList as $key => $value) { 
                                                          ?>
       
                                                          <option value="<?= $value->getId(); ?>"><?= $value->getNombre(); ?></option> 
                                                          <?php }
                                                          }else{ ?>
                                                          <option >NO HAY GENEROS</option>
                                                          <?php } ?></td>
                                                  </select>
                                             <td><img src="<?php echo FRONT_ROOT.IMG_PELICULA.$pelicula->getImagen() ?>" width='65' height='46'>
                                             </td>
                                             <td>   
                                                  <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#openModal"> Modificar</button>
                                                  
                                             </td>
                                             </form>
                                             <td><form action="<?= FRONT_ROOT ?>pelicula/delete" method="POST">
                                                  <input type="hidden" name='id' value="<?= $pelicula->getId(); ?>">
                                                  <button type="submit" class="btn btn-danger" > Eliminar</button>
                                             </form>
                                             
                                             </td>
                                        
                                        </tr>
                                   </tbody>

                                   <?php
                              }
                         ?>                         
                    </tbody>

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#openModal"> Cargar nueva Pelicula</button>
                    </form>
                    <head></head>  
                    <div class="modal fade" id="openModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Cargando Pelicula</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <form action="<?= FRONT_ROOT ?>pelicula/create" method="POST">
                          <div class="form-group">
                                  <label for="nombre">Titulo</label>
                                  <input type="text" class="form-control" id="titulo" placeholder="Titulo" name="titulo" required>
                         </div>
                         <div class="form-group">
                                  <label for="cantidadSalas">Duracion</label>
                                  <input type="text" class="form-control" id="duracion" placeholder="Duracion" name="duracion" required>
                         </div>
                         <div class="form-group">
                                  <label for="nombre">Resenia</label>
                                  <input type="msg" class="form-control" id="resenia" placeholder="Resenia" name="resenia" required>
                         </div>
                         <div class="form-group">
                                  <label for="nombre">Genero</label>
                                  <select class="form-control" name="id_genero" required>
                                  <?php if(isset($generoList)){ 
                                     foreach ($generoList as $key => $value) { 
                                   ?>
       
                                   <option value="<?= $value->getId(); ?>"><?= $value->getNombre(); ?></option> 
                                  <?php }
                                       }else{ ?>
                                 <option >NO HAY GENEROS</option>
                                  <?php } ?>
                                 </select>
                         </div>
                              <button type="submit" class="btn btn-primary">Cargar Pelicula</button>
                    </form>
                    </div>
                    </div>
                   </div>
                  </div>
                 </div>          

               </table>
          </div>
     </section>
     <script src="<?=JS_PATH?>/main.js"></script>
     <script type="text/javascript">
     function deleteMe(id){
          var answer = confirm("Sguero quieres eliminar esta pelicula?");
          if(answer == true){
               window.location.href='delete?id='+id;
          }
     )

     }
     </script>

</main>
<?php include("footer.php"); ?> 
</body>


