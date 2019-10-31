<?php
namespace models;
use models\Person as Person; 
class User extends Person{

    private $idUser;
    private $idRol;

public  function __construct($name, $lastName, $dni, $email,$password)
{
    parent :: __construct($name, $lastName, $dni, $email, $password);
    
}
public function setIdUser($idUser)
{
    $this->idUser=$idUser;
}
public function getIduser()
{
    return $this->idUser;
}


}