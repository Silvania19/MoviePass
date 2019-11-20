<?php
namespace controllers;

use models\User as User;
use daosjson\UserDao as userD;
use daodb\CineDao as cineD;
use daodb\CinemaDao as cinemaD;
use daodb\ProjectionDao as ProjectionD;
use daosjson\MovieDao as movieD;
use daosjson\GenresDao as genreD;
use controllers\MovieControllers as movieC;
use controllers\UserControllers as C_User;
class viewscontrollers
{
    private $listCine;
    private $listUser;
    private $listCinema;
    private $listProjection;
    private $listMovie;
    private $usercontroller;
    private $listGenres;
    private $movieContro;
    public function __construct()
    {
        $this->listCine=new cineD();
        $this->listUser=new userD();
        $this->listCinema=new cinemaD();
        $this->listProjection= new ProjectionD();
        $this->listMovie=new movieD();
        $this->usercontroller= new C_User();
        $this->listGenres= new genreD();
        $this->movieContro=new movieC();
    }
    public function index()
    {  
      $user = $this->usercontroller->checkSession();
       if($user)
        {
         
         
          $projections=$this->listProjection->GetAllActuales();
          $movies=$this->movieContro->SeeMovies();
          $listGenres2=$this->listGenres->GetAll();
          include(VIEWS_PATH."home2.php");
        }
        else
       {
        include(VIEWS_PATH."home.php");
       }
       
      
    }
    public function deleteSession()
    {
     
      $user = $this->usercontroller->checkSession();
      if($user)
        {
            unset($_SESSION['user']);//se usara este porque el destroy destr
            include(VIEWS_PATH."home.php");
        }
        
    }
    public function cine()
    {
      $user=$this->usercontroller->checkSession();
      try {
        $listCines=$this->listCine->GetAll();  
      include(VIEWS_PATH."cineviews.php"); 
      } catch (\Throwable $th) {
        $controlScritpt=1;
        $message='error en la base';
        include(VIEWS_PATH."cineviews.php");
      }
       
    }
    public function cine2($idCine)
    {
      $user=$this->usercontroller->checkSession();
      try {
        $cine=$this->listCine->Search($idCine);
        $cinemasCine=$this->listCinema->SearchIdCine($idCine);
      } catch (\Throwable $th) {
        $controlScritpt=1;
        $message='error en la base';
        include(VIEWS_PATH."cineviews.php");
      }
      
       
    }

    public function user()
    {
      try {
         $listUsers=$this->listUser->GetAll(); 
      $user=$this->usercontroller->checkSession();
      } catch (\Throwable $th) {
        $controlScritpt=1;
        $message='error en la base';
      
      }
     
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
      $user=$this->usercontroller->checkSession();
      try {
         $cines=$this->listCine->GetAll();
      $cartelera=$this->listProjection->GetAllActuales();
      $movies=$this->listMovie->GetAll();
      include(VIEWS_PATH."carteleraviews.php");
      } catch (\Throwable $th) {
        $controlScritpt=1;
        $message='error en la base';
        include(VIEWS_PATH."carteleraviews.php");
      }
     

    }
    public function cartelerauser()
    {
      $user=$this->usercontroller->checkSession();
      try {
         $cines=$this->listCine->GetAll();
      $cartelera=$this->listProjection->GetAllActuales();
      $movies=$this->movieContro->SeeMovies();
      include(VIEWS_PATH."cartelerauser.php");
      } catch (\Throwable $th) {
        $controlScritpt=1;
        $message='error en la base';
        include(VIEWS_PATH."cartelerauser.php");
      }
     
      
    }

    public function home2()
    {
      $user=$this->usercontroller->checkSession();
      if($user)
      {
          try {
             $projections=$this->listProjection->GetAllActuales();
          $movies=$this->movieContro->SeeMovies();
          $listGenres2=$this->listGenres->GetAll();
          include(VIEWS_PATH."home2.php");
          } catch (\Throwable $th) {
           $controlScript=1;
        $message="Hubo problemas con la verificacion de los datos del usuario. Por favor inicia sesion otra vez. Con datos actuales.";
        include(VIEWS_PATH."home.php");
          }
         
      }
    
    }

  

}
