<?php

namespace Controllers;

use Models\Genero as Genero;
use DAO\generoDAO as Dao;

use Controllers\HomeController as Home; 


/**
 *
 */
class GeneroController
{
	protected $dao;
	private $homeController;

	function __construct()
	{
		$this->dao = Dao::getInstance();
		$this->homeController = new Home;
	}

	public function create($nombre)
	{
		//crea el objeto cine para luego agregarlo a la base de datos
		$genero = new Genero($nombre);
		//llama al metodo del dao para guardarlo en la base de datos
		$this->dao->create($genero);
		//luego de guardarlo en la base de datos se muestra la vista admin de users
		echo "<script> alert('Genero registrado con exito.');</script>";
		$this->homeController->viewAdministrarGenero();
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

	public function read($nombre)
	{
		//DEVUELVE EL cine CON ESE Nombre EN CASO DE EXSISTIR

		$user = $this->dao->read($nombre);

		//INCLUYE LA VISTA DONDE SE MUESTRA EL cine

		//FALTA HACER LA VISTA

	}

	public function deleteGenero($nombre)
	{
        //BORRA EL cine QUE COINCIDE CON EL EMAIL RECIBIDO POR PARAMETROS DE LA BASE DE DATOS
        
        var_dump($nombre);

		$this->dao->delete($nombre);

		//INCLUYE LA VISTA PRINCIPAL

		$this->homeController->viewAdministrarCines();
    }
    
	public function readById($id)
    {
         $genero = $this->dao->readById($id);
         return $genero;

    }
	

}