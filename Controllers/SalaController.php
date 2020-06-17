<?php

namespace Controllers;

use Models\Sala as Sala;
use DAO\salaDAO as Dao;
use Models\Cine as Cine;
use Controllers\HomeController as Home; 
use Controllers\CineController as CineController; 
/**
 *
 */
class SalaController
{
	protected $dao;
	private $homeController;
	private $cineController;

	function __construct()
	{
		$this->dao = Dao::getInstance();
		$this->homeController = new Home;
		$this->cineController= new CineController;

	}

	public function create($id_cine, $nombre, $capacidad){
		
		$id_sala=0;
		
		$cine = $this->cineController->readById($id_cine);

		$sala = new Sala($id_sala, $cine, $nombre, $capacidad);

         
		$this->dao->create($sala);
					//luego de guardarlo en la base de datos se muestra la vista admin de users
		echo "<script> alert('Sala registrada con exito.');</script>";
            
		
		$this->cineController->readAllCine();
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



	public function readAllSala()
	{
		//guarda todos los cine de la base de datos en la variable list

		$salaList = $this->dao->readAll();

		$cineList = $this->cineController->readAll();

		$this->cineController->readAllCine();
		


	}

	public function read($nombre)
	{
		

	}

	public function delete($id)
	{
        //BORRA EL cine QUE COINCIDE CON EL EMAIL RECIBIDO POR PARAMETROS DE LA BASE DE DATOS
		$this->dao->delete($id);

		//INCLUYE LA VISTA PRINCIPAL

		$this->readAllSala();
    }
	
	public function update($id_sala, $nombre)
	{

	}

    public function updateSala($id, $id_cine, $nombre, $capacidad)
    {
		$cine=$this->cineController->readById($id_cine);
		$updateSala = new Sala($id, $cine, $nombre, $capacidad);
		$this->dao->edit($updateSala);
		$this->readAllSala();

	}
	public function readById($id)
    {
         $sala = $this->dao->readById($id);
         return $sala;

    }
     
}