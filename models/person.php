<?php
namespace models;
abstract class Person{
    private $name;
    private $lastName;
    private $dni;
    private $email;
    private $password;
    private $userName;
    public function __construct($name="", $lastName="", $dni="", $email="", $password="", $userName="") 
    {
        $this->name=$name;
        $this->lastName=$lastName;
        $this->dni=$dni;
        $this->email=$email;
        $this->password=$password;
        $this->userName=$userName;
    }

    public function setName($name)
    {
       $this->name=$name;
    }
    public function setLastName($lastName)
    {
        $this->lastName=$lastName;
    }
    public function setDni($dni)
    {
        $this->dni=$dni;
    }

    public function getName()
    {
        return  $this->name;
    }
    public function getLastName ()
    {
        return  $this->lastName;
    }
    public function getDni()
    {
        return  $this->dni;
    }
    public function setPassword($password)
{
    $this->password=$password;
}
public function setEmail($email)
{
    $this->email=$email;
}
public function getPassword()
{
    return $this->password;
}
public function getEmail()
{
 return $this->email;
}
public function getUserName()
{
    return  $this->userName;
}
public function setUserName($userName)
{
$this->userName=$userName;
}
}
