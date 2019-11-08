<?php
namespace controllers;
use models\Cine as cine;
use daodb\CineDao as cineD;
use daodb\CinemaDao as cinemaD;
class CineControllers
{
    private $cineRepo;//esta variable, sera aquella aque le iguale lo que traiga de la base de datos. Cuando la tenga
    private $cinemaList;
    public function __construct()
    {
        $this->cineRepo= new cineD();// sera reemplazado por una instancia de la clases donde tenga  la base correspondiente
        $this->cinemaList= new cinemaD();
     }
    
    public function add()
    { 
      $name=$_POST['name']; 
      
      $address=$_POST['address'];
      $user=$_SESSION['user'];
      $cine=new cine($name,  $user->getIdUser(), $address);
      $this->cineRepo->Add($cine);
      $listCines=$this->cineRepo->GetAll();
      echo" <script>alert('added cine');</script>" ;
      include(VIEWS_PATH."cineviews.php");
      
    }

    public function update()
    {
      $name=$_POST['name']; 
     
      $address=$_POST['address'];
      $user=$_SESSION['user'];
      $IdCine=$_POST['idCine'];
      $cine=new cine($name, $user->getIdUser(),  $address);
      $this->cineRepo->Update($cine, $idCine);
      $listCines=$this->cineRepo->GetAll();
      echo" <script>alert('updated cine');</script>" ;
      include(VIEWS_PATH."cineviews.php");
      
    }

    public function remove()
    {

      $idCine=$_POST['idCine'];
      $listCinema=$this->cinemaList->GetAll();
     foreach($listCinema as $cinema)
     {
         if($cinema->getIdCine()==$idCine)
         {
             $this->cinemaList->Delete($cinema->getIdCinema());
         }
     }
     $this->cineRepo->Delete($idCine);
     $listCines=$this->cineRepo->GetAll();
     echo" <script>alert('deleted cine');</script>" ;
     include(VIEWS_PATH."cineviews.php");
     
    }
}