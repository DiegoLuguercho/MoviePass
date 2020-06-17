<?php namespace DAO;

use Models\Sala as M_Sala;
use Models\Cine as M_Cine;
use DAO\connection as Connection;
use DAO\CineDao as CineDAO;
     /**
      *
      */

     class SalaDAO extends Singleton implements \Interfaces\crud
     {
          private $connection;
          private $cineDAO;

          function __construct() {
               $this->connection = null;
               $this->cineDAO = new cineDAO();
          }

          /**
           *
           */
          public function create($sala) {

               // Guardo como string la consulta sql utilizando como values, marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada
			$sql = "INSERT INTO salas(id_sala, id_cine, nombre, capacidad)VALUES(:id_sala, :id_cine, :nombre, :capacidad)";

               $parameters['id_sala'] = $sala->getId();
               $parameters['id_cine'] = $sala->getCine()->getId();
               $parameters['nombre'] = $sala->getNombre();
               $parameters['capacidad'] = $sala->getCapacidad();

               
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
          public function read($nombre) {

               $sql = "SELECT * FROM salas where nombre = :nombre";

               $parameters['nombre'] = $nombre;

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
                    $salaList = array();
                    $sql = "SELECT * FROM salas";
                    $this->connection = Connection::getInstance();
                    $resultSet = $this->connection->execute($sql);
                    $cineDAO =  new CineDAO();
                    
                    foreach($resultSet as $p)
                    {
                         $cine = $cineDAO->readById($p['id_cine']);
                         $sala = new M_Sala($p['id_sala'], $cine, $p['nombre'], $p['capacidad']);
                         
                         array_push($salaList, $sala);
                    }
                    return $salaList;


               } catch(Exception $ex) {
                   throw $ex;
               }

          }


          /**
           *
           */
          public function edit($sala) {
               $sql = "UPDATE salas SET id_sala = :id_sala, id_cine = :id_cine, nombre = :nombre, capacidad = :capacidad WHERE id_sala = :id_sala";
               
               $parameters['id_sala'] = $sala->getId();
               $parameters['id_cine'] = $sala->getCine()->getId();
               $parameters['nombre'] = $sala->getNombre();
               $parameters['capacidad'] = $sala->getCapacidad();


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
          public function update($pelicula, $titulo)
          {

          }
          /**
           *
           */
          public function delete($id)
          {
               try
               {
                  $sql = "DELETE FROM salas WHERE id_sala = :id_sala";
                 $parameters['id_sala'] = $id;

              
                   $this->connection = Connection::getInstance();
                   return $this->connection->ExecuteNonQuery($sql, $parameters);
               }
               catch(PDOException $e)
               {
                  echo $e;
               }
          }  
          public function deleteByCine($id)
          {
               try
               {
                  $sql = "DELETE FROM salas WHERE id_cine = :id_cine";
                 $parameters['id_cine'] = $id;

              
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
               $cine= $this->cineDAO->readById($p['id_cine']);
                    return new M_Sala($p['id_sala'], $cine, $p['nombre'], $p['capacidad']);
			}, $value);

               return count($resp) > 1 ? $resp : $resp['0'];

          }
          public function readById($id) {
               $sql = "SELECT * FROM salas where id_sala = :id_sala";
   
                  $parameters['id_sala'] = $id;
   
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
         
     }