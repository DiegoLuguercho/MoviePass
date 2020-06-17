<?php namespace Views; ?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Funciones</title>

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
               <h2 class="mb-4">Listado de Funciones</h2>

               <table class="table bg-light">
                    <thead class="bg-dark text-white">
                         <th>ID</th>
                         <th>Dia</th>
                         <th>Hora</th>
                         <th>Lenguaje</th>
                         <th>Pelicula</th>
                         <th>Cine</th>
                         <th>Sala</th>
                         <th>Precio</th>
                         <th></th>
                         <th></th>
                         <th></th>
                    </thead>
                   
                         <?php
                              foreach($funcionList as $funcion)
                              {
                                   ?>
                                   <tbody>
                                        <tr>
                                             <form action="<?= FRONT_ROOT ?>funciones/updateFuncion" method="POST">
                                             <td><input type="hidden" name="id" value="<?= $funcion->getId(); ?>"><?= $funcion->getId(); ?></td>
                                             <td><input style="date" autocomplete="off" type="date" name="dia" value="<?= $funcion->getDia() ?>"></td>
                                             <td><input style="time" autocomplete="off" type="time" name="hora" value="<?= $funcion->getHora() ?>"></td>
                                             <td><input style="text" autocomplete="off" type="text" name="lenguaje" value="<?=$funcion->getLenguaje() ?>"></td>
                                             <td><select class="form-control" name="id_pelicula" required>
                                             <option value="<?= $funcion->getPelicula()->getId(); ?>"><?= $funcion->getPelicula()->getTitulo(); ?></option>
                                                     <?php if(isset($peliculaList)){ 
                                                        foreach ($peliculaList as $key => $value) { 
                                                          ?>
       
                                                          <option value="<?= $value->getId(); ?>"><?= $value->getTitulo(); ?></option> 
                                                          <?php }
                                                          }else{ ?>
                                                          <option >NO HAY PELICULAS</option>
                                                          <?php } ?></td>
                                                  </select>
                                                  <td><select class="form-control" name="id_cine" required>
                                             <option value="<?= $funcion->getCine()->getId(); ?>"><?= $funcion->getCine()->getNombre(); ?></option>
                                                     <?php if(isset($cineList)){ 
                                                        foreach ($cineList as $key => $value) { 
                                                          ?>
       
                                                          <option value="<?= $value->getId(); ?>"><?= $value->getNombre(); ?></option> 
                                                          <?php }
                                                          }else{ ?>
                                                          <option >NO HAY CINES</option>
                                                          <?php } ?></td>
                                                  </select>
                                                  <td><select class="form-control" name="id_sala" required>
                                             <option value="<?= $funcion->getSala()->getId(); ?>"><?= $funcion->getSala()->getNombre(); ?></option>
                                                     <?php if(isset($salaList)){ 
                                                        foreach ($salaList as $key => $value) { 
                                                          ?>
       
                                                          <option value="<?= $value->getId(); ?>"><?= $value->getNombre(); ?></option> 
                                                          <?php }
                                                          }else{ ?>
                                                          <option >NO HAY SALAS</option>
                                                          <?php } ?></td>
                                                  </select> 
                                             <td><input style="number" autocomplete="off" type="number" name="precio" value="<?=$funcion->getPrecio() ?>"></td>
                                             <td>   
                                                  <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#openModal"> Modificar</button>
                                                  
                                             </td>
                                             </form>
                                             <td><form action="<?= FRONT_ROOT ?>funciones/delete" method="POST">
                                             <input type="hidden" name='id' value="<?= $funcion->getId() ?>">
                                             <button type="submit" class="btn btn-danger" > Eliminar</button>
                                             
                                             </td>
                                        
                                        </tr>
                                   </tbody>

                                   <?php
                              }
                         ?>                         
                    

                    

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#openModal"> Cargar nueva Funcion</button>
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
                          <form action="<?= FRONT_ROOT ?>funciones/create" method="POST">
                          <div class="form-group">
                                  <label for="nombre">Dia</label>
                                  <input type="date" class="form-control" id="date" placeholder="Dia" name="dia" required>
                         </div>
                         <div class="form-group">
                                  <label for="cantidadSalas">Hora</label>
                                  <input type="time" class="form-control" id="time" placeholder="Hora" name="hora" required>
                         </div>
                         <div class="form-group">
                                  <label for="nombre">Lenguaje</label>
                                  <input type="text" class="form-control" id="lenguaje" placeholder="Lenguaje" name="lenguaje" required>
                         </div>
                         <div class="form-group">
                                  <label for="nombre">Pelicula</label>
                                  <select class="form-control" name="id_pelicula" required>
                                  <?php if(isset($peliculaList)){ 
                                     foreach ($peliculaList as $key => $value) { 
                                   ?>
       
                                   <option value="<?= $value->getId(); ?>"><?= $value->getTitulo(); ?></option> 
                                  <?php }
                                       }else{ ?>
                                 <option >NO HAY PELICULAS</option>
                                  <?php } ?>
                                 </select>
                         </div>
                         <div class="form-group">
                                  <label for="nombre">Cine</label>
                                  <select class="form-control" name="id_cine" required>
                                  <?php if(isset($cineList)){ 
                                     foreach ($cineList as $key => $value) { 
                                   ?>
       
                                   <option value="<?= $value->getId(); ?>"><?= $value->getNombre(); ?></option> 
                                  <?php }
                                       }else{ ?>
                                 <option >NO HAY CINES</option>
                                  <?php } ?>
                                 </select>
                         </div>
                         <div class="form-group">
                                  <label for="nombre">Sala</label>
                                  <select class="form-control" name="id_sala" required>
                                  <?php if(isset($salaList)){ 
                                     foreach ($salaList as $key => $value) { 
                                   ?>
       
                                   <option value="<?= $value->getId(); ?>"><?= $value->getNombre(); ?></option> 
                                  <?php }
                                       }else{ ?>
                                 <option >NO HAY SALAS</option>
                                  <?php } ?>
                                 </select>
                         </div>
                         <div class="form-group">
                                  <label for="nombre">Precio</label>
                                  <input type="number" class="form-control" id="precio" placeholder="precio" name="precio" required>
                         </div>
                         
                              <button type="submit" class="btn btn-primary">Cargar Funcion</button>
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
          var answer = confirm("Seguro quieres eliminar esta pelicula?");
          if(answer == true){
               window.location.href='delete?id='+id;
          }
     )

     }
     </script> 

</main>
<?php include("footer.php"); ?> 
</body>