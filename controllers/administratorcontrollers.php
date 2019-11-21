<?php
namespace controllers;
use models\User as User;
use daodb\UserDao as userD;
use daodb\PuchaseDao as purchaseD;
use daodb\ProjectionDao as projectionD;
use daodb\CinemaDao as cinemaD;
use daodb\CineDao as cineD;
use daodb\PayDao as payD;
use daodb\PurchaseControllers as purchaseC;
class AdministratorControllers
{
private $daoUser;//en esta variable tiene una instancia de la clase Dao user, 
public function __construct()
{
    $this->daoUser = new userD();
    $this->listPurchase=new purchaseD();
    $this->listProjection= new projectionD();
    $this->listCinema=new cinemaD();
    $this->listCine=new cineD();
    $this->listPay= new payD();
    $this->purchaseC=new purchaseD();
}

public function addAdministrator( $name=null, $lastName=null, $dni=null, $email=null, $password=null)
{
   
    $idRol=2;
    $user=new User($name,$lastName, $dni, $email, $password, $idRol);
    try {
         $this->daoUser->Add($user);
    $_SESSION['user']=$user;//pongo en session al nuevo usuario qye se acabo de resistrar
    include(VIEWS_PATH."adminitratorviews.php");
    } catch (\Throwable $th) {
        $controlScritpt=1;
         $message='error en la base';
        // include(VIEWS_PATH."userviews.php");
    }
   
}
public function Collection($idCine)
{
    try {
          $user=$this->userContro->checkSession();
    $purchases= $this->listPurchase->SearchXIdPurchase();
    $pays= $this->listPays->GetAll();
    $cines=$this->listCine->GetAll();
    $projection=$this->listProjection->SeachIdCinema();
    $cinema=$this->listCinema->SearcIdCine();
   
    foreach($cine as $c)
    {
            foreach($cinema as $cinem)
            {
                    foreach($projection as $p)
                    {
                             foreach($purchases as $p)
                             {    
                                   foreach($pays as $pays)
                                   {

                                       $amount=this->purchaseC->knowAmount();
                                        $cine=this->listCine->Search($idCine);
                              
                                   }
                                   
                             }
                    }
            }
    }

    } catch (\Throwable $th) {
       
    }
  
}


}