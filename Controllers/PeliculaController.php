<?php

namespace Controllers;

use Models\Pelicula as Pelicula;
use DAO\peliculaDAO as Dao;
use Models\Genero as Genero;
use Models\Foto as Foto;
use Controllers\HomeController as Home; 
use Controllers\GeneroController as GeneroController; 
use Controllers\FileController as FileController; 
/**
 *
 */
class PeliculaController
{
	protected $dao;
	private $homeController;
	private $generoController;
	private $fileController;

	function __construct()
	{
		$this->dao = Dao::getInstance();
		$this->homeController = new Home;
		$this->generoController= new GeneroController;
		$this->fileController= new FileController;
	}

	public function create($titulo,$duracion,$resenia, $id_genero)
	{
	

		$id_pelicula=0;
		


		$resp=null;

			$genero = $this->generoController->readById($id_genero);

		    $pelicula = new Pelicula($id_pelicula, $titulo,$duracion,$resenia, $resp, $genero);

         
			$this->dao->create($pelicula);
			
			
		    echo "<script> alert('Pelicula registrada con exito.');</script>";

		    $this->readAllPelicula();


		
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



	public function readAllPelicula()
	{
		//guarda todos los cine de la base de datos en la variable list

		$peliculaList = $this->dao->readAll();

		$generoList = $this->generoController->readAll();

		require(ROOT.VIEWS_PATH.'administrarPeliculasViews.php');
		


	}

	public function read($titulo)
	{
		

	}

	public function delete($id)
	{
        //BORRA EL cine QUE COINCIDE CON EL EMAIL RECIBIDO POR PARAMETROS DE LA BASE DE DATOS
		$this->dao->delete($id);

		//INCLUYE LA VISTA PRINCIPAL

		echo "<script> alert('Pelicula eliminada con exito.');</script>";

		$this->readAllPelicula();
    }
	
	public function update($id_pelicula, $titulo)
	{

	}

    public function updatePelicula($id, $titulo, $duracion, $resenia, $file, $id_genero)
    {
		$resp = $fileController->upload($file,'peliculas');
		$genero=$this->generoController->readById($id_genero);
		$updatePelicula = new Pelicula($id, $titulo, $duracion, $resenia, $file ,$genero);
		$this->dao->edit($updatePelicula);
		$this->readAllPelicula();

	}
	public function readById($id)
    {
         $pelicula = $this->dao->readById($id);
         return $pelicula;

	}
	public function readByTitulo($titulo)
    {
         $pelicula = $this->dao->readByTitulo($titulo);
         return $pelicula;

	}
	
	public function readByGenero($generoId)
	{

		$peliculaList = $this->dao->readAll();

		$generoList = $this->generoController->readAll();
		$peliculaList = $this->dao->readByGenero($generoId);

		require(ROOT.VIEWS_PATH.'generoLogin.php');

	}
	public function readByImg($img)
	{
		$pelicula = $this->dao->readByImg($img);
		var_dump($pelicula); 
		return $id_pelicula;
		
	}
}
