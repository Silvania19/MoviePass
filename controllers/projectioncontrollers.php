<?php
namespace controllers;
use models\Projection as projection;
use daodb\ProjectionDao as projectionD;
use daosjson\MovieDao as movieD;
use daosjson\GenresDao as genreD;
use daodb\CineDao as cineD;
use daodb\CinemaDao as cinemaD;
use controllers\MovieControllers as movieC;
class ProjectionControllers
{
   private $listMovie;
   private $listGenre;
   private $listProjection;
   private $listCine;
   private $listCinema;
   private $movieContro;
  public function __construct()
  {
     $this->listMovie=new movieD();
     $this->listGenre=new genreD();
     $this->listProjection=new projectionD();
     $this->listCine=new cineD();
     $this->listCinema=new cinemaD();
     $this->movieContro= new movieC();
  }
 public function addparte1($idCine=null)
 {

       $control=1;
       try {
          $listProjection2=$this->listProjection->GetAll();
   $movies=$this->listMovie->GetAll();
       } catch (\Throwable $th) {
        $controlScritpt=1;
        $message='error en la base';
       // include(VIEWS_PATH."userviews.php");
       }
  
   $listMovies2= array();
   foreach($movies as $movie)
   {
     if($this->exist($movie->getIdMovie(), $idCine)==false)
     {
       array_push($listMovies2, $movie);
     }
   }
   try {
      $listGenres2=$this->listGenre->GetAll();
   include(VIEWS_PATH."carteleraviews.php");
   } catch (\Throwable $th) {
    $controlScritpt=1;
    $message='error en la base';
    //include(VIEWS_PATH."userviews.php");
   }
  
 }
 public function addparte2($datos=null)
 {
  $array=explode("+", $datos);
  $control2=1;
  try {
    $listCinemas2=$this->listCinema->SearchIdCine($array['1']);
  include(VIEWS_PATH."carteleraviews.php");
  } catch (\Throwable $th) {
    $controlScritpt=1;
    $message='error en la base';
    include(VIEWS_PATH."carteleraviews.php");
  }
  

  
  

 }
 public function addparte3($datos=null, $date=null)
 {
  
  $array=explode("+", $datos);
  $control3=1;
  try {
    $projection=$this->listProjection->SearchXMovieXCineXDate($array['0'], $array['1'], $date);

  } catch (\Throwable $th) {
    $controlScritpt=1;
         $message='error en la base';
        // include(VIEWS_PATH."userviews.php");
  }
  

  if(is_object($projection))
  {
    try {
        $listCinemas2=$this->listCinema->Search($projection->getIdCinema()); 
    
    $datos=$datos."+".$date;
     include(VIEWS_PATH."carteleraviews.php");
    } catch (\Throwable $th) {
      $controlScritpt=1;
      $message='error en la base';
     // include(VIEWS_PATH."userviews.php");
    }
  
  }
  else
  {
    try {
       $listCinemas2=$this->listCinema->SearchIdCine($array['1']);
     $datos=$datos."+".$date;
     include(VIEWS_PATH."carteleraviews.php");
    } catch (\Throwable $th) {
      $controlScritpt=1;
      $message='error en la base';
     // include(VIEWS_PATH."userviews.php");
    }
   
  }
 
  } catch (\Throwable $th) {
     $array=explode("+", $datos);
  $control3=1;
  $projection=$this->listProjection->SearchXMovieXCineXDate($array['0'], $array['1'], $date);


  if(is_object($projection))
  {
    try {
         $listCinemas2=$this->listCinema->Search($projection->getIdCinema());
    $datos=$datos."+".$date;
     include(VIEWS_PATH."carteleraviews.php");
    } catch (\Throwable $th) {
      $controlScritpt=1;
      $message='error en la base';
      //include(VIEWS_PATH."userviews.php");
    }
 
  }
  else
  {
    try {
       $listCinemas2=$this->listCinema->SearchIdCine($array['1']);
     $datos=$datos."+".$date;
     include(VIEWS_PATH."carteleraviews.php");
    } catch (\Throwable $th) {
      $controlScritpt=1;
      $message='error en la base';
      //include(VIEWS_PATH."userviews.php");
    }
   
  }
 
 }
 public function addProjection($datos=null, $hour=null, $idCinema)
 {
  
  $array=explode("+", $datos);
 
  $idMovie=$array['0'];
  $idCine=$array['1'];
  $date=$array['2'];
  $veri=0;
  $duration=0;
  try {
    $cartelera=$this->listProjection->GetAll();
  $cines=$this->listCine->GetAll();
  $movies=$this->listMovie->GetAll();
  } catch (\Throwable $th) {
    $controlScritpt=1;
    $message='error en la base';
   // include(VIEWS_PATH."userviews.php");
  }
  
 
  if(is_array($cartelera))
  {
    foreach($cartelera as $projection)
    {
      if($projection->getDate()==$date && $projection->getIdMovie()==$idMovie){

        $veri=1;
      }
    }
  }
  if(is_object($cartelera))
  {
    if($cartelera->getDate()==$date && $cartelera->getIdMovie()==$idMovie)
    {
      $veri=1;
    }
  }
 
  if($veri==1)
  {
    $controlScript=1;
   $message='no se puede agregar en este fecha. Verifique que la fecha ingresada no sea igual a la de otro de cine';
    include(VIEWS_PATH."carteleraviews.php");
  }
  else
  {
     /* foreach($movies as $movie)
      {
        if($movie->getIdMovie()=$idMovie)
        {
            $duration=$hour+$movie->getDuration();
        }
      }*/
     
       
      try
       { 
        $projection= new projection($date, $hour, $idCine, $idMovie, $idCinema, $duration);
        $this->listProjection->Add($projection);
        include(VIEWS_PATH."carteleraviews.php");
       } 
       catch (\PDOException $th)
        {
        $controlScript=1;
        $message='added projection';
        include(VIEWS_PATH."carteleraviews.php");
        }
  }

 }
 



