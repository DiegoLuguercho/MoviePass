<?php

namespace Controllers;

use Models\Funcion as Funcion;
use DAO\funcionDAO as Dao;
use Models\Pelicula as Pelicula;
use Models\Cine as Cine;
use Models\Sala as Sala;
use Controllers\HomeController as Home; 
use Controllers\PeliculaController as PeliculaController; 
use Controllers\CineController as CineController; 
use Controllers\SalaController as SalaController; 
/**
 *
 */
class FuncionesController
{
	protected $dao;
	private $homeController;
	private $peliculaController;
    private $cineController;
    private $salaController;

	function __construct()
	{
		$this->dao = Dao::getInstance();
		$this->homeController = new Home;
        $this->peliculaController= new PeliculaController;
        $this->cineController= new CineController;
        $this->salaController= new SalaController;
	}

	public function create($dia, $hora, $lenguaje, $id_pelicula, $id_cine, $id_sala, $precio){

		$id=0;
		$pelicula = $this->peliculaController->readById($id_pelicula);
        $cine = $this->cineController->readById($id_cine);
		$sala = $this->salaController->readById($id_sala);
		
//crea el objeto cine para luego agregarlo a la base de datos
		$funcion = new Funcion($id, $dia, $hora, $lenguaje, $pelicula, $cine, $sala, $precio);

         
		$this->dao->create($funcion);
					//luego de guardarlo en la base de datos se muestra la vista admin de users
		echo "<script> alert('Funcion registrada con exito.');</script>";
            
		
		$this->readAllFuncion();
	}

	public function readAll()
	{
		//guarda todos los cine de la base de datos en la variable list

		$list = $this->dao->readAll();
		if (!is_array($list) && $list != false){ // si no hay nada cargado, readall devuelve false
			$array[] = $list;
			$list = $array; // para que devuelva un arreglo en caso de haber solo 1 objeto // esto para cuando queremos hacer foreach al listar, ya que no se puede hacer foreach sobre un objeto ni sobre un false
		}

		return $list;


	}



	public function readAllFuncion()
	{
		//guarda todos los cine de la base de datos en la variable list

		$funcionList = $this->dao->readAll();

        $peliculaList = $this->peliculaController->readAll();
        $cineList = $this->cineController->readAll();
        $salaList = $this->salaController->readAll();

		require(ROOT.VIEWS_PATH.'administrarFuncionesViews.php');

	}

	public function read($id)
	{
		$funcion = $this->dao->read($id);

		return $funcion;
	}

	public function delete($id)
	{
        //BORRA EL cine QUE COINCIDE CON EL EMAIL RECIBIDO POR PARAMETROS DE LA BASE DE DATOS

		$this->dao->delete($id);

		//INCLUYE LA VISTA PRINCIPAL
		echo "<script> alert('Funcion eliminada con exito.');</script>";

		$this->readAllFuncion();
    }
	
	public function update($id_funcion, $hora)
	{

	}

    public function updateFuncion($id, $dia, $hora, $lenguaje, $id_pelicula, $id_cine, $id_sala, $precio)
    {	
		$pelicula = $this->peliculaController->readById($id_pelicula);
        $cine = $this->cineController->readById($id_cine);
		$sala = $this->salaController->readById($id_sala);

		$updateFuncion = new Funcion($id, $dia, $hora, $lenguaje, $pelicula, $cine, $sala, $precio);

		$this->dao->edit($updateFuncion);
		$this->readAllFuncion();

    }

    public function readById($id)
    {	
         $funcion = $this->dao->readById($id);
         return $funcion;

	}
	public function readByDia($dia)
	{
		$funcionList = $this->dao->readAll();
		
		$funcionList = $this->dao->readByDia($dia);		

		require(ROOT.VIEWS_PATH.'fechaLogin.php');

	}

	public function readByPelicula($id_pelicula)
	{	
        
		$funcionList = $this->dao->readAll();
		$peliculaList = $this->peliculaController->readAll();
		$funcionList = $this->dao->readByPelicula($id_pelicula);

		require(ROOT.VIEWS_PATH.'infoPelicula.php');

	}
	public function comprarEntrada($id_funcion)
	{
		$funcion = $this->dao->read($id_funcion);
		require(ROOT.VIEWS_PATH.'comprandoEntradas.php');

	}
}