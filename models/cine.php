<?php
namespace models;
class Cine
{
    private $idCine;
    private $name;
    private $idUserAdministrator;
    private $address;
   

    public function __construct($name, $idUserAdministrator, $address)
    {
        $this->name=$name;
        $this->idUserAdministrator=$idUserAdministrator;
        $this->address=$address;
       
    }

public function setIdCine($idCine)
{
    $this->idCine=$idCine;
}
public function setName($name)
{
    $this->name=$name;
}
public function setIdUserAdministrator($idUserAdministrator)
{
    $this->idUserAdministrator=$idUserAdministrator;
}
public function setAddress($address)
{
    $this->address=$adress;
}

public function getIdCine()
{
    return $this->idCine;
}
public function getIdUserAdministrator()
{
    return $this->idUserAdministrator;
}

public function getAddress()
{
    return $this->address;
}
public function getName()
{
    return $this->name;
}

}