<?php

namespace Models;
use Models\Genero as Genero;

Class Pelicula{

    private $id_pelicula;
    private $titulo;
    private $duracion;
    private $resenia;
    private $imagen;
    private $genero;

    function __construct($id_pelicula, $titulo, $duracion,$resenia, $imagen, Genero $genero)
    {

        $this->id_pelicula = $id_pelicula;
        $this->titulo = $titulo;
        $this->duracion = $duracion;
        $this->resenia = $resenia;
        $this->imagen = $imagen;
        $this->genero = $genero;

    }
    public function getId()
    {
        return $this->id_pelicula;
    }
    public function setId($id_pelicula)
    {
        $this->id_pelicula = $id_pelicula;
    }
    public function getTitulo()
    {
        return $this->titulo;
    }
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function getDuracion()
    {
        return $this->duracion;
    }
    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;
    }

    public function getResenia()
    {
        return $this->resenia;
    }
    public function setResenia($resenia)
    {
        $this->resenia = $resenia;
    }
    public function getImagen()
    {
        return $this->imagen;
    }
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }
   public function getGenero()
    {
        return $this->genero;
    }

    public function setGenero($genero)
    {
        return $this->genero = $genero;
    }
 
}

?>