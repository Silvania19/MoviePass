<?php
namespace controllers;
use models\User as User;
use daosjson\UserDao as userD;
class UserControllers
{
private $daoUser;//en esta variable tiene una instancia de la clase Dao user, 
public function __construct()
{
    $this->daoUser = new userD();
}
public function login()
{  
    $email=$_POST['email'];
    $password=$_POST["password"];
 
    $user=$this->daoUser->Search($email);
    if(isset($user))
    {
        if($user->getPassword()==$password)
        {
            $_SESSION['user']=$user;
            include(VIEWS_PATH."home2.php");
        }
        else
        {
            echo "incorrect password";
        }
        
    }
    else
    {
        echo"incorect user";
    }
    
}
public function signUp()
{
    $name=$_POST['name'];
    $lastName=$_POST['lastName'];
    $dni=$_POST["dni"];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $userName=$_POST['userName'];
    $user=new User($name, $lastName, $dni, $email,$password, $userName);
    $this->daoUser->Add($user);
    var_dump($this->daoUser);
}
}