<?php namespace DAO;

use Models\Entrada as M_Entrada;
use Models\Funcion as M_Funcion;
use DAO\connection as Connection;
use DAO\funcionDao as FuncionDAO;
     /**
      *
      */

     class EntradaDAO extends Singleton implements \Interfaces\crud
     {
          private $connection;

          function __construct() {
               $this->connection = null;
               $this->funcionDAO = new FuncionDAO();
          }

          /**
           *
           */
          public function create($entrada) {

               // Guardo como string la consulta sql utilizando como values, marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada
			$sql = "INSERT INTO entradas(id_funcion,  codigo_qr)VALUES(:id_funcion, :codigo_qr)";

               $parameters['id_funcion'] = $entrada->getFuncion()->getId();
               $parameters['codigo_qr'] = $entrada->getCodigoqr();

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

               $sql = "SELECT * FROM entradas where id_entrada = :id_entrada";

               $parameters['id_entrada'] = $id;

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
          public function readAll() 
          {
               try {
                    $entradaList = array();
                    $sql = "SELECT * FROM entradas";
                    $this->connection = Connection::getInstance();
                    $resultSet = $this->connection->execute($sql);
                    $funcionDAO = new FuncionDAO();
                    foreach($resultSet as $p)
                    {
                         $funcion = $funcionDAO->readById($p['id_funcion']);
                         $entrada = new M_Entrada($p['id_entrada'], $funcion, $p['codigo_qr']);
                         array_push($entradaList, $entrada);
                         
                    }
                    return $entradaList;


               } catch(Exception $ex) {
                   throw $ex;
               }

          }


          /**
           *
           */
          public function edit($entrada) {
               
               try
               {
                   $sql = "UPDATE entradas SET id_funcion = :id_funcion, codigo_qr = :codigo_qr WHERE id_entrada = :id_entrada";
                  
                   $parameters['id_funcion'] = $entrada->getFuncion()->getId();
                   $parameters['codigo_qr'] = $entrada->getCodigoqr();

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
          public function delete($id)
          {
               try
               {
                  $sql = "DELETE FROM entradas WHERE id_entrada = :id_entrada";
                 $parameters['id_entrada'] = $id;

              
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
          
                         $funcion = $this->funcionDAO->readById($p['id_funcion']);
                    return new M_Entrada($p['id_entrada'],  $funcion, $p['codigo_qr']);
			}, $value);

               return count($resp) > 1 ? $resp : $resp['0'];

          }
}