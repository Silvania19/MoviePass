<?php
namespace controllers;
use models\Projection as projection;
use daodb\ProjectionDao as projectionD;
use daosjson\MovieDao as movieD;
use daosjson\GenresDao as genreD;
use daodb\CineDao as cineD;
use daodb\CinemaDao as cinemaD;
use controllers\MovieControllers as movieC;
use controllers\UserControllers as userC;
class ProjectionControllers
{
   private $listMovie;
   private $listGenre;
   private $listProjection;
   private $listCine;
   private $listCinema;
   private $movieContro;
   private $userContro;
  public function __construct()
  {
     $this->listMovie=new movieD();
     $this->listGenre=new genreD();
     $this->listProjection=new projectionD();
     $this->listCine=new cineD();
     $this->listCinema=new cinemaD();
     $this->movieContro= new movieC();
     $this->userContro= new userC();
  }
  public function addparte1($idCine=null)
  {
       $user=$this->userContro->checkSession();
       $control=1;
       try {
        $listProjection2=$this->listProjection->GetAll();
        $movies=$this->listMovie->GetAll();
       } catch (\Throwable $th) {
        $controlScritpt=1;
        $message='error en la base';
        $projections=$this->listProjection->GetAllActuales();
        $movies=$this->movieContro->SeeMovies();
        $listGenres2=$this->listGenre->GetAll();
        include(VIEWS_PATH."home2.php");
      
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
        $projections=$this->listProjection->GetAllActuales();
        $movies=$this->movieContro->SeeMovies();
        $listGenres2=$this->listGenre->GetAll();

          include(VIEWS_PATH."home2.php");
      }
      
    }
    public function addparte2($datos=null)
    {
      $control2=1;
      include(VIEWS_PATH."carteleraviews.php");
    
    }
  public function addparte3($datos=null, $date=null)
  { 
     $user=$this->userContro->checkSession();
      $array=explode("+", $datos);
    
      $control3=1;
      try {
          $projection=$this->listProjection->SearchXMovieXCineXDate($array['0'], $array['1'], $date);
          $projectionOfDate=$this->listProjection->SearchXCineXDate($array['1'], $date);
          if(!empty($projection))
          { 
              if(is_object($projection))
              {
              
                  $cinema=$this->listCinema->Search($projection->getIdCinema()); 
                 
                  $datos=$datos."+".$date;
                  
                  include(VIEWS_PATH."carteleraviews.php");
              }
          }
          if(!empty($projectionOfDate) && empty($cinema))
          {
            
              $listCinemas2=$this->listCinema->SearchIdCine($array['1']);
              $datos=$datos."+".$date;
              include(VIEWS_PATH."carteleraviews.php");
          
          }
          if(empty($projection)&& empty($projectionOfDate) && empty($cinema))
          {
            
            $listCinemas2=$this->listCinema->SearchIdCine($array['1']);
            
            $datos=$datos."+".$date;
            include(VIEWS_PATH."carteleraviews.php");
          }
        
      } catch (\Throwable $th) {
       
        $controlScritpt=1;
        $message='error en la base';
        $projections=$this->listProjection->GetAllActuales();
        $movies=$this->movieContro->SeeMovies();
        
        $listGenres2=$this->listGenre->GetAll();

        include(VIEWS_PATH."home2.php");

      }
  
  }
 
  public function addProjection($datos=null, $cinemahour=null)
  {
    var_dump($cinemahour);
    $arrayDatos=explode("+", $datos);
    $arrayCinemaHour=explode("+", $cinemahour);
    $idMovie=$arrayDatos['0'];
    $idCine=$arrayDatos['1'];
    $date=$arrayDatos['2'];
    $idCinema=$arrayCinemaHour['0'];
    $hour=$arrayCinemaHour['1'];
    $veri=0;
    $duration=0;
    try {
      $cartelera=$this->listProjection->GetAll();
    $cines=$this->listCine->GetAll();
    $movies=$this->listMovie->GetAll();
    } catch (\Throwable $th) {
      $controlScritpt=1;
      $message='error en la base';
      $projections=$this->listProjection->GetAllActuales();
      $movies=$this->movieContro->SeeMovies();
      $listGenres2=$this->listGenre->GetAll();

    include(VIEWS_PATH."home2.php");
    }
  
 
    if(is_array($cartelera))
    {
      foreach($cartelera as $projection)
      {
        if($projection->getDate()==$date && $projection->getIdMovie()==$idMovie && $veri==0){
          if($projection->getIdCine() != $idCine  )
          {
           
               $veri=1;
            
            
          }
        

        }
      }
    }
    if(is_object($cartelera))
    {
      if($cartelera->getDate()==$date && $cartelera->getIdMovie()==$idMovie  && $veri==0)
      {
        if($cartelera->getIdCine() != $idCine  ){
        
             $veri=1;
          
         
        }
       
        
      }
    }
  
    if($veri==1)
    {
      $controlScript=1;
      $message='no se puede agregar en este fecha y/o horario. Verifique que la fecha y/o horario ingresado no sea igual a la de otro cine, o otro horario';
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

          $controlScript=1;
          $message='added projection';
          include(VIEWS_PATH."carteleraviews.php");
          } catch (\PDOException $th)
          {
            echo 'hoo';
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
      $controlScript=1;
      $message='deleted projection';
      include(VIEWS_PATH."carteleraviews.php");
      } catch (\Throwable $th) {
      $controlScript=1;
      $message='no se puede elimina esta proyeccion porque tiene entrandas vendidas';
      $cines=$this->listCine->GetAll();
      $cartelera=$this->listProjection->GetAll();
      $movies=$this->listMovie->GetAll();
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
        $projections=$this->listProjection->GetAllActuales();
          $movies=$this->movieContro->SeeMovies();
          $listGenres2=$this->listGenre->GetAll();

        include(VIEWS_PATH."home2.php");
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
  
    public function filterGenre($idCine=null, $idGenre=NULL)
    {
    
          $control=1;
          try {
              $listProjection2=$this->listProjection->GetAll();
              $movies=$this->listMovie->GetAll();
          } catch (\Throwable $th) {
            $controlScritpt=1;
          $message='error en la base';
          $projections=$this->listProjection->GetAllActuales();
          $movies=$this->movieContro->SeeMovies();
          $listGenres2=$this->listGenre->GetAll();
  
          include(VIEWS_PATH."home2.php");
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
        $projections=$this->listProjection->GetAllActuales();
          $movies=$this->movieContro->SeeMovies();
          $listGenres2=$this->listGenre->GetAll();

        include(VIEWS_PATH."home2.php");
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
          $projections=$this->listProjection->GetAllActuales();
          $movies=$this->movieContro->SeeMovies();
          $listGenres2=$this->listGenre->GetAll();

        include(VIEWS_PATH."home2.php");
        }
        
  
    
 }


}

?>