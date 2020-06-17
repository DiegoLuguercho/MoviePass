<?php

namespace Controllers;

use Models\Entrada as Entrada;
use DAO\entradaDAO as Dao;
use DAO\funcionDAO as FuncionDao;


use Controllers\FuncionesController as FuncionController; 
use Controllers\HomeController as Home; 


/**
 *
 */
class EntradaController
{
	protected $dao;
	private $homeController;
	private $funcionController;
	private $asientoController;

	function __construct()
	{
		$this->dao = Dao::getInstance();
		$this->funcionDao = FuncionDao::getInstance();
		$this->homeController = new Home;
		$this->funcionController = new FuncionController;


	}

	public function create($id_funcion){
		
		$id=0;
		$codigoqr=null;
		$funcion = $this->funcionController->readById($id_funcion);
		$entrada = new Entrada($id, $funcion, $codigoqr);

         
		$this->dao->create($entrada);
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



	public function readAllEntradas()
	{
		//guarda todos los cine de la base de datos en la variable list

		$entradaList = $this->dao->readAll();
        $funcionList = $this->funcionDao->readAll();


		require(ROOT.VIEWS_PATH.'administrarEntradasViews.php');
		


	}

	public function read($id)
	{
		 $entrada = $this->dao->read($id);

		 require(ROOT.VIEWS_PATH.'comprandoEntradas.php');

	}

	public function delete($id)
	{
        //BORRA EL cine QUE COINCIDE CON EL EMAIL RECIBIDO POR PARAMETROS DE LA BASE DE DATOS
		
		$this->dao->delete($id);

		$this->readAllEntradas();
    }
	
	public function update($id_cine, $nombre)
	{

	}
	public function comprarEntrada($contador, $id_funcion)
	{
		$funcion = $this->funcionController->readById($id_funcion);
		if($funcion->getSala()->getCapacidad()!= 0)
		{
					if($funcion->getSala()->getCapacidad() > $contador)
					{
						while($contador!=0)
					    {
							$this->create($funcion->getId()); 
							$funcion->getSala()->getCapacidad()-1;
						    $contador--;
					    }
					}
					else
					{
						echo "<script> alert('No hay tantas entradas disponibles, seleccione un numero más bajo.');</script>";
						$this->funcionController->comprarEntrada($id_funcion);
					   
					}
					
		}
		else
		{
			echo "<script> alert('No hay entradas disponibles.');</script>";
			$this->funcionController->comprarEntrada($id_funcion);
			 
		}
			
		require(ROOT.VIEWS_PATH.'pagandoEntradas.php');

	}

	
}
