<?php
namespace controllers;
use models\Projection as projection;
use daodb\ProjectionDao as projectionD;
use daosjson\MovieDao as movieD;
use daosjson\GenresDao as genreD;
use daodb\CineDao as cineD;
use daodb\CinemaDao as cinemaD;
class ProjectionControllers
{
   private $listMovie;
   private $listGenre;
   private $listProjection;
   private $listCine;
   private $listCinema;
  public function __construct()
  {
     $this->listMovie=new movieD();
     $this->listGenre=new genreD();
     $this->listProjection=new projectionD();
     $this->listCine=new cineD();
     $this->listCinema=new cinemaD();
  }
 public function addparte1($idCine=null)
 {
  
   $control=1;
   $listProjection2=$this->listProjection->GetAll();
   $listMovie2=$this->listMovie->GetAll();
   $listGenres2=$this->listGenre->GetAll();
   include(VIEWS_PATH."carteleraviews.php");
 }
 public function addparte2($datos=null)
 {
  $array=explode("-", $datos);
  $control2=1;
  $listCinemas2=$this->listCinema->SearchIdCine($array['1']);
  include(VIEWS_PATH."carteleraviews.php");
 }
 public function addProjection($datos=null, $date=null, $hour=null)
 {
  
  $array=explode("-", $datos);
  $idMovie=$array['0'];
  $idCine=$array['1'];
  $veri=0;
  $duration=0;
  $cartelera=$this->listProjection->GetAll();
  $cines=$this->listCine->GetAll();
  $movies=$this->listMovie->GetAll();
 
  
  foreach($cartelera as $projection)
  {
    if($projection->getDate()==$date && $projection->getIdMovie()==$idMovie){

      $veri=1;
  }
  
      
  }
  if($veri==1)
  {
    echo" <script>alert('no se puede agregar en este fecha. Verifique que la fecha ingresada no sea igual a la de otro de cine');</script>" ;
    include(VIEWS_PATH."carteleraviews.php");
  }
  else
  {
      foreach($movies as $movie)
      {
        if($movie->getIdMovie()=$idMovie)
        {
            $duration=$hour+$movie->getDuration();
        }
      }
      $projection= new projection($date, $hour, $idCine, $idMovie);
      $this->listProjection->Add($projection);
       echo" <script>alert('added projection');</script>" ;
       include(VIEWS_PATH."carteleraviews.php");
    
  }

 }
 public function delete($idProjection=null)
 {
  
   $this->listProjection->Delete($idProjection);
   $cines=$this->listCine->GetAll();
   $cartelera=$this->listProjection->GetAll();
   $movies=$this->listMovie->GetAll();
   echo" <script>alert('deleted projection');</script>" ;
   include(VIEWS_PATH."carteleraviews.php");
 }
 public function exist($idMovie, $idCine)
  {
   
      $projections= $this->listProjection->SearchXCine($idCine);
      $retorno=false;
      if($projections !=false){
      if(is_array($projections))
      {
        foreach ($projections as $value)
         {
           
         
            if($value->getIdMovie()==$idMovie) 
             {
               
              $retorno= true;
             }

        }
      
      }
      if(is_object($projections))
      {
        if($projections->getIdMovie()==$idMovie)
        {
          $retorno= true;
        }
       
      }
    }
    else 
    {
      $retorno= false;
    }
    return $retorno;
  }

}

?>