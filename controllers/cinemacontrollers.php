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

     public function add()
     {
        $idCine=$_POST['idCine'];
        $numberCinema=$_POST['numberCinema'];
        $capacity=$_POST['capacity'];
      
        $newCinema= new cinema($idCine, $numberCinema, $capacity);
       
    $this->cinemaList->Add($newCinema);
    $listCine2=$this->cineList->GetAll();
    $listCinema2=$this->cinemaList->GetAll();
    echo" <script>alert('added cinema');</script>" ;
    include(VIEWS_PATH."cinemaviews.php");
    
        
     }
     public function remove()
     {
         $idCinema=$_POST['idCinema'];
        
        $this->cinemaList->Delete($idCinema);
        
        $listCine2=$this->cineList->GetAll();
        $listCinema2=$this->cinemaList->GetAll();
        echo" <script>alert('deleted cinema');</script>" ;
        include(VIEWS_PATH."cinemaviews.php");
 
     }
 }
?>