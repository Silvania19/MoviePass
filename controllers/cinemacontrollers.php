<?php
 namespace  controllers;
 use models\Cinema as cinema;
 use daodb\CinemaDao as cinemaD;
 use daodb\CineDao as cineD;
 use daodb\ProjectionDao as projectionD;
 use controllers\UserControllers as userC;
 use daosjson\GenresDao as genreD;
 use controllers\MovieControllers as movieC;

 class CinemaControllers
 {
     private $cinemaList;
     private $cineList;
     private $projectionList;
     private $userControlllers;
     private $listGenre;
     private $movieContro;
     public function __construct()
     {
         $this->cinemaList= new cinemaD();
         $this->cineList= new cineD();
         $this->userControllers= new userC();
         $this->projectionList= new projectionD();
         $this->listGenre= new genreD();
         $this->movieContro= new movieC();
     }
  
  
     public function add($nameCinema=null, $capacity=null, $price=null,  $idCine=null)
     {
       
        $controlScript=1;
        $newCinema= new cinema($idCine, $nameCinema, $capacity,$price);
        try {
           $this->cinemaList->Add($newCinema); 
        $user=$this->userControllers->checkSession();
        $listCines=$this->cineList->GetAll();  
        $message='added cinema';
        include(VIEWS_PATH."cineviews.php"); 
      
        } catch (\Throwable $th) {
          $controlScritpt=1;
         $message='error en la base';
         include(VIEWS_PATH."cineviews2.php");
        }
       
       
    
        
     }
     public function remove($verificacion=null)
     { 

        $user=$this->userControllers->checkSession();
        if($verificacion=='no')
        {
      
          try {
             $listCines=$this->cineList->GetAll(); 
            include(VIEWS_PATH."cineviews.php");
          } catch (\Throwable $th) {
            $controlScritpt=1;
            $message='error en la base';
            $projections=$this->projectionList->GetAllActuales();
            $movies=$this->movieContro->SeeMovies();
            $listGenres2=$this->listGenre->GetAll();
            include(VIEWS_PATH."home2.php");
          }
       
         
        }
        else
        {
          $idCinema=$verificacion;
          try {
             $projectionL= $this->projectionList->GetAll();
          } catch (\Throwable $th) {
            $controlScritpt=1;
            $message='error en la base';
            $projections=$this->projectionList->GetAllActuales();
            $movies=$this->movieContro->SeeMovies();
            $listGenres2=$this->listGenre->GetAll();
            include(VIEWS_PATH."home2.php");
          }
         

          foreach($projectionL as $projection)
          {
              if($projection->getIdCinema()==$idCinema)
              {
                try {
                  $this->projectionList->Delete($projection->getIdProjection());
                } catch (\Throwable $th) {
                  $controlScritpt=1;
                  $message='error en la base';
                  $projections=$this->projectionList->GetAllActuales();
                  $movies=$this->movieContro->SeeMovies();
                  $listGenres2=$this->listGenre->GetAll();
                  include(VIEWS_PATH."home2.php");
                }
                  
              }
          }
          try {
          $this->cinemaList->Delete($idCinema);
          $listCines=$this->cineList->GetAll();
          $controlScript=1;
          $message='deleted cinema';
          include(VIEWS_PATH."cineviews.php");
          } catch (\Throwable $th) {
            $controlScritpt=1;
                  $message='error en la base';
                  $projections=$this->projectionList->GetAllActuales();
                  $movies=$this->movieContro->SeeMovies();
                  $listGenres2=$this->listGenre->GetAll();
                  include(VIEWS_PATH."home2.php");
          }
          
        }
       
 
     }
     public function updateParte1($idCinema=null)
     {
      $user=$this->userControllers->checkSession();
       $controlUpdateCinema=1;
       $cinema= $this->cinemaList->Search($idCinema);
       include(VIEWS_PATH.'cineviews2.php');

     }
     public function update($name=null, $capacity=null, $price=null, $idCineAndCinema=null)
     {
       $user=$this->userControllers->checkSession();
       $array=explode("+", $idCineAndCinema);
       $idCine=$array['1'];
       $idCinema=$array['0'];
        $cinemaupdate= new cinema($idCine, $name, $capacity, $price );
       try {
        $this->cinemaList->Update($cinemaupdate, $idCinema);
        include(VIEWS_PATH.'cineviews2.php');
       } catch (\Throwable $th) {
                $controlScritpt=1;
                  $message='error en la base';
                  $projections=$this->projectionList->GetAllActuales();
                  $movies=$this->movieContro->SeeMovies();
                  $listGenres2=$this->listGenre->GetAll();
                  include(VIEWS_PATH."home2.php");
       }
        
     }


}
?>