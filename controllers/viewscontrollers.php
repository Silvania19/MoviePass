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

        if(isset($user))
        {
            unset($user);//se usara este porque el destroy destr
            include(VIEWS_PATH."home.php");
        }
        
    }
    public function cine()
    {
      $user=$this->usercontroller->checkSession();
      $listCines=$this->listCine->GetAll();  
      include(VIEWS_PATH."cineviews.php");  
    }
    public function cine2($idCine)
    {
      $user=$this->usercontroller->checkSession();
      $cine=$this->listCine->Search($idCine);
      $cinemasCine=$this->listCinema->SearchIdCine($idCine);
      include(VIEWS_PATH."cineviews2.php");  
    }

    public function user()
    {
      $listUsers=$this->listUser->GetAll(); 
      $user=$this->usercontroller->checkSession();
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
      $cines=$this->listCine->GetAll();
      $cartelera=$this->listProjection->GetAllActuales();
      $movies=$this->listMovie->GetAll();
      include(VIEWS_PATH."carteleraviews.php");

    }
    public function cartelerauser()
    {
      $user=$this->usercontroller->checkSession();
      $cines=$this->listCine->GetAll();
      $cartelera=$this->listProjection->GetAllActuales();
      $movies=$this->SeeMovies();
      include(VIEWS_PATH."cartelerauser.php");
    }

  

}
