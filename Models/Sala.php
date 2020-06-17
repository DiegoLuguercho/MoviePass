<?php

namespace Models;
use Models\Cine as Cine;

Class Sala{

    private $id;
    private $cine;
    private $nombre;
    private $capacidad;


    function __construct($id,Cine $cine, $nombre, $capacidad)
    {
        $this->id = $id;
        $this->cine = $cine;
        $this->nombre = $nombre;
        $this->capacidad = $capacidad;
        
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getCine()
    {
        return $this->cine;
    }
    public function setCine($cine)
    {
        $this->cine = $cine;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getCapacidad()
    {
        return $this->capacidad;
    }
    public function setCapacidad($capacidad)
    {
        $this->capacidad=$capacidad;
    }

}

?>