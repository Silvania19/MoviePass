<?php

namespace controllers;

use models\User as User;
use daosjson\UserDao as userD;
use daodb\CineDao as cineD;
use daodb\CinemaDao as cinemaD;
use daodb\ProjectionDao as ProjectionD;
use daosjson\MovieDao as movieD;
use daodb\PurchaseDao as purchaseD;
use daosjson\GenresDao as genreD;
use controllers\MovieControllers as movieC;
use daodb\TicketDao as tickedD;
use controllers\UserControllers as C_User;
use controllers\ProjectionUserControllers as projectionUC;





class viewscontrollers
{
  private $listCine;
  private $listUser;
  private $listCinema;
  private $listProjection;
  private $listMovie;
  private $usercontroller;
  private $listGenre;
  private $movieContro;
  private $listPurchase;
  private $ticketDA;
  private $projectionUserContro;
  public function __construct()
  {
    $this->listCine = new cineD();
    $this->listUser = new userD();
    $this->listCinema = new cinemaD();
    $this->listProjection = new ProjectionD();
    $this->listMovie = new movieD();
    $this->usercontroller = new C_User();
    $this->listGenre = new genreD();
    $this->movieContro = new movieC();
    $this->listPurchase = new purchaseD();
    $this->ticketDA = new tickedD();
    $this->projectionUserContro = new projectionUC();
  }
  public function index()
  {
    try {
      $user = $this->usercontroller->checkSession();
      if ($user) {

        $projections = $this->listProjection->GetAllActuales();
        $movies = $this->movieContro->SeeMovies();
        $listGenres2 = $this->listGenre->GetAll();
        include(VIEWS_PATH . "home2.php");
      } else {
        include(VIEWS_PATH . "home.php");
      }
    } catch (\Throwable $th) {
      $controlScritpt = 1;
      $message = 'error en la base';
      include(VIEWS_PATH . "home.php");
    }
  }
  public function deleteSession()
  {

    $user = $this->usercontroller->checkSession();
    if ($user) {
      unset($_SESSION['user']); //se usara este porque el destroy destr
      include(VIEWS_PATH . "home.php");
    }
  }
  public function cine()
  {
    try {
      $user = $this->usercontroller->checkSession();

      $listCines = $this->listCine->GetAll();
      include(VIEWS_PATH . "cineviews.php");
    } catch (\Throwable $th) {
      $controlScritpt = 1;
      $message = 'error en la base';
      $projections = $this->listProjection->GetAllActuales();
      $movies = $this->movieContro->SeeMovies();
      $listGenres2 = $this->listGenre->GetAll();
      include(VIEWS_PATH . "home2.php");
    }
  }
  public function seeShopping()
  {
    try {
      $user = $this->usercontroller->checkSession();

      $listPurchase = $this->listPurchase->GetAll();
      $movies = $this->movieContro->SeeMovies();
      $projections = $this->listProjection->getAllActuales();
      include(VIEWS_PATH . "shoppingpurchase.php");
    } catch (\Throwable $th) {
      $controlScritpt = 1;
      $message = 'error en la base';
      $projections = $this->listProjection->GetAllActuales();
      $movies = $this->movieContro->SeeMovies();
      $listGenres2 = $this->listGenre->GetAll();
      include(VIEWS_PATH . "home2.php");
    }
  }
  public function cine2($idCine)
  {

    try {
      $user = $this->usercontroller->checkSession();
      $cine = $this->listCine->Search($idCine);
      $cinemasCine = $this->listCinema->SearchIdCine($idCine);
      include(VIEWS_PATH . "cineviews2.php");
    } catch (\Throwable $th) {
      $controlScritpt = 1;
      $message = 'error en la base';
      $projections = $this->listProjection->GetAllActuales();
      $movies = $this->movieContro->SeeMovies();
      $listGenres2 = $this->listGenre->GetAll();

      include(VIEWS_PATH . "home2.php");
    }
  }

  public function user()
  {
    try {
      $listUsers = $this->listUser->GetAll();
      $user = $this->usercontroller->checkSession();
      if ($user->getIdRol() == 2) {
        include(VIEWS_PATH . "administratorviews.php");
      } else {
        include(VIEWS_PATH . "userviews.php");
      }
    } catch (\Throwable $th) {
      $controlScritpt = 1;
      $message = 'error en la base';
      $projections = $this->listProjection->GetAllActuales();
      $movies = $this->movieContro->SeeMovies();
      $listGenres2 = $this->listGenre->GetAll();

      include(VIEWS_PATH . "home2.php");
    }
  }
  public function cartelera()
  {
    
    try {
      $user = $this->usercontroller->checkSession();
      $cines = $this->listCine->GetAll();
      $cartelera = $this->listProjection->GetAllActuales();
      $movies = $this->listMovie->GetAll();
      include(VIEWS_PATH . "carteleraviews.php");
    } catch (\Throwable $th) {
      $controlScritpt = 1;
      $message = 'error en la base';
      $projections = $this->listProjection->GetAllActuales();
      $movies = $this->movieContro->SeeMovies();
      $listGenres2 = $this->listGenre->GetAll();

      include(VIEWS_PATH . "home2.php");
    }
  }
  public function cartelerauser()
  {
    try {   
       $user = $this->usercontroller->checkSession();
      $cines = $this->listCine->GetAll();
      $cartelera = $this->projectionUserContro->habilitadas();
      $movies = $this->movieContro->SeeMovies();
      include(VIEWS_PATH . "cartelerauser.php");
    } catch (\Throwable $th) {
      $controlScritpt = 1;
      $message = 'error en la base';
      $projections = $this->listProjection->GetAllActuales();
      $movies = $this->movieContro->SeeMovies();
      $listGenres2 = $this->listGenre->GetAll();

      include(VIEWS_PATH . "home2.php");
    }
  }

  public function home2()
  {    
      try {$user = $this->usercontroller->checkSession();

    if ($user) {
        $projections = $this->listProjection->GetAllActuales();
        $movies = $this->movieContro->SeeMovies();
        $listGenres2 = $this->listGenre->GetAll();
        include(VIEWS_PATH . "home2.php");
        }
      } catch (\Throwable $th) {
        $controlScript = 1;
        $message = "Hubo problemas con la verificacion de los datos del usuario. Por favor inicia sesion otra vez. Con datos actuales.";
        include(VIEWS_PATH . "home.php");
      }
    }
  }

