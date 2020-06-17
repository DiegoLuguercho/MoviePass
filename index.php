<?php
 
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	require_once "Config/Autoload.php";
	require_once "Config/Config.php";
	require_once "DAO/Singleton.php";
	require_once "Extension/vendor/autoload.php";

	use Config\Autoload as Autoload;
	use Config\Router 	as Router;
	use Config\Request 	as Request;
	use DAO\Singleton as Singleton;
		
	Autoload::start();
	session_start();
	Router::Route(new Request());

?>