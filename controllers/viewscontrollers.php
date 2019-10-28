<?php
namespace controllers;

use models\User as User;
use daosjson\UserDao as userD;
use daosjson\CineDao as cineD;

class viewscontrollers
{
    private $listCine;
    private $listUser;
    public function __construct()
    {
        $this->listCine=new cineD();
        $this->listUser=new userD();
    }
    public function index()
    {
        
       // if(isset($_SESSION['user']))
        //{
          //  $user=$_SESSION['user'];
        //    include(VIEWS_PATH."home2.php");
      //  }
        //else
        //{
             include(VIEWS_PATH."home.php");
      //  }
       
    }
    public function deleteSession()
    {
        if(isset($_SESSION['user']))
        {
            session_start();
            session_destroy();
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
        include(VIEWS_PATH."cinemaviews.php");    

    }
    public function user()
    {
      $listUsers=$this->listUser->GetAll(); 

     include(VIEWS_PATH."userviews.php");  
    
    }

}
