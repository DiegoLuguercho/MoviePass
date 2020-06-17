<?php namespace DAO;

use Models\Funcion as M_Funcion;
use Models\Pelicula as M_Pelicula;
use Models\Cine as M_Cine;
use Models\Sala as M_Sala;
use DAO\connection as Connection;
use DAO\peliculaDao as PeliculaDAO;
use DAO\cineDao as cineDAO;
use DAO\salaDao as SalaDAO;
     /**
      *
      */

     class FuncionDAO extends Singleton implements \Interfaces\crud
     {
          private $connection;

          function __construct() {
               $this->connection = null;
               $this->peliculaDAO = new PeliculaDAO();
               $this->cineDAO = new CineDAO();
               $this->salaDAO = new SalaDAO();
          }

          /**
           *
           */
          public function create($funcion) {

               // Guardo como string la consulta sql utilizando como values, marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada
			$sql = "INSERT INTO funciones(dia, hora, lenguaje, id_pelicula, id_cine, id_sala, precio)VALUES(:dia, :hora, :lenguaje, :id_pelicula, :id_cine, :id_sala, :precio)";

               $parameters['dia'] = $funcion->getDia();
               $parameters['hora'] = $funcion->getHora();
               $parameters['lenguaje'] = $funcion->getLenguaje();
               $parameters['id_pelicula'] = $funcion->getPelicula()->getId();
               $parameters['id_cine'] = $funcion->getCine()->getId();
               $parameters['id_sala'] = $funcion->getSala()->getId();
               $parameters['precio'] = $funcion->getPrecio();

               
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
          public function read($id) {

               $sql = "SELECT * FROM funciones where id_funcion = :id_funcion";

               $parameters['id_funcion'] = $id;

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
                    $funcionList = array();
                    $sql = "SELECT * FROM funciones";
                    $this->connection = Connection::getInstance();
                    $resultSet = $this->connection->execute($sql);
                    $peliculaDAO = new PeliculaDAO();
                    $cineDAO = new CineDAO();
                    $salaDAO = new SalaDAO();
                    foreach($resultSet as $p)
                    {
                         $pelicula = $peliculaDAO->readById($p['id_pelicula']);
                         $cine = $cineDAO->readById($p['id_cine']);
                         $sala = $salaDAO->readById($p['id_sala']);
                         $funcion = new M_Funcion($p['id_funcion'], $p['dia'], $p['hora'], $p['lenguaje'], $pelicula, $cine, $sala, $p['precio']);
                         array_push($funcionList, $funcion);
                         
                    }
                    return $funcionList;


               } catch(Exception $ex) {
                   throw $ex;
               }

          }


          /**
           *
           */
          public function edit($funcion) {
               
               try
               {
                   $sql = "UPDATE funciones SET dia = :dia, hora = :hora, lenguaje = :lenguaje, id_pelicula = :id_pelicula, id_cine = :id_cine, id_sala = :id_sala, precio = :precio WHERE id_funcion = :id_funcion";
                  
                   $parameters['id_funcion'] = $funcion->getId();
                   $parameters['dia'] = $funcion->getDia();
                   $parameters['hora'] = $funcion->getHora();
                   $parameters['lenguaje'] = $funcion->getLenguaje();
                   $parameters['id_pelicula'] = $funcion->getPelicula()->getId();
                   $parameters['id_cine'] = $funcion->getCine()->getId();
                   $parameters['id_sala'] = $funcion->getSala()->getId();
                   $parameters['precio'] = $funcion->getPrecio();
                  
         
               
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
          public function update($funcion, $id_funcion)
          {

          }
          public function delete ($id)
          {
               try
               {
                  $sql = "DELETE FROM funciones WHERE id_funcion = :id_funcion";
                 $parameters['id_funcion'] = $id;

              
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
          
                         $pelicula = $this->peliculaDAO->readById($p['id_pelicula']);
                         $cine = $this->cineDAO->readById($p['id_cine']);
                         $sala = $this->salaDAO->readById($p['id_sala']);
                    return new M_Funcion($p['id_funcion'], $p['dia'], $p['hora'], $p['lenguaje'], $pelicula, $cine, $sala, $p['precio']);
			}, $value);

               return count($resp) > 1 ? $resp : $resp['0'];

          }

          
          public function readById($id) {
               $sql = "SELECT * FROM funciones where id_funcion = :id_funcion";
   
                  $parameters['id_funcion'] = $id;

   
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

          
          public function readByDia($dia) {
               $sql = "SELECT * FROM funciones where dia = :dia";
   
                  $parameters['dia'] = $dia;
   
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


          public function readByPelicula ($id_pelicula)
          {
              $sql = "SELECT * FROM funciones f INNER JOIN peliculas p on f.id_pelicula = p.id_pelicula where p.id_pelicula = :pelicula"; //:category = parameters[]..
      
              $parameters['pelicula'] = $id_pelicula;
      
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
          public function deleteByCine($id)
          {
               try
               {
                  $sql = "DELETE FROM funciones WHERE id_cine = :id_cine";
                 $parameters['id_cine'] = $id;

              
                   $this->connection = Connection::getInstance();
                   return $this->connection->ExecuteNonQuery($sql, $parameters);
               }
               catch(PDOException $e)
               {
                  echo $e;
               }
          }   
  
         
     }