<?php namespace DAO;

use Models\Pelicula as M_Pelicula;
use Models\Genero as M_Genero;
use Models\Foto as Foto;
use DAO\connection as Connection;
use DAO\generoDao as GeneroDAO;
     /**
      *
      */

     class PeliculaDAO extends Singleton implements \Interfaces\crud
     {
          private $connection;
          private $ganeroDAO;

          function __construct() {
               $this->connection = null;
               $this->generoDAO = new GeneroDAO();
          }

          /**
           *
           */
          public function create($pelicula) {

               // Guardo como string la consulta sql utilizando como values, marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada
			$sql = "INSERT INTO peliculas(id_pelicula, titulo, duracion, resenia, imagen, id_genero)VALUES(:id_pelicula, :titulo, :duracion, :resenia, :imagen, :id_genero)";

               $parameters['id_pelicula'] = $pelicula->getId();
               $parameters['titulo'] = $pelicula->getTitulo();
               $parameters['duracion'] = $pelicula->getDuracion();
               $parameters['resenia'] = $pelicula->getResenia();
               $parameters['id_genero'] = $pelicula->getGenero()->getId();
               $parameters['imagen'] = $pelicula->getImagen();

               
               try {
                    // creo la instancia connection
     			$this->connection = Connection::getInstance();
				// Ejecuto la sentencia.
				return $this->connection->ExecuteNonQuery($sql, $parameters);
			} catch(\PDOException $ex) {
                   throw $ex;
              }
          }


          /**
           *
           */
          public function read($titulo) {

               $sql = "SELECT * FROM peliculas where titulo = :titulo";

               $parameters['titulo'] = $titulo;

               try {
                    $this->connection = Connection::getInstance();
                    $resultSet = $this->connection->execute($sql, $parameters);
               } catch(Exception $ex) {
                   throw $ex;
               }


               if(!empty($resultSet))
                    return $this->mapear($resultSet);
               else
                    return false;
          }

          /**
           *
           */
          public function readAll() {
               try {
                    $peliculaList = array();
                    $sql = "SELECT * FROM peliculas";
                    $this->connection = Connection::getInstance();
                    $resultSet = $this->connection->execute($sql);
                    $generoDAO =  new GeneroDAO();
                    
                    foreach($resultSet as $p)
                    {
                         $genero = $generoDAO->readById($p['id_genero']);
                         $pelicula = new M_Pelicula($p['id_pelicula'], $p['titulo'], $p['duracion'], $p['resenia'], $p['imagen'],$genero);
                         
                         array_push($peliculaList, $pelicula);
                    }
                    return $peliculaList;


               } catch(Exception $ex) {
                   throw $ex;
               }

          }


          /**
           *
           */
          public function edit($pelicula) 
          {
                    try
                 {
                    $sql = "UPDATE peliculas SET titulo = :titulo, duracion = :duracion, resenia = :resenia, imagen = :imagen, id_genero = :id_genero  WHERE id_pelicula = :id_pelicula";
                    $parameters['id_pelicula'] = $pelicula->getId();
                    $parameters['titulo'] = $pelicula->getTitulo();
                    $parameters['duracion'] = $pelicula->getDuracion();
                    $parameters['resenia'] = $pelicula->getResenia();
                    $parameters['imagen'] = $pelicula->getImagen();
                    $parameters['id_genero'] = $pelicula->getGenero()->getId();
                    
           
                 
                     $this->connection = Connection::getInstance();
                     $this->connection->ExecuteNonQuery($sql, $parameters);
                 }
                 catch(PDOException $e)
                 {
                     echo $e;
                 }
          }

          /**
           *
           */
          public function update($pelicula, $titulo)
          {

          }
          
          /**
           *
           */
          public function delete ($id)
          {
               try
               {
                  $sql = "DELETE FROM peliculas WHERE id_pelicula = :id_pelicula";
                 $parameters['id_pelicula'] = $id;

              
                   $this->connection = Connection::getInstance();
                   return $this->connection->ExecuteNonQuery($sql, $parameters);
               }
               catch(PDOException $e)
               {
                  echo $e;
               }
          }   

          /**
		* Transforma el listado de pelicula en
		* objetos de la clase pelicula
		*
		* @param  Array $gente Listado de personas a transformar
		*/
		protected function mapear($value) {

			$value = is_array($value) ? $value : [];

			$resp = array_map(function($p){
                     $genero= $this->generoDAO->readById($p['id_genero']);
                    return new M_Pelicula($p['id_pelicula'], $p['titulo'], $p['duracion'], $p['resenia'], $p['imagen'],$genero);
			}, $value);

               return count($resp) > 1 ? $resp : $resp['0'];

          }
          public function readById($id) {
               $sql = "SELECT * FROM peliculas where id_pelicula = :id_pelicula";
   
                  $parameters['id_pelicula'] = $id;
   
                  try {
                       $this->connection = Connection::getInstance();
                       $resultSet = $this->connection->execute($sql, $parameters);
                  } catch(Exception $ex) {
                      throw $ex;
                  }
   
   
                  if(!empty($resultSet))
                       return $this->mapear($resultSet);
                  else
                       return false;
             }

             public function readByGenero ($id_genero)
             {
                 $sql = "SELECT * FROM peliculas p INNER JOIN generos g on p.id_genero = g.id_genero where g.id_genero = :genero"; //:category = parameters[]..
         
                 $parameters['genero'] = $id_genero;
         
                 try
                 {
                     $this->connection = Connection::getInstance();
                     $resultSet = $this->connection->execute($sql, $parameters);
                 }
                 catch(PDOException $e)
                 {
                     echo $e;
                 }
         
                 if(!empty($resultSet))
                     return $this->mapear($resultSet);
                 else
                     return false;
             }
     
     public function readByImg($img)
     {
      $sql = "SELECT * FROM peliculas where imagen = :imagen";

      $parameters['imagen'] = $img;

      try
      {
          $this->connection = Connection::getInstance();
          $resultSet = $this->connection->execute($sql, $parameters);
      }
      catch(PDOException $e)
      {
          echo $e;
      }

      if(!empty($resultSet))
          return $this->mapear($resultSet);
      else
          return false;
     }
     
         
     }