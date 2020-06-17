<?php

namespace Models;

class User
{
	private $id;
	private $nombre;
	private $apellido;
	private $email;
	private $dni;
	private $pass;
	private $role;
	
	function __construct($id, $nombre='',$apellido='',$email='',$dni='',$pass='', $role='')
	{
		$this->id = $id;
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->email = $email;
		$this->dni = $dni;
		$this->pass = $pass;
		$this->role = $role;
	}
	
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

	public function getNombre()
	{
		return $this->nombre;
	}

	public function getApellido()
	{
		return $this->apellido;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function getDni()
	{
		return $this->dni;
	}

	public function getPass()
	{
		return $this->pass;
	}
	public function getRole()
	{
		return $this->role;
	}


	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}

	public function setApellido($apellido)
	{
		$this->apellido = $apellido;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function setDni($dni)
	{
		$this->dni = $dni;
    }
    
    public function setPass($pass)
	{
		$this->pass = $pass;
	}

	public function setRole($role)
	{
		$this->role = $role;
	}

}

?>