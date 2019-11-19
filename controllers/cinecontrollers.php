<?php
namespace controllers;
use models\Cine as cine;
use daodb\CineDao as cineD;
use daodb\CinemaDao as cinemaD;
use daodb\Projectiondao as projectionD;
use controllers\UserControllers as userC;
class CineControllers
{
    private $cineRepo;//esta variable, sera aquella aque le iguale lo que traiga de la base de datos. Cuando la tenga
    private $cinemaList;
    private $userControllers;
    private $projectionList;
    public function __construct()
    {
        $this->cineRepo= new cineD();// sera reemplazado por una instancia de la clases donde tenga  la base correspondiente
        $this->cinemaList= new cinemaD();
        $this->userControllers= new userC();
        $this->projectionList= new projectionD();
     }
    
    public function add($name=null, $address=null)
    { 
      $controlScript=1;
       $user=$this->userControllers->checkSession();
      $cine=new cine($name,  $user->getIdUser(), $address);
      try {
         $this->cineRepo->Add($cine);
      $listCines=$this->cineRepo->GetAll();
      } catch (\Throwable $th) {
        $controlScritpt=1;
        $message='error en la base';
       // include(VIEWS_PATH."userviews.php");
      }
     
      $messaje='added cine';
      include(VIEWS_PATH."cineviews.php");
      
    }

    public function update($name=null, $address=null, $idCine=null)
    {
      $controlScript=1;
      $user=$this->userControllers->checkSession();
      $cine=new cine($name, $user->getIdUser(), $address);
      $this->cineRepo->Update($cine, $idCine);
      try {
          $listCines=$this->cineRepo->GetAll();
      } catch (\Throwable $th) {
        $controlScritpt=1;
        $message='error en la base';
       // include(VIEWS_PATH."userviews.php");
      }
    
      $message='updated cine';
      include(VIEWS_PATH."cineviews.php");
      
    }

    public function remove($verificacion=null)
    {
      $controlScript=1;
      $user=$this->userControllers->checkSession();
      
      if($verificacion=='no')
      {
        try {
          $listCines=$this->cineRepo->GetAll();
        include(VIEWS_PATH."cineviews.php");
        } catch (\Throwable $th) {
          $controlScritpt=1;
         $message='error en la base';
         //include(VIEWS_PATH."userviews.php");
        }
        
      }
      else 
      {
        $idCine=$verificacion;
        try {
           $listCinema=$this->cinemaList->GetAll();
        $projectionL=$this->projectionList->GetAll();
        } catch (\Throwable $th) {
          $controlScritpt=1;
          $message='error en la base';
          //include(VIEWS_PATH."userviews.php");
        }
       
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
              try {
                 $this->projectionList->Delete($projection->getIdProjection());
              } catch (\Throwable $th) {
                $controlScritpt=1;
                $message='error en la base';
                //include(VIEWS_PATH."userviews.php");
              }
               
            }
        }
        try {
            $this->cineRepo->Delete($idCine);
        $listCines=$this->cineRepo->GetAll();
        $message='deleted cine';
        include(VIEWS_PATH."cineviews.php");
        } catch (\Throwable $th) {
          $controlScritpt=1;
          $message='error en la base';
          //include(VIEWS_PATH."userviews.php");
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