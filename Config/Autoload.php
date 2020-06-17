<?php namespace Config;
	
    class Autoload {
        
        public static function Start() {
            spl_autoload_register(function($className)
			{

                $className = strtolower($className);

                $classPath = ROOT . '/' . str_replace("\\", "/", $className).".php";
                
				include_once($classPath);
			});
        }
    }
?>
