<?php
 namespace  controllers;
 use models\Cinema as cinema;
 use daodb\CinemaDao as cinemaD;
 use daodb\CineDao as cineD;
 class CinemaControllers
 {
     private $cinemaList;
     private $cineList;
     public function __construct()
     {
         $this->cinemaList= new cinemaD();
         $this->cineList= new cineD();
     }

     public function add( $idCine=null, $nameCinema=null, $capacity=null)
     {
       
      
        $newCinema= new cinema($idCine, $nameCinema, $capacity);
        $this->cinemaList->Add($newCinema);
        $listCine2=$this->cineList->GetAll();
        $listCinema2=$this->cinemaList->GetAll();
        echo" <script>alert('added cinema');</script>" ;
        include(VIEWS_PATH."cinemaviews.php");
    
        
     }
     public function remove( $idCinema=null)
     {
        $this->cinemaList->Delete($idCinema);
        
        $listCine2=$this->cineList->GetAll();
        $listCinema2=$this->cinemaList->GetAll();
        echo" <script>alert('deleted cinema');</script>" ;
        include(VIEWS_PATH."cinemaviews.php");
 
     }
 }
?>