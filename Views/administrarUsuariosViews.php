<?php namespace Views; ?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Usuarios</title>

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

      use DAO\UserDao as D_User;
      use Models\User as User;

      $dao = new D_User();
      $userList = $dao->readAll();
    ?>
    

    <main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de Usuarios</h2>

               <table class="table bg-light">
                    <thead class="bg-dark text-white">
                         <th>Nombre</th>
                         <th>Apellido</th>
                         <th>Dni</th>
                         <th>Email</th>
                         <th>Contraseña</th>
                         <th>Role</th>
                         <th></th>
                    </thead>
                    <tbody>
                         <?php
                              foreach($userList as $user)
                              {
                                   ?>
                                        <tr>
                                             <td><?php echo $user->getNombre() ?></td>
                                             <td><?php echo $user->getApellido() ?></td>
                                             <td><?php echo $user->getDni() ?></td>
                                             <td><?php echo $user->getEmail() ?></td>
                                             <td><?php echo $user->getPass() ?></td>
                                             <td><?php echo $user->getRole() ?></td>
                                             
                                             <td><form action="<?= FRONT_ROOT ?>user/delete" method="POST">
                                                  <input type="hidden" name='id' value="<?= $user->getId(); ?>">
                                                  <button type="submit" class="btn btn-danger" > Eliminar</button>
                                             </form>
                                             
                                             </td>
                                        
                                        </tr>
                                   </tbody>
                                        </tr>
                                   <?php
                              }
                         ?>                         
                    </tbody>
                          
               </table>
          </div>
     </section>
     <script src="<?=JS_PATH?>/main.js"></script>
     <script type="text/javascript">
     function deleteMe($id){
          var answer = confirm("Seguro quieres eliminar este Usuario?");
          if(answer == true){
               window.location.href='delete?id='+$id;
          }
     )

     }
     </script>
</main>
<?php include("footer.php"); ?> 
</body>