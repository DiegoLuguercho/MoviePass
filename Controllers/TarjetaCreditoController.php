<?php

namespace Controllers;

use Models\TarjetaCredito as TarjetaCredito;
use DAO\tarjetaCreditoDAO as Dao;



use Controllers\HomeController as Home; 


/**
 *
 */
class TarjetaCreditoController
{
	protected $dao;
	private $homeController;

	function __construct()
	{
		$this->dao = Dao::getInstance();
		$this->homeController = new Home;

	}

	public function create($nombre, $numero, $mes, $año, $digitos){
		
		$id=0;
		$tarjetaCredito = new TarjetaCredito($id, $nombre, $numero, $mes, $año, $digitos);

         
		$this->dao->create($tarjetaCredito);
					//luego de guardarlo en la base de datos se muestra la vista admin de users
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
		

	}

	public function delete($id)
	{
        //BORRA EL cine QUE COINCIDE CON EL EMAIL RECIBIDO POR PARAMETROS DE LA BASE DE DATOS
		
		$this->dao->delete($id);


    }
	
	public function update($id, $nombre)
	{

	}

    public function updateTj($id, $nombre, $numero, $mes, $año, $digitos)
    {
		$tarjetaCredito = new TarjetaCredito($id, $nombre, $numero, $mes, $año, $digitos);
		$this->dao->edit($tarjetaCredito);
		$this->readAll();

	}

     
}