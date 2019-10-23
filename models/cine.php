<?php
namespace models;
class Cine
{
    private $idCine;
    private $name;
    private $idUserAdministrator;
    private $idLocalidad;
    private $email;

    public function __construct($idCine, $name, $email, $idUserAdministrator, $idLocalidad)
    {
        $this->name=$name;
        $this->idCine=$idCine;
        $this->idUserAdministrator=$idUserAdministrator;
        $this->idLocalidad=$idLocalidad;
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
public function setIdLocalidad($idLocalidad)
{
    $this->idLocalidad=$idLocalidad;
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

public function getIdLocalidad()
{
    return $this->idLocalidad;
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