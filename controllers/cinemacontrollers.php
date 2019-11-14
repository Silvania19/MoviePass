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

     public function add($nameCinema=null, $capacity=null, $idCine=null, $price=null)
     {
       
      
        $newCinema= new cinema($idCine, $nameCinema, $capacity,$price);
        $this->cinemaList->Add($newCinema);
       
       
        $user=$_SESSION['user'];
        $listCines=$this->cineList->GetAll();  
       
        echo" <script>alert('added cinema');</script>" ;
        include(VIEWS_PATH."cineviews.php"); 
    
        
     }
     public function remove($idCinema=null)
     {
        $this->cinemaList->Delete($idCinema);
        $user=$_SESSION['user'];
        $listCines=$this->cineList->GetAll();  
        echo" <script>alert('deleted cinema');</script>" ;
        include(VIEWS_PATH."cineviews.php");
 
     }
 }
?>