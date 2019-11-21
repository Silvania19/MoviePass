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
public function Collection($idCine=null)
{
    $user=$this->userContro->checkSession();
    $amount=0;
    try {
    
    $purchases= $this->listPurchase->SearchPurchasePay();
    $cinemasOfCine=$this->listCinema->SearchIdCine($idCine);
    $cine=$this->listCine->Search($idCine);
    //$pays= $this->listPays->GetAll();
   
  //  $projection=$this->listProjection->SeachIdCinema();
    if(is_array($cinemasOfCine))
    {
         foreach($cinemasOfCine as $cinema)
         {
            $projections=$this->listProjection->SearchIdCinema($cinema->getIdCinema());
            if(is_array($projections))
            {
                foreach($projection as $pro)
                {
                    if(is_array($purchases))
                    {
                        foreach($purchases as $p)
                        {    
                             if($p->getIdPurchase()==$pro->getIdPurchase())
                        
                              {
                                   $amount=$amount+$p->getAmount();
                              } 
                                            
                        }
                    }
                    else
                    {
                        if($purchases->getIdPurchase()==$pro->getIdPurchase())
                        
                              {
                                   $amount=$amount+$purchases->getAmount();
                              } 
                    }
                }
            
            }
            else
            {
                if(is_array($purchases))
                    {
                        foreach($purchases as $p)
                        {    
                             if($p->getIdPurchase()==$projections->getIdPurchase())
                        
                              {
                                   $amount=$amount+$p->getAmount();
                              } 
                                            
                        }
                    }
                    else
                    {
                        if($purchases->getIdPurchase()==$projections->getIdPurchase())
                        
                              {
                                   $amount=$amount+$purchases->getAmount();
                              } 
                    }
            }
                
        }
    }
   else
   {
        $projections=$this->listProjection->SearchIdCinema($cinemasOfCine->getIdCinema());
        if(is_array($projections))
        {
            foreach($projection as $pro)
            {
                if(is_array($purchases))
                {
                    foreach($purchases as $p)
                    {    
                        if($p->getIdPurchase()==$pro->getIdPurchase())
                    
                        {
                            $amount=$amount+$p->getAmount();
                        } 
                                        
                    }
                }
                else
                {
                    if($purchases->getIdPurchase()==$pro->getIdPurchase())
                    
                        {
                            $amount=$amount+$purchases->getAmount();
                        } 
                }
            }
        
        }
        else
        {
            if(is_array($purchases))
                {
                    foreach($purchases as $p)
                    {    
                        if($p->getIdPurchase()==$projections->getIdPurchase())
                    
                        {
                            $amount=$amount+$p->getAmount();
                        } 
                                        
                    }
                }
                else
                {
                    if($purchases->getIdPurchase()==$projections->getIdPurchase())
                    
                        {
                            $amount=$amount+$purchases->getAmount();
                        } 
                }
        }
            
    }


    } catch (\Throwable $th) {
       
    }
 include(VIEWS_PATCH."recaudacion.php");
  
}


}