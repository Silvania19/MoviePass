<?php
 namespace  controllers;
 use models\Cinema as cinema;
 use daodb\CinemaDao as cinemaD;
 use daodb\CineDao as cineD;
 use daodb\ProjectionDao as projectionD;
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
         $this->projectionList= new projectionD();
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
           // include(VIEWS_PATH."userviews.php");
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
            //include(VIEWS_PATH."userviews.php");
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
                 // include(VIEWS_PATH."userviews.php");
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
         include(VIEWS_PATH."cineviews.php");
          }
          
        }
       
 
     }


   /*  public function remove($verificacion=null)
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
         
    }*/
}
?>