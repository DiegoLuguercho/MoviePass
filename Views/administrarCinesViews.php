<?php namespace Views; ?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Cines</title>

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
               <h2 class="mb-4">Listado de Cines</h2>

               <table class="table bg-light">
                    <thead class="bg-dark text-white">
                         <th>ID</th>
                         <th>Nombre</th>
                         <th>Cantidad de Salas</th>
                         <th>Direccion</th>
                         <th></th>
                         <th></th>
                    </thead>
                    <?php
                              foreach($cineList as $cine)
                              {
                                   ?>
                                   <tbody>
                                        <tr>
                                             <form action="<?= FRONT_ROOT ?>cine/updateCine" method="POST">
                                             <td> <input type="hidden" name="id" value="<?= $cine->getId(); ?>"><?= $cine->getId(); ?></td>
                                             <td><input style="text" autocomplete="off" type="text" name="nombre" value="<?= $cine->getNombre() ?>"></td>
                                             <td><input style="number" autocomplete="off" type="number" name="cantidadSalas" value="<?= $cine->getCantidadSalas() ?>"></td>
                                             <td><input style="text" autocomplete="off" type="text" name="Direccion" value="<?=$cine->getDireccion() ?>"></td>
                                             <td>   
                                                  <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#openModal"> Modificar</button>
                                                  
                                             </td>
                                             </form>
                                                  <td><form action="<?= FRONT_ROOT ?>cine/delete" method="POST">
                                                  <input type="hidden" name='id' value="<?= $cine->getId(); ?>">
                                                  <button type="submit" class="btn btn-danger" > Eliminar</button>
                                             </form>
                                             
                                             </td>
                                        
                                        </tr>
                                   </tbody>
                                   <?php
                              }
                         ?>                         
                    </tbody>

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#openModal"> Cargar nuevo Cine</button>
                    </form>
                    <head></head>  
                    <div class="modal fade" id="openModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Cargando Cine</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <form action="<?= FRONT_ROOT ?>cine/create" method="POST">
                          <div class="form-group">
                                  <label for="nombre">Nombre</label>
                                  <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre" required>
                         </div>
                         <div class="form-group">
                                  <label for="cantidadSalas">Cantidad de Salas</label>
                                  <input type="number" class="form-control" id="cantidadSalas" placeholder="Cantidad de Salas" name="cantidadSalas" required>
                         </div>
                         <div class="form-group">
                                  <label for="nombre">Direccion</label>
                                  <input type="text" class="form-control" id="direccion" placeholder="Direccion" name="direccion" required>
                         </div>
                              <button type="submit" class="btn btn-primary">Cargar Cine</button>
                    </form>
                    </div>
                    </div>
                   </div>
                  </div>
                 </div>          

               </table>
          </div>
     
          <div>
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de Salas</h2>
               <table class="table bg-light">
                    <thead class="bg-dark text-white">
                         <th>ID</th>
                         <th>Cine al que pertenece</th>
                         <th>Nombre</th>
                         <th>Capacidad</th>
                         <th></th>
                         <th></th>
                    </thead>
                    <?php
                    foreach($salaList as $sala)
                              {
                                   ?>
                                   <tbody>
                                        <tr>
                                   <form action="<?= FRONT_ROOT ?>sala/updateSala" method="POST">
                                   <td><input type="hidden" name="id" value="<?= $sala->getId(); ?>"><?= $sala->getId(); ?></td>
                                   <td><select class="form-control" name="id_cine" required>
                                             <option value="<?= $sala->getCine()->getId(); ?>"><?= $sala->getCine()->getNombre(); ?></option>
                                                     <?php if(isset($cineList)){ 
                                                        foreach ($cineList as $key => $value) { 
                                                          ?>
       
                                                          <option value="<?= $value->getId(); ?>"><?= $value->getNombre(); ?></option> 
                                                          <?php }
                                                          }else{ ?>
                                                          <option >NO HAY CINES</option>
                                                          <?php } ?></td>
                                                  </select>
                                   <td><input style="text" autocomplete="off" type="text" name="nombre" value="<?= $sala->getNombre() ?>"></td>
                                   <td><input style="number" autocomplete="off" type="number" name="capacidad" value="<?= $sala->getCapacidad() ?>"></td>
                                   <td>   
                                        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#openModal"> Modificar</button>               
                                   </td>
                                   </form>
                                   <td><form action="<?= FRONT_ROOT ?>sala/delete" method="POST">
                                   <input type="hidden" name='id' value="<?= $sala->getId(); ?>">
                                   <button type="submit" class="btn btn-danger" > Eliminar</button>
                                   </form>
                                   </td>
                                        
                                        </tr>
                                   </tbody>
                                   <?php

                              }
                              ?>                         
                    </tbody>

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#openModal2"> Agregar nueva Sala</button>
                    </form>
                    <head></head>  
                    <div class="modal fade" id="openModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Cargando Sala</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <form action="<?= FRONT_ROOT ?>sala/create" method="POST">
                    <div class="form-group">
                         <label for="nombre">Cine</label>
                         <select class="form-control" name="id_cine" required>
                         <?php if(isset($cineList))
                               { 
                                   foreach ($cineList as $key => $value) 
                                   { 
                                        ?>      
                                        <option value="<?= $value->getId(); ?>"><?= $value->getNombre(); ?></option> 
                                        <?php 
                                   }
                               }else{ ?>
                                 <option >NO HAY CINES</option>
                                  <?php } ?>
                         </select>
                    </div>
                          <div class="form-group">
                                  <label for="nombre">Nombre</label>
                                  <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre" required>
                         </div>
                         <div class="form-group">
                                  <label for="cantidadSalas">Capacidad</label>
                                  <input type="number" class="form-control" id="cantidadSalas" placeholder="Capacidad" name="capacidad" required>
                         </div>
                              <button type="submit" class="btn btn-primary">Cargar Sala</button>
                    </form>
                    </div>
                    </div>
                   </div>
                  </div>
                 </div>
     </div>
     </table>
     </section>
     <script src="<?=JS_PATH?>/main.js"></script>
     <script type="text/javascript">
     function deleteMe(id){
          var answer = confirm("Seguro que quiere eliminar este cine?");
          if(answer == true){
               window.location.href ='delete?id='+id;
          }
     )

     }
     </script>

</main>
<?php include("footer.php"); ?> 
</body>
                   
