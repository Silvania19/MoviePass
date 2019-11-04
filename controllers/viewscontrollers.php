<?php
namespace controllers;

use models\User as User;
use daodb\UserDao as userD;
use daodb\CineDao as cineD;
use daodb\CinemaDao as cinemaD;
class viewscontrollers
{
    private $listCine;
    private $listUser;
    private $listCinema;
    public function __construct()
    {
        $this->listCine=new cineD();
        $this->listUser=new userD();
        $this->listCinema=new cinemaD();
    }
    public function index()
    {
        
       if(isset($_SESSION['user']))
        {
         $user=$_SESSION['user'];
         include(VIEWS_PATH."home2.php");
        }
        else
       {
        include(VIEWS_PATH."home.php");
       }
       
    }
    public function deleteSession()
    {
        if(isset($_SESSION['user']))
        {
            unset($_SESSION['user']);//se usara este porque el destroy destr
            include(VIEWS_PATH."home.php");
        }
        
    }
    public function cine()
    {
      $listCines=$this->listCine->GetAll();  
      include(VIEWS_PATH."cineviews.php");  
    }
    public function cinemaview()
    {
        $listCine2=$this->listCine->GetAll();
        $listCinema2=$this->listCinema->GetAll();
        include(VIEWS_PATH."cinemaviews.php");    
    }
    public function user()
    {
      $listUsers=$this->listUser->GetAll(); 
      $user=$_SESSION['user'];
      if($user->getIdRol()==2)
      {
        include(VIEWS_PATH."administratorviews.php");  
      }
      else{
          include(VIEWS_PATH."userviews.php");  
      }
    }
    public function cartelera()
    {
      include(VIEWS_PATH."carteleraviews.php");
    }

}