 public function delete($idProjection=null)
 {
    try {
      $this->listProjection->Delete($idProjection);
    $cines=$this->listCine->GetAll();
    $cartelera=$this->listProjection->GetAll();
    $movies=$this->listMovie->GetAll();
    include(VIEWS_PATH."carteleraviews.php");
    } catch (\Throwable $th) {
      $controlScript=1;
    $message='deleted projection';
    include(VIEWS_PATH."carteleraviews.php");
    }
  
  
 }

 
 public function exist($idMovie, $idCine)
  {
    try {
       $projections= $this->listProjection->SearchXCine($idCine);
    } catch (\Throwable $th) {
      $controlScritpt=1;
      $message='error en la base';
      //include(VIEWS_PATH."userviews.php");
    }
      
      $retorno=false;
      $movies=array();
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
  
   public function filterGenre($idCine=null, $idGenre)
 {
  
        $control=1;
        try {
            $listProjection2=$this->listProjection->GetAll();
            $movies=$this->listMovie->GetAll();
        } catch (\Throwable $th) {
          $controlScritpt=1;
         $message='error en la base';
         //include(VIEWS_PATH."userviews.php");
        }
  
    $listMovies2= array();
    $filter=array();
    foreach($movies as $movie)
    {
      if($this->exist($movie->getIdMovie(), $idCine)==false)
      {
        array_push($listMovies2, $movie);
      }
    }
    
    if(!empty($listMovies2))
    {
      $filter=$this->movieContro->filterGenres($listMovies2, $idGenre);
      
      }
      $listMovies2=array();
    try {
       $listGenres2=$this->listGenre->GetAll();
    include(VIEWS_PATH."carteleraviews.php");
    } catch (\Throwable $th) {
      $controlScritpt=1;
      $message='error en la base';
      //include(VIEWS_PATH."userviews.php");
    }
   
  
  
 }
 public function filterDate($idCine=null,  $date=null)
 {
 
      $control=1;
   $listProjection2=$this->listProjection->GetAll();
   $movies=$this->listMovie->GetAll();
   $listMovies2= array();
   $filter=array();
   foreach($movies as $movie)
   {
     if($this->exist($movie->getIdMovie(), $idCine)==false)
     {
       array_push($listMovies2, $movie);
     }
   }
   
   if(!empty($listMovies2))
   {
     $filter=$this->movieContro->filterDate($listMovies2, $date);
     
    }
    $listMovies2=array();
       try {
          $listGenres2=$this->listGenre->GetAll();
       include(VIEWS_PATH."carteleraviews.php");
       } catch (\Throwable $th) {
        $controlScritpt=1;
        $message='error en la base';
        //include(VIEWS_PATH."userviews.php");
       }
      
 
  
 }


}

?>