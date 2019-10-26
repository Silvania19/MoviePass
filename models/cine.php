<?php
namespace models;
class Cine
{
    private $idCine;
    private $name;
    private $idUserAdministrator;
    private $idLocation;
    private $email;

    public function __construct($name, $email, $idUserAdministrator, $idLocation)
    {
        $this->name=$name;
        $this->idUserAdministrator=$idUserAdministrator;
        $this->idLocation=$idLocation;
        $this->email=$email;
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
public function setIdLocation($idLocation)
{
    $this->idLocation=$idLocation;
}
public function setEmail($email)
{
    $this->email=$email;
}
public function getIdCine()
{
    return $this->idCine;
}
public function getIdUserAdministrator()
{
    return $this->idUserAdministrator;
}

public function getIdLocation()
{
    return $this->idLocation;
}
public function getName()
{
    return $this->name;
}
public function getEmail()
{
    return $this->email;
}
}