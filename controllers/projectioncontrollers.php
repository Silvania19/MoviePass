<?php
namespace controllers;
use models\Projection as projection;
use daodb\ProjectionDao as projectionD;
use daosjson\MovieDao as movieD;
use daosjson\GenresDao as genreD;
use daodb\CineDao as cineD;
class ProjectionControllers
{
   private $listMovie;
   private $listGenre;
   private $listProjection;
   private $listCine;
  public function __construct()
  {
     $this->listMovie=new movieD();
     $this->listGenre=new genreD();
     $this->listProjection=new projectionD();
     $this->listCine=new cineD();
  }
 public function addparte1()
 {
   $idCine=$_POST['idCine'];
   $control=1;
   $listProjection2=$this->listProjection->GetAll();
   $listMovie2=$this->listMovie->GetAll();
   $listGenres2=$this->listGenre->GetAll();
   include(VIEWS_PATH."carteleraviews.php");
 }
 public function addparte2()
 {
  $datos=$_POST['datos'];
  $control2=1;

  include(VIEWS_PATH."carteleraviews.php");
 }
 public function addProjection()
 {
  $datos=$_POST['datos'];

  $date=$_POST['date'];
  $hour=$_POST['hour'];
  $array=explode("-", $datos);
  $idMovie=$array['0'];
  $idCine=$array['1'];

   $projection= new projection($date, $hour, $idCine, $idMovie);
   $this->listProjection->Add($projection);
   $cines=$this->listCine->GetAll();
    $cartelera=$this->listProjection->GetAll();
    $movies=$this->listMovie->GetAll();
  echo" <script>alert('added projection');</script>" ;
    include(VIEWS_PATH."carteleraviews.php");
 }
 public function delete()
 {
   $idProjection=$_POST["idProjection"];
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