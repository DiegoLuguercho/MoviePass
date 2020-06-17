<?php namespace DAO;

use Models\User as M_Usuario;
use DAO\connection as Connection;
use PDOException;
     /**
      *
      */
     class UserDAO extends Singleton implements \Interfaces\crud
     {
          private $connection;

          function __construct() {
               $this->connection = null;
          }

          /**
           *
           */
          public function create($user) {

               // Guardo como string la consulta sql utilizando como values, marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada
			$sql = "INSERT INTO users(id_user, nombre, apellido, email, dni, pass, role)VALUES(:id_user, :nombre, :apellido, :email, :dni, :pass, :role)";

               $parameters['id_user'] = $user->getId();
               $parameters['nombre'] = $user->getNombre();
               $parameters['apellido'] = $user->getApellido();
               $parameters['email'] = $user->getEmail();
               $parameters['dni'] = $user->getDni();
               $parameters['pass'] = $user->getPass();
               $parameters['role'] = $user->getRole();
               
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
          public function read($email) {

               $sql = "SELECT * FROM users where email = :email";

               $parameters['email'] = $email;

               try {
                    $this->connection = Connection::getInstance();
                    $resultSet = $this->connection->execute($sql, $parameters);
               } catch(PDOException $e) {
                    echo '<script>';
                    echo 'console.log("Error en base de datos. Archivo: userdao.php")';
                    echo '</script>';
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
                    $userList = array();
                    $sql = "SELECT * FROM users";
                    $this->connection = Connection::getInstance();
                    $resultSet = $this->connection->execute($sql);
                    $generoDAO =  new GeneroDAO();
                    
                    foreach($resultSet as $p)
                    {
                         $user = new M_Usuario($p['id_user'], $p['nombre'], $p['apellido'], $p['email'], $p['dni'], $p['pass'], $p['role']);
                         
                         array_push($userList, $user);
                    }
                    return $userList;


               } catch(Exception $ex) {
                   throw $ex;
               }
          }


          /**
           *
           */
          public function edit($_user) {
               $sql = "UPDATE users SET nombre = :nombre, apellido = :apellido, email = :email, dni = :dni, pass = :pass, role = :role";
               
               $parameters['id_user'] = $_user->getId();
               $parameters['nombre'] = $_user->getNombre();
               $parameters['apellido'] = $_user->getApellido();
               $parameters['email'] = $_user->getEmail();
               $parameters['dni'] = $_user->getDNI();
               $parameters['pass'] = $_user->getPass();
               $parameters['role'] = $_user->getRole();

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
          public function update ($id_user,$pass)
          {
            $sql = "UPDATE users SET pass = :pass  WHERE id_user = :id_user";
            $parameters['id_user'] = $id_user;
            $parameters['pass'] = $pass;
      
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
          public function delete ($id_user)
          {
                 $sql = "DELETE FROM users WHERE id_user = :id_user";
                 $parameters['id_user'] = $id_user;

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
		* Transforma el listado de usuario en
		* objetos de la clase Usuario
		*
		* @param  Array $gente Listado de personas a transformar
		*/
		protected function mapear($value) {

			$value = is_array($value) ? $value : [];

			$resp = array_map(function($p){
				return new M_Usuario($p['id_user'], $p['nombre'], $p['apellido'], $p['email'], $p['dni'], $p['pass'], $p['role']);
			}, $value);

               return count($resp) > 1 ? $resp : $resp['0'];

		}
     }
