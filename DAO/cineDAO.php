<?php namespace DAO;

use Models\Cine as M_Cine;
use DAO\connection as Connection;
     /**
      *
      */
     class CineDAO extends Singleton implements \Interfaces\crud
     {
          private $connection;

          function __construct() {
               $this->connection = null;
          }

          /**
           *
           */
          public function create($cine) {

               // Guardo como string la consulta sql utilizando como values, marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada
			$sql = "INSERT INTO cines(id_cine, nombre, cantidadSalas, direccion)VALUES(:id_cine, :nombre, :cantidadSalas, :direccion)";

               $parameters['id_cine'] = $cine->getId();
               $parameters['nombre'] = $cine->getNombre();
               $parameters['cantidadSalas'] = $cine->getCantidadSalas();
               $parameters['direccion'] = $cine->getDireccion();
               
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

               $sql = "SELECT * FROM cines where nombre = :nombre";

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
                    $cineList = array();
                    $sql = "SELECT * FROM cines";
                    $this->connection = Connection::getInstance();
                    $resultSet = $this->connection->execute($sql);
                    
                    foreach($resultSet as $p)
                    {
                         $cine = new M_Cine($p['id_cine'], $p['nombre'], $p['cantidadSalas'], $p['direccion']);
                         
                         array_push($cineList, $cine);
                    }
                    return $cineList;


               } catch(Exception $ex) {
                   throw $ex;
               }

          }


          /**
           *
           */
          public function edit($cine) 
          {
               try
               {
                    $sql = "UPDATE cines SET nombre = :nombre, cantidadSalas = :cantidadSalas, direccion = :direccion  WHERE id_cine = :id_cine";
                    $parameters['id_cine'] = $cine->getId();
                    $parameters['nombre'] = $cine->getNombre();
                    $parameters['cantidadSalas'] = $cine->getCantidadSalas();
                    $parameters['direccion'] = $cine->getDireccion();
                    
           
                 
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
          
          public function delete ($id)
          {
               try
               {
                  $sql = "DELETE FROM cines WHERE id_cine = :id_cine";
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
                    return new M_Cine($p['id_cine'], $p['nombre'], $p['cantidadSalas'], $p['direccion']);
			}, $value);

               return count($resp) > 1 ? $resp : $resp['0'];

          }
          public function readById($id) {
               $sql = "SELECT * FROM cines where id_cine = :id_cine";
   
                  $parameters['id_cine'] = $id;
   
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