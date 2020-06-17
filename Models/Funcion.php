<?php

namespace Models;
use Models\Pelicula;
use Models\Cine;
use Models\Sala;

Class Funcion{

    private $id;
    private $dia;
    private $hora;
    private $lenguaje;
    private $pelicula;
    private $cine;
    private $sala;                
    private $precio;    

    function __construct($id, $dia, $hora, $lenguaje, Pelicula $pelicula, Cine $cine, Sala $sala, $precio)
    {
        $this->id = $id;
        $this->dia = $dia;
        $this->hora = $hora;
        $this->lenguaje = $lenguaje;
        $this->pelicula = $pelicula;
        $this->cine = $cine;
        $this->sala = $sala;
        $this->precio = $precio;
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getDia()
    {
        return $this->dia;
    }
    public function setDia($dia)
    {
        $this->dia = $dia;
    }
    public function getHora()
    {
        return $this->hora;
    }
    public function setHora($hora)
    {
        $this->hora = $hora;
    }
    public function getLenguaje()
    {
        return $this->lenguaje;
    }
    public function setLenguaje($lenguaje)
    {
        $this->lenguaje = $lenguaje;
    }
    public function getPelicula()
    {
        return $this->pelicula;
    }
    public function setPelicula($pelicula)
    {
        $this->pelicula = $pelicula;
    }
    public function getCine()
    {
        return $this->cine;
    }
    public function setCine($cine)
    {
        $this->cine = $cine;
    }
    public function getSala()
    {
        return $this->sala;
    }
    public function setSala($sala)
    {
        $this->sala = $sala;
    }
    public function getPrecio()
    {
        return $this->precio;
    }
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

}

?>