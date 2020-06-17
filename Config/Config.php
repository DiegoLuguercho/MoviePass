<?php 
    namespace Config;

    define('ROOT', str_replace('\\','/',dirname(__DIR__) . "/"));
    //Path to your project's root folder

    $base=explode($_SERVER['DOCUMENT_ROOT'],ROOT);
    define("BASE",$base[1]);

    define("FRONT_ROOT", "/MoviePass/");
    define("VIEWS_PATH", "Views/");
    define("CSS_PATH", FRONT_ROOT. "Assets/css/");
    define("JS_PATH", FRONT_ROOT. "Assets/js/");

    define('IMG_UPLOADS',FRONT_ROOT.'Assets/img');
    define('IMG_PELICULA','Assets/img/peliculas/');

    

    define("DB_HOST", "localhost");
    define("DB_NAME", "moviePass");
    define("DB_USER", "root");
    define("DB_PASS", "");
?>