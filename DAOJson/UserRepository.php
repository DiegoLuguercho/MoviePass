<?php 

namespace DAO;
//PARA DESPUES:::CAMBIAR LA RUTA Y UBICACION DONDE SE GUARDA EL JSON

use models\User as User;

class UserRepository
{
    private $usuarioList=array();

    public function Add(User $usuario)
    {
        $this->RetrieveData();
        array_push($this->usuarioList,$usuario);
        $this->SaveData();

    }
    public function GetAll()
    {
        $this->RetrieveData();
        return $this->usuarioList;
    }

    private function SaveData()
    {
        $arrayToEncode=array();

        foreach($this->usuarioList as $usuario)
        {
            $valueArray["nombre"]=$usuario->getNombre();
            $valueArray["apellido"]=$usuario->getApellido();
            $valueArray["email"]=$usuario->getEmail();
            $valueArray["dni"]=$usuario->getDni();
            $valueArray["pass"]=$usuario->getPass();

            array_push($arrayToEncode,$valueArray);
        }

        $jsonContent=json_encode($arrayToEncode, JSON_PRETTY_PRINT);
        file_put_contents('Data/usuarios.json',$jsonContent);
    }
    private function RetrieveData()
    {
        $this->usuarioList=array();

        if(file_exists('Data/usuarios.json'))
        {
            $jsonContent=file_get_contents('Data/usuarios.json');
            $arrayToDecode=($jsonContent)? json_decode($jsonContent,true):array();

            foreach($arrayToDecode as $valuesArray)
            {
                $user= new User();
                $user->setName($valuesArray["nombre"]);
                $user->setApellido($valuesArray["apellido"]);
                $user->setEmail($valuesArray["email"]);
                $user->setDni($valuesArray["dni"]);
                $user->setPass($valuesArray["pass"]);
                
                array_push($this->usuarioList,$user);
            }


        }

    }

}


?>