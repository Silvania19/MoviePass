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
   $listMovie2=$this->listMovie->getNowMovie();
   $listGenres2=$this->listGenre->GetAll();
   include(VIEWS_PATH."carteleraviews.php");
 }
 public function addparte2()
 {
  $datos=$_POST['idMovie'];
  $control2=1;

  include(VIEWS_PATH."carteleraviews.php");
 }
 public function add()
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
    $movies=$this->listMovie->getNowMovie();
    echo" <script>alert('added projection');</script>" ;
    include(VIEWS_PATH."carteleraviews.php");
 }
 public function delete()
 {
   $idProjection=$_POST["idProjection"];
   $this->listProjection->Delete($idProjection);
   $cines=$this->listCine->GetAll();
   $cartelera=$this->listProjection->GetAll();
   $movies=$this->listMovie->getNowMovie();
   echo" <script>alert('deleted projection');</script>" ;
   include(VIEWS_PATH."carteleraviews.php");
 }

}

?>