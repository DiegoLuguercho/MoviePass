<?php namespace DAO;

use Models\Genero as M_Genero;
use DAO\connection as Connection;
     /**
      *
      */
     class GeneroDAO extends Singleton implements \Interfaces\crud
     {
          private $connection;

          function __construct() {
               $this->connection = null;
          }

          /**
           *
           */
          public function create($genero) {

               // Guardo como string la consulta sql utilizando como values, marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada
			$sql = "INSERT INTO generos(nombre)VALUES(:nombre)";

               $parameters['nombre'] = $cine->getNombre();
               
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

               $sql = "SELECT * FROM generos where nombre = :nombre";

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

          public function readById($id) {
            $sql = "SELECT * FROM generos where id_genero = :id_genero";

               $parameters['id_genero'] = $id;

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
               $sql = "SELECT * FROM generos";

               try {
                    $this->connection = Connection::getInstance();
                    $resultSet = $this->connection->execute($sql);
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
          public function edit($genero) {
               $sql = "UPDATE generos SET nombre = :nombre";
               
               $parameters['nombre'] = $cine->getNombre();

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
          public function update ($id_genero,$nombre)
          {
            $sql = "UPDATE generos SET nombre = :nombre  WHERE id_genero = :id_genero";
            $parameters['id_genero'] = $id_genero;
            $parameters['nombre'] = $nombre;
      
            try
            {
                $this->connection = Connection::getInstance();
                return $this->connection->ExecuteNonQuery($sql, $parameters);
            }
            catch(PDOException $e)
            {
                echo $e;
            }
          }
          /**
           *
           */
          public function delete ($nombre)
          {
                 $sql = "DELETE FROM generos WHERE nombre = :nombre";
                 $parameters['nombre'] = $nombre;

               try
               {
                   $this->connection = Connection::getInstance();
                   return $this->connection->ExecuteNonQuery($sql, $parameters);
               }
               catch(PDOException $e)
               {
                  echo $e;
               }
          }   

          /**
		* Transforma el listado de cine en
		* objetos de la clase cine
		*
		* @param  Array $gente Listado de personas a transformar
		*/
		protected function mapear($value) {

			$value = is_array($value) ? $value : [];

			$resp = array_map(function($p){
				return new M_Genero($p['id_genero'], $p['nombre']);
			}, $value);

               return count($resp) > 1 ? $resp : $resp['0'];

		}
     }