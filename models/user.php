<?php
namespace models;
use models\Person as Person; 
class User extends Person{
    private $email;
    private $password;
}

private function __construct($name, $lastName, $dni, $password, $email,$password)
{
    parent :: __construct($name, $lastName, $dni);
        $this->email=$email;
    $this->password=$password;
}