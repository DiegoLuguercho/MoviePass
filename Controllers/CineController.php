<?php

namespace Controllers;

use Models\Cine as Cine;
use DAO\cineDAO as Dao;
use DAO\salaDAO as SalaDao;
use DAO\funcionDAO as FuncionDao;


use Controllers\HomeController as Home; 


/**
 *
 */
class CineController
{
	protected $dao;
	private $homeController;

	function __construct()
	{
		$this->dao = Dao::getInstance();
		$this->salaDao = SalaDao::getInstance();
		$this->funcionDao = FuncionDao::getInstance();
		$this->homeController = new Home;

	}

	public function create($nombre, $cantidadSalas, $direccion){
		
		$id_cine=0;
		$cine = new Cine($id_cine, $nombre, $cantidadSalas, $direccion);

         
		$this->dao->create($cine);
					//luego de guardarlo en la base de datos se muestra la vista admin de users
		echo "<script> alert('Cine registrada con exito.');</script>";
            
		
		$this->readAllCine();
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



	public function readAllCine()
	{
		//guarda todos los cine de la base de datos en la variable list

		$cineList = $this->dao->readAll();
		$salaList = $this->salaDao->readAll();


		require(ROOT.VIEWS_PATH.'administrarCinesViews.php');
		


	}

	public function read($nombre)
	{
		

	}

	public function delete($id)
	{
        //BORRA EL cine QUE COINCIDE CON EL EMAIL RECIBIDO POR PARAMETROS DE LA BASE DE DATOS
		
		$this->dao->delete($id);
		$this->salaDao->deleteByCine($id);
		$this->funcionDao->deleteByCine($id);

		//INCLUYE LA VISTA PRINCIPAL

		echo "<script> alert('Cine eliminado con exito.');</script>";

		$this->readAllCine();
    }
	
	public function update($id_cine, $nombre)
	{

	}

    public function updateCine($id, $nombre, $cantidadSalas, $direccion)
    {
		$updateCine = new Cine($id, $nombre, $cantidadSalas, $direccion);
		$this->dao->edit($updateCine);
		$this->readAll();

	}
	public function readById($id)
    {
         $cine = $this->dao->readById($id);
         return $cine;

    }
     
}