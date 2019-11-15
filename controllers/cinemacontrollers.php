<?php
 namespace  controllers;
 use models\Cinema as cinema;
 use daodb\CinemaDao as cinemaD;
 use daodb\CineDao as cineD;
 use controllers\UserControllers as userC;
 class CinemaControllers
 {
     private $cinemaList;
     private $cineList;
     private $userControlllers;
     public function __construct()
     {
         $this->cinemaList= new cinemaD();
         $this->cineList= new cineD();
         $this->userControllers= new userC();
     }

     public function add($nameCinema=null, $capacity=null, $price=null,  $idCine=null)
     {
       
      
        $newCinema= new cinema($idCine, $nameCinema, $capacity,$price);
        $this->cinemaList->Add($newCinema);
       
       
        $user=$this->userControllers->checkSession();
        $listCines=$this->cineList->GetAll();  
       
        echo" <script>alert('added cinema');</script>" ;
        include(VIEWS_PATH."cineviews.php"); 
    
        
     }
     public function remove($idCinema=null,$verificacion=null)
     { 
        $user=$this->userControllers->checkSession();
        if($verificacion=='si')
        {
        $this->cinemaList->Delete($idCinema);
       
        $listCines=$this->cineList->GetAll();  
        echo" <script>alert('deleted cinema');</script>" ;
        include(VIEWS_PATH."cineviews.php");
         }
         else if($verificacion=='no')
         {
            include(VIEWS_PATH."cineviews.php");
         }
       
 
     }
 }
?>