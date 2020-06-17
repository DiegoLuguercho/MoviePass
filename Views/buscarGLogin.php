<?php namespace Views; ?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Peliculas</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo BASE; ?>Assets/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

  <!-- Custom styles for this template -->
  <link href="<?php echo BASE; ?>Assets/css/modern-business.css" rel="stylesheet"> 

  <!-- FontAwesome-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
</head>

<body>

    <?php
      include_once (VIEWS_PATH.'headerLogin.php');
    ?>

<!-- Page Content -->
<div class="container">

<div class="row">

  <div class="col-lg-3">

    <h2 class="my-4">Peliculas por Genero</h2>
    <hr>
      <form action="<?= FRONT_ROOT ?>pelicula/readByGenero" method="POST">
        <div class="form-group">
          <label for="category">Seleccione Genero</label>
          <select name="category" class="custom-select" required>
              <option>Seleccione un genero</option>
            <?php foreach ($listGenero as $key => $genero) { ?>
                <option value="<?php echo $genero->getId();  ?>"><?php echo $genero->getNombre(); ?></option>
            <?php } ?>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Buscar peliculas por genero</button>
      </form>
    </hr>

  

  </div>
  <!-- /.col-lg-3 -->

</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
     
</main>
<?php include("footer.php"); ?> 
</body>
</html>
