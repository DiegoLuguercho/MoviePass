<?php

namespace Models;

class TarjetaCredito
{
         private $id;
         private $nombre;
         private $numero;    
         private $mes;
         private $año;
         private $digitos;
	
	function __construct($id, $nombre, $numero, $mes, $año, $digitos)
	{
		$this->id = $id;
		$this->nombre = $nombre;
		$this->numero = $numero;
		$this->mes = $mes;
		$this->año = $año;
		$this->digitos = $digitos;
	}
	
    public function getId()
    {
        return $this->id;
    }

	public function getNombre()
	{
		return $this->nombre;
	}

	public function getNumero()
	{
		return $this->numero;
	}

	public function getMes()
	{
		return $this->mes;
	}

	public function getAño()
	{
		return $this->año;
	}

	public function getDigito()
	{
		return $this->digito;
	}

}

?>