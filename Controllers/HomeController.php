<?php
    namespace Controllers;

    use Controllers\UserController as C_User;
    use Controllers\GeneroController as C_Genero;
    use Controllers\PeliculaController as C_Pelicula;
    use Controllers\FuncionesController as C_Funcion;
    use Controllers\SalaController as C_Sala;
    use Controllers\CineController as C_Cine;
    use Models\User as M_User;
    use Models\Genero as M_Genero;
    use Models\Pelicula as M_Pelicula;
    use Models\Funcion as M_Funcion;
    use Models\Cine as M_Cine;   
    use Models\Sala as M_Sala;  


    class HomeController
    {      

        private $userController;
        private $generoController;
        private $peliculaController;
        private $cineController;
        private $funcionesController;
        private $salaController;

        public function __construct()
        {

        }
        public function Index()
        {
    
            $this->userController = new C_User;
            $user = $this->userController->checkSession();

            $this->peliculaController = new C_Pelicula;
            $peliculaList = $this->peliculaController->readAll();
            
            require(ROOT.VIEWS_PATH.'home.php');
        }
        public function indexLogin()
        {
            $this->userController = new C_User;
            if($user = $this->userController->checkSession() == false)
            {
                require(ROOT.VIEWS_PATH. 'home.php');
                echo '<script>alert("Aún no has iniciado sesion");</script>';
            }
            else
            {
                require(ROOT.VIEWS_PATH.'homeLogin.php');
            }

            
        }
        public function indexAdmin()
        {
            $this->userController = new C_User;
            $user = $this->userController->checkSession();
            if ($user && $user->getRole()== "admin"){
                require(ROOT.VIEWS_PATH. 'homeAdmin.php');
            } else {
                require(ROOT.VIEWS_PATH. 'home.php');
                 echo '<script>alert("Solo el Administrador entra acá");</script>';
               }
           
        }
        public function viewCarteleraViews()
        {
            require(ROOT.VIEWS_PATH.'carteleraViews.php');
        }
        public function viewLogin()
        {
            $this->userController = new C_User;
            $user = $this->userController->checkSession();

            require(ROOT.VIEWS_PATH.'login.php');
        }
        public function viewCinesViews()
        {
            require(ROOT.VIEWS_PATH.'cinesViews.php');
        }
        public function viewComprasViews()
        {
            require(ROOT.VIEWS_PATH.'comprasViews.php');
        }
        public function viewCinesViewsAdmin()
        {
            require(ROOT.VIEWS_PATH.'cinesViewsAdmin.php');
        }
        public function viewAdministrarFunciones()
        {
            /*$funcionlist = true;
            $this->funcionesController = new C_Funcion;
            $funcionlist = $this->funcionesController->readAll();*/
            require(ROOT.VIEWS_PATH.'administrarFuncionesViews.php');
        }
        public function viewAdministrarCines()
        {
            require(ROOT.VIEWS_PATH.'administrarCinesViews.php');
        }
        public function viewAdministrarUsuarios()
        {
            require(ROOT.VIEWS_PATH.'administrarUsuariosViews.php');
        }
        public function viewAdministrarPeliculas()
        {
            require(ROOT.VIEWS_PATH.'administrarPeliculasViews.php');
        }
        public function viewCarteleraLogin()
        {
            require(ROOT.VIEWS_PATH.'carteleraLogin.php');
        }
        public function viewBuscarG()
        {
            $this->generoController = new C_Genero();
            $listGenero = $this->generoController->readAll();

            $peliculaList = true; // para las comprobaciones en vista
            if (isset($_GET["pelicula"]))
            {

              $pelicula = $_GET["pelicula"];

              $this->peliculaController = new C_Pelicula;
              $peliculaList = $this->peliculaController->readByGenero($genero);

              $selectedGenero = $this->generoController->readById($genero);
            }

            require(ROOT.VIEWS_PATH.'buscarGLogin.php');
        }
        
        public function viewBuscarF()
        {
            $this->funcionesController = new C_Funcion();
            $listFuncion = $this->funcionesController->readAll();

            require(ROOT.VIEWS_PATH.'buscarFLogin.php');
        }

        public function viewCinesLogin()
        {
            /*$this->generoController = new C_Genero();
            $listGenero = $this->generoController->readAll();
    
            $peliculalist = true; // para las comprobaciones en vista
            if (isset($_GET["genero"])){
    
            $genero = $_GET["genero"];
    
            $this->peliculaController = new C_Pelicula;
            $peliculalist = $this->peliculaController->readByGenero($genero);
            }*/
    
            require(ROOT.VIEWS_PATH.'cinesLogin.php');
        }
        
    }
?>