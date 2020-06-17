<?php

namespace Controllers;

use Models\User as User;
use DAO\userDAO as Dao;

use Controllers\HomeController as Home; 


/**
 *
 */
class UserController
{
	protected $dao;
	private $homeController;

	function __construct()
	{
		$this->dao = Dao::getInstance();
		$this->homeController = new Home;
	}

	public function create($nombre,$apellido,$email,$dni,$pass)
	{
		$id_user=0;
		//crea el objeto user para luego agregarlo a la base de datos
		$user = new User($id_user, $nombre,$apellido,$email,$dni,$pass);
		//llama al metodo del dao para guardarlo en la base de datos
		$this->dao->create($user);
		//luego de guardarlo en la base de datos se muestra la vista admin de users
		echo "<script> alert('Usuario registrado con exito. ');</script>";
		$this->homeController->Index();
	}



	public function readAll()
	{
		//guarda todos los user de la base de datos en la variable list

		$list = $this->dao->readAll();
		if (!is_array($list) && $list != false){ // si no hay nada cargado, readall devuelve false
			$array[] = $list;
			$list = $array; // para que devuelva un arreglo en caso de haber solo 1 objeto // esto para cuando queremos hacer foreach al listar, ya que no se puede hacer foreach sobre un objeto ni sobre un false
		}

		return $list;


	}

	public function readAllUser()
	{
		//guarda todos los cine de la base de datos en la variable list

		$userList = $this->dao->readAll();

		require(ROOT.VIEWS_PATH.'administrarUsuariosViews.php');
	

	}

	public function read($email)
	{
		//DEVUELVE EL user CON ESE EMAIL EN CASO DE EXSISTIR

		$user = $this->dao->read($email);

		//INCLUYE LA VISTA DONDE SE MUESTRA EL user

		//FALTA HACER LA VISTA

	}

	public function delete($id)
	{
        //BORRA EL cine QUE COINCIDE CON EL EMAIL RECIBIDO POR PARAMETROS DE LA BASE DE DATOS
		
		$this->dao->delete($id);

		//INCLUYE LA VISTA PRINCIPAL
		echo "<script> alert('Usuario eliminado con exito.');</script>";

		$this->readAllUser();
    }

	public function login($email, $pass)
	{
		$user = $this->dao->read($email);

		if($user)
		{
			if($user->getPass() == $pass)
			{
				$this->setSession($user);
				if($user->getRole()=='admin')
				{
					$this->homeController->indexAdmin();
					echo "<script> alert('Has Iniciado Sesion como Administrador. ');</script>";
				}
				else
				{
					$this->homeController->indexLogin();
					echo "<script> alert('Has Iniciado Sesion. ');</script>";
				}
				

			} else {
				$this->homeController->viewLogin();
				echo "<script> alert('Contraseña Incorrecta.');</script>";
			}
		} else {
			$this->homeController->viewLogin();
			echo "<script> alert('Usuario Incorrecto.');</script>";
		}

	}

	public function checkSession ()
	{
		if (session_status() == PHP_SESSION_NONE)
            session_start();

        if(isset($_SESSION['user'])) {

            $user = $this->dao->read($_SESSION['user']->getEmail());

            if($user->getPass() == $_SESSION['user']->getPass())
                return $user;

          } else {
            return false;
          }
    }

	public function setSession($user)
	{
		$_SESSION['user'] = $user;
	}

	public function logout()
	{
		if (session_status() == PHP_SESSION_NONE)
               session_start();

          unset($_SESSION['user']);
		  $this->homeController->Index();
		  echo "<script> alert('Sesion Cerrada.');</script>";

	}

}