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
     private $projectionList;
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
     public function remove($verificacion=null)
     { 

        $user=$this->userControllers->checkSession();
        if($verificacion=='no')
        {
      
        $listCines=$this->cineList->GetAll(); 
        include(VIEWS_PATH."cineviews.php");
         
        }
        else
        {
          $idCinema=$verificacion;
          $projectionL= $this->projectionList->GetAll();

          foreach($projectionL as $projection)
          {
              if($projection->getIdCinema()==$idCinema)
              {
                  $this->projectionList->Delete($projection->getIdProjection());
              }
          }

          $this->cinemaList->Delete($idCinema);
          $listCinema=$this->cinemaList->GetAll();
          echo" <script>alert('deleted cinema');</script>" ;
          include(VIEWS_PATH."cineviews.php");
        }
       
 
     }

     public function remove($verificacion=null)
     {
       $user=$this->userControllers->checkSession();
       
       if($verificacion=='no')
       {
         $listCines=$this->cineRepo->GetAll();
         include(VIEWS_PATH."cineviews.php");
       }
       else 
       {
         $idCine=$verificacion;
         $listCinema=$this->cinemaList->GetAll();
         $projectionL=$this->projectionList->GetAll();
         foreach($listCinema as $cinema)
         {
             if($cinema->getIdCine()==$idCine)
             {
                 $this->cinemaList->Delete($cinema->getIdCinema());
             }
         }
         foreach($projectionL as $projection)
         {
             if($projection->getIdCine()==$idCine)
             {
                 $this->projectionList->Delete($projection->getIdProjection());
             }
         }
         $this->cineRepo->Delete($idCine);
         $listCines=$this->cineRepo->GetAll();
         echo" <script>alert('deleted cine');</script>" ;
         include(VIEWS_PATH."cineviews.php");
       }
         
 }
?>