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

    <title>Entradas</title>
    
  <!-- Bootstrap core CSS -->
  <link href="<?php echo BASE; ?>Assets/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo BASE; ?>Assets/css/modern-business.css" rel="stylesheet"> 

  <!-- FontAwesome-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
</head>

<body>

<?php include_once (VIEWS_PATH.'headerLogin.php'); 
   

   $contador = 1;
   
 ?>
 <div class="container">
  <h2 class="my-4">Comprando Entradas</h2>
 <section class="pricing py-5">
    <div class="container">
    <h4 class="mb-4">Funcion Seleccionada</h3>
    <div class="row">
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
            
           </div>
          </div>
      </div>
      </div>  
     </div>
     </section>

 <div class="container">
  <div class="row">
  <div class="col-lg-3">
   

    <hr>
      <form id="getFuncion" action="<?= FRONT_ROOT ?>entrada/comprarEntrada" method="POST">
        <div class="form-group">
          <label for="category">Seleccione Cantidad de Entradas</label>
          <select name="category" class="custom-select" required>
              <option>Seleccione un Numero</option>
              <?php        
                      if($funcion->getSala()->getCapacidad()!=0)
                      {
                        while($contador!=7){
                        ?>
                         <option value="<?php echo $contador; ?>"><?php echo $contador; ?></option>
                         <?php 
                         $contador++;
                         }
                      }
                      else
                      { ?> 
                        <option >NO HAY MÁS ENTRADAS</option>
                        <?php 
                      }
             ?>
          </select>
        </div>
        <a href="javascript:document.forms.getFuncion.submit()">
        <input type="hidden" name="id" value="<?= $funcion->getId(); ?>">
        </a>
                                    
        <button type="submit" class="btn btn-primary">Comprar Entrada/s</button>
      </form>
    </hr>

   </div>
  </div>
 </div>
</div>
<br><br>
<?php include("footer.php"); ?> 
</body>

</html>
