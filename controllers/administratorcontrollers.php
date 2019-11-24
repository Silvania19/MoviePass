<?php
namespace controllers;
use models\User as User;
use daodb\UserDao as userD;
use daodb\PurchaseDao as purchaseD;
use daodb\ProjectionDao as projectionD;
use daodb\CinemaDao as cinemaD;
use daodb\CineDao as cineD;
use daodb\PayDao as payD;
use daosjson\GenresDao as genreD;
use controllers\MovieControllers as movieC;
use controllers\UserControllers as userC;
use daodb\PurchaseControllers as purchaseC;
class AdministratorControllers
{
    private $daoUser;//en esta variable tiene una instancia de la clase Dao user, 
    private $userContro;
    private $listPurchase;
    private $listProjection;
    private $listCinema;
    private $listCine;
    private $purchaseC;
    private $movieContro;
    private $listGenres;
    public function __construct()
    {
        $this->daoUser = new userD();
        $this->listPurchase=new purchaseD();
        $this->listProjection= new projectionD();
        $this->listCinema=new cinemaD();
        $this->listCine=new cineD();
        $this->userContro= new userC();
        $this->purchaseC=new purchaseD();
        $this->movieContro= new movieC();
        $this->listGenres= new genreD();
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
            $projections=$this->listProjection->GetAllActuales();
            $movies=$this->movieContro->SeeMovies();
            $listGenres2=$this->listGenres->GetAll();
            include(VIEWS_PATH."home2.php");
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
        
    
        if(is_array($cinemasOfCine))
        {
            foreach($cinemasOfCine as $cinema)
            {
                
                $projections=$this->listProjection->SearchXIdCinema($cinema->getIdCinema());
                
                if(is_array($projections))
                {
                    foreach($projections as $pro)
                    {
                        if(is_array($purchases))
                        {
                            foreach($purchases as $p)
                            {    
                                
                                if($p->getIdProjection()==$pro->getIdProjection())
                            
                                {  
                                    
                                    $amount+=$p->getAmount();
                                    
                                } 
                                                
                            }
                        }
                        else
                        {
                            if($purchases->getIdProjection()==$pro->getIdProjection())
                            
                                {
                                    
                                    $amount+=$purchases->getAmount();
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
                                if($p->getIdProjection()==$projections->getIdProjection())
                            
                                {
                                    $amount+=$p->getAmount();
                                } 
                                                
                            }
                        }
                        else
                        {
                            if($purchases->getIdProjection()==$projections->getIdProjection())
                            
                                {
                                    $amount+=$purchases->getAmount();
                                } 
                        }
                }
                    
            }
        }
    else
    {    
            
            $projections=$this->listProjection->SearchXIdCinema($cinemasOfCine->getIdCinema());
        
            if(is_array($projections))
            {
                foreach($projections as $pro)
                {
                    if(is_array($purchases))
                    {
                        foreach($purchases as $p)
                        {    
                            if($p->getIdProjection()==$pro->getIdProjection())
                        
                            {
                                $amount+=$p->getAmount();
                            } 
                                            
                        }
                    }
                    else
                    {
                        if($purchases->getIdProjection()==$pro->getIdProjection())
                        
                            {
                                $amount+=$purchases->getAmount();
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
                            if($p->getIdProjection()==$projections->getIdProjection())
                        
                            {
                                $amount=$amount+$p->getAmount();
                            } 
                                            
                        }
                    }
                    else
                    {
                        if($purchases->getIdProjection()==$projections->getIdProjection())
                        
                            {
                                $amount=$amount+$purchases->getAmount();
                            } 
                    }
            }
                
        }


        } catch (\Throwable $th) {
            $controlScritpt=1;
            $message='error en la base';
            $projections=$this->listProjection->GetAllActuales();
            $movies=$this->movieContro->SeeMovies();
            $listGenres2=$this->listGenres->GetAll();
            include(VIEWS_PATH."home2.php");
        
        }
    include(VIEWS_PATH."recaudacion.php");
    
    }


}