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
 
 use DAO\entradaDAO as D_Entrada;
 use Models\Entrada as Entrada;

 $dao = new D_Entrada();
 $entradaList = $dao->readAll();
 $pagoTotal=0;
?>
<section class="pricing py-5">
  
  <div class="container">
  <h3 class="mb-4">Entrada/s: </h3>
    <div class="row">
                       <?php
                              foreach($entradaList as $entrada)
                              {
   
                                   ?>
                                   <div class="col-lg-4">
                                   <div class="card mb-5 mb-lg-0">
                                   <div class="card-body">
                                   <h5 class="card-title text-muted text-uppercase text-center"><?php echo $entrada->getFuncion()->getPelicula()->getTitulo(); ?></h5>
                                   <h6 class="card-price text-center">Precio: $<?php echo $entrada->getFuncion()->getPrecio(); ?></h6>
                                   <hr>
                                    <ul class="fa-ul">
                                     <li><span class="fa-li"><i class="fas fa-check"></i></span>Día: <?php echo $entrada->getFuncion()->getDia(); ?></li>
                                     <li><span class="fa-li"><i class="fas fa-check"></i></span>Hora: <?php echo $entrada->getFuncion()->getHora(); ?></li>
                                     <li><span class="fa-li"><i class="fas fa-check"></i></span>Lenguaje: <?php echo $entrada->getFuncion()->getLenguaje(); ?></li>
                                     <li><span class="fa-li"><i class="fas fa-check"></i></span><?php echo $entrada->getFuncion()->getCine()->getNombre(); ?></li>
                                     <li><span class="fa-li"><i class="fas fa-check"></i></span>Sala: <?php echo $entrada->getFuncion()->getSala()->getNombre(); ?></li>
                                    </ul>
                                    </div>
                                    </div>
                                    </div>
                                   <?php
                                   $pagoTotal=$pagoTotal+$entrada->getFuncion()->getPrecio();
                                
                              }
                         ?>  
                                         
     
          </div>  
        </div>
</section>

<div class="container py-5">
  
<h2 class="mb-4">Total a pagar: $<?php echo $pagoTotal; ?> </h2>

  <div class="row">
    <div class="col-lg-7 mx-auto">
      <div class="bg-white rounded-lg shadow-sm p-5">
        <!-- Credit card form tabs -->
        <ul role="tablist" class="nav bg-light nav-pills rounded-pill nav-fill mb-3">
          <li class="nav-item">
            <a data-toggle="pill" href="#nav-tab-card" class="nav-link active rounded-pill">
                                <i class="fa fa-credit-card"></i>
                                Credit Card
            </a>
          </li>
          
        </ul>
        <!-- End -->


        <!-- Credit card form content -->
        <div class="tab-content">

          <!-- credit card info-->
          <div id="nav-tab-card" class="tab-pane fade show active">
            <p class="alert alert-success">Some text success or error</p>
            <form role="form">
              <div class="form-group">
                <label for="username">Nombre Completo (En la Tarjeta)</label>
                <input type="text" name="username" placeholder="Jason Doe" required class="form-control">
              </div>
              <div class="form-group">
                <label for="cardNumber">Numero de Tarjeta</label>
                <div class="input-group">
                  <input type="text" name="cardNumber" placeholder="Your card number" class="form-control" required>
                  <div class="input-group-append">
                    <span class="input-group-text text-muted">
                                                <i class="fa fa-cc-visa mx-1"></i>
                                                <i class="fa fa-cc-amex mx-1"></i>
                                                <i class="fa fa-cc-mastercard mx-1"></i>
                                            </span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-8">
                  <div class="form-group">
                    <label><span class="hidden-xs">Expiration</span></label>
                    <div class="input-group">
                      <input type="number" placeholder="MM" name="" class="form-control" required>
                      <input type="number" placeholder="YY" name="" class="form-control" required>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group mb-4">
                    <label data-toggle="tooltip" title="Three-digits code on the back of your card">CVV
                                                <i class="fa fa-question-circle"></i>
                                            </label>
                    <input type="text" required class="form-control">
                  </div>
                </div>
              </div>
              <button type="button" class="subscribe btn btn-primary btn-block rounded-pill shadow-sm"> Confirm  </button>
            </form>
          </div>
          
        </div>
        <!-- End -->

      </div>
    </div>
  </div>
</div>
</div>
<?php include("footer.php"); ?> 
</body>

</html>