<?php
namespace controllers;
use models\User as User;
use daodb\UserDao as userD;
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
    $user=new User($name,$lastName, $dni, $email, $password);
    $this->daoUser->Add($user);
    $_SESSION['user']=$user;//pongo en session al nuevo usuario qye se acabo de resistrar
    include(VIEWS_PATH."home2.php");
}
public function remove()
{
     
     if(isset($_SESSION['user']))
     {

       $user=$_SESSION['user'];
     } 
     if (isset($user))
     {
<<<<<<< HEAD
         $idUser=$user->getIduser();
         $this->daoUser->Delete($idUser);
=======
         $email=$user->getEmail();
         $this->daoUser->Delete($email);
         unset($_SESSION['user']);
>>>>>>> f81a6c67683518865d914a269580d65218b51c64
         include(VIEWS_PATH."home.php");
     }
}


}