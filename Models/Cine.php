<?php

namespace Models;

Class Cine{

    private $id;
    private $nombre;
    private $cantidadSalas;
    private $direccion;

    function __construct($id, $nombre, $cantidadSalas, $direccion)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->cantidadSalas = $cantidadSalas;
        $this->direccion = $direccion;
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
    public function setNombre($Nombre)
    {
        $this->nombre = $nombre;
    }

    public function getCantidadSalas()
    {
        return $this->cantidadSalas;
    }
    public function setCantidadSalas($cantidadSalas)
    {
        $this->cantidadSalas = $cantidadSalas;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

}

?>