<?php

namespace Models;

use Models\Funcion;

Class Entrada{

    private $id;
    private $funcion;
    private $codigoqr;

    function __construct($id, Funcion $funcion, $codigoqr)
    {
        $this->id = $id;
        $this->funcion = $funcion;
        $this->codigoqr = $codigoqr;     
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getFuncion()
    {
        return $this->funcion;
    }
    public function setFuncion($funcion)
    {
        $this->funcion = $funcion;
    }
    public function getCodigoqr()
    {
        return $this->codigoqr;
    }
    public function setCodigoqr($codigoqr)
    {
        $this->codigoqr = $codigoqr;
    }

}

?>