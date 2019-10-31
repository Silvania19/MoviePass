<?php
 namespace  controllers;
 use models\Cinema as cinema;
 use daodb\CinemaDao as cinemaD;
 class CinemaControllers
 {
     private $cinemaList;
     public function __construct()
     {
         $this->cinemaList= new cinemaD();
     }

     public function add()
     {
        $idCine=$_POST['idCine'];
        $numberCinema=$_POST['numberCinema'];
        $capacity=$_POST['capacity'];
      
        $newCinema= new cinema($idCine, $numberCinema, $capacity);
       
    $this->cinemaList->Add($newCinema);
        
     }
     public function remove()
     {
         $idCinema=$_POST['idCinema'];
        
        $this->cinemaList->Delete($idCinema);
        
     }
 }
?>