<?php
namespace controllers;

use models\User as User;
use daodb\UserDao as userD;
use daodb\CineDao as cineD;
use daodb\CinemaDao as cinemaD;
use daodb\ProjectionDao as ProjectionD;
use daosjson\MovieDao as movieD;
use controllers\UserControllers as C_User;
class viewscontrollers
{
    private $listCine;
    private $listUser;
    private $listCinema;
    private $listProjection;
    private $listMovie;
    private $usercontroller;
    public function __construct()
    {
        $this->listCine=new cineD();
        $this->listUser=new userD();
        $this->listCinema=new cinemaD();
        $this->listProjection= new ProjectionD();
        $this->listMovie=new movieD();
        $this->usercontroller= new C_User();
       
    }
    public function index()
    {
      
      $user = $this->usercontroller->checkSession();
        
       if($user)
        {
        $projections=$this->listProjection->GetAll();
        $movies=$this->listMovie->GetAll();
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
    public function cinemaview()
    {
        $listCine2=$this->listCine->GetAll();
        $listCinema2=$this->listCinema->GetAll();
        include(VIEWS_PATH."cinemaviews.php");    
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
      $cines=$this->listCine->GetAll();
      $cartelera=$this->listProjection->GetAllActuales();
      $movies=$this->listMovie->GetAll();
      include(VIEWS_PATH."carteleraviews.php");

    }
    public function cartelerauser()
    {
      $cines=$this->listCine->GetAll();
      $cartelera=$this->listProjection->GetAll();
      $movies=$this->listMovie->GetAll();
      include(VIEWS_PATH."cartelerauser.php");
    }

    public function SeeMovies()
    {
      
      $movies=$this->listMovie->GetAll();
      $resulMovie=array();
      if(isset($movies))
      {
        foreach($movies as $movie)
        {
          if($this->listProjection->SearchXMovie($movie->getIdMovie()))
          {
            
              array_push($resulMovie, $movie);
          }
        }
      }
      return $resulMovie;
    }

}
