<?php
namespace controllers;
use models\User as User;
use daodb\UserDao as userD;
class AdministratorControllers
{
private $daoUser;//en esta variable tiene una instancia de la clase Dao user, 
public function __construct()
{
    $this->daoUser = new userD();
}

public function addAdministrator()
{
    $name=$_POST['name'];
    $lastName=$_POST['lastName'];
    $dni=$_POST["dni"];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $idRol=2;
    $user=new User($name,$lastName, $dni, $email, $password, $idRol);
    $this->daoUser->Add($user);
    $_SESSION['user']=$user;//pongo en session al nuevo usuario qye se acabo de resistrar
    include(VIEWS_PATH."adminitratorviews.php");
}



}