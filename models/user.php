<?php
namespace models;
use models\Person as Person; 
class User extends Person{

    private $idUser;

public  function __construct($name, $lastName, $dni, $email,$password, $userName)
{
    parent :: __construct($name, $lastName, $dni, $email, $password, $userName);
    
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