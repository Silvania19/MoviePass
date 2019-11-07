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
   
    if($user)
    {
        if($user->getPassword()==$password)
        {
            $_SESSION['user']=$user;
            include(VIEWS_PATH."home2.php");
        }
        else
        {
        echo" <script>alert('incorrect password');</script>" ;
        include(VIEWS_PATH."home.php");
        }
        
    }
    else
    {
        echo "<script>alert('incorrect user');</script>" ;
        include(VIEWS_PATH."home.php");
    }
    
}
public function signUp()
{
    $name=$_POST['name'];
    $lastName=$_POST['lastName'];
    $dni=$_POST["dni"];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $idRol=1;
  
    $user=new User($name,$lastName, $dni, $email, $password, $idRol);
    $this->daoUser->Add($user);
    $_SESSION['user']=$user;//pongo en session al nuevo usuario qye se acabo de resistrar
    include(VIEWS_PATH."home2.php");
}
public function deleteUser()
{
     
     if(isset($_SESSION['user']))
     {

       $user=$_SESSION['user'];
     } 
     if (isset($user))
     {
         $idUser=$user->getIduser();
         $this->daoUser->Delete($idUser);
         include(VIEWS_PATH."home.php");
     }
}
public function update()
{
    $User1=$_SESSION['user'];
    $name=$_POST['name'];
    $lastName=$_POST['lastName'];
    $dni=$_POST["dni"];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $user=new User($name,$lastName, $dni, $email, $password);
    $this->daoUser->Update($user, $User1->getIduser());
    $_SESSION['user']=$user;
    include(VIEWS_PATH."userviews.php");
}

}