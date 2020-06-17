<?php namespace DAO;

use Models\TarjetaCredito as TarjetaCredito;
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
          public function create($tajetaCredito) {

               // Guardo como string la consulta sql utilizando como values, marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada
			$sql = "INSERT INTO tarjetasCredito(id_tarjetaCredito, nombre, numero, mes, año, digitos)VALUES(:id_tarjetaCredito, :nombre, :numero, :mes, :año, :digitos)";

               $parameters['id_tarjetaCredito'] = $tajetaCredito->getId();
               $parameters['nombre'] = $tajetaCredito->getNombre();
               $parameters['numero'] = $tajetaCredito->getNumero();
               $parameters['mes'] = $tajetaCredito->getMes();
               $parameters['año'] = $tajetaCredito->getAño();
               $parameters['digitos'] = $tajetaCredito->getDigitos();
               
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

              
          }

          /**
           *
           */
          public function readAll() {
              

          }


          /**
           *
           */
          public function edit($cine) 
          {
     
          }

          /**
           *
           */
          public function update($pelicula, $titulo)
          {

          }
          
          public function delete ($id)
          {
        
          }   

          /**
		* Transforma el listado de pelicula en
		* objetos de la clase pelicula
		*
		* @param  Array $gente Listado de personas a transformar
		*/
		protected function mapear($value) {


          }
       
}