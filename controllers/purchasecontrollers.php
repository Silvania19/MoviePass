<?php
    namespace controllers;
    use models\Purchase as purchase;
    use daodb\ProjectionDao as projectionD;
    use daodb\PurchaseDao as purchaseD;
    use daodb\CineDao as cineD;
    use controllers\MovieControllers as movieC;
    use controllers\UserControllers as userC;
    use daosjson\MovieDao as movieD;


    class PurchaseControllers
    {
        
        private $listProjection;
        private $listCine;
        private $userContro;
        private $listPurchase;
        private $listMovie;
        private $projection;
        private $moviesContro;


        public function __construct()
        {
           
            $this->listProjection=new projectionD();
            $this->listCine=new cineD();
            $this->userContro=new userC();
            $this->listPurchase=new purchaseD();
            $this->listMovie=new movieD();
            $this->moviesContro= new movieC();
        }

        

        public function addPart1($idProjection=null)
        {
            try
            {
            $user=$this->userContro->checkSession();
            $projection=$this->listProjection->Search($idProjection);
            $movie= $this->listMovie->Search($projection->getIdMovie());
            $cine=$this->listCine->Search($projection->getIdCine());
            $price=$this->listProjection->SearchXProjectionAmount($idProjection);
            include(VIEWS_PATH."formpurchase.php");
            }
            catch (\Exception  $ex) {

               $message= 'console.log("error en la base. Archivo:userdao.php)';
               include(VIEWS_PATH."formpurchase.php");
            }
           

        }
        public function add($quantityTicket=null,$idProjection=null)
        {
            
            $user=$this->userContro->checkSession();
            
            try {
                $projection=$this->listProjection->Search($idProjection);
                $price=$this->listProjection->SearchXProjectionAmount($idProjection);
            } catch (\Throwable $th) {
                $controlScritpt=1;
                $message='error en la base';
                include(VIEWS_PATH."formpurchase.php");
            }
            
            $amount=$price*$quantityTicket;
             
            $discount=0.0;
            $Quantitydiscount=$amount*PORCENTAJE_DESCUENTO/100;
            
            $time= strftime("%Y-%m-%d %I:%M:%S %p", time());
            $day=strftime("%A", time());
           
            if($day=='Tuesday'|| $day=='Wednesday')
            {
                if($quantityTicket >= 2)
                { 
                    $discount=$Quantitydiscount;
                    $amount2=$amount-$discount;
                    echo 'descuento';
                }
                else
                {
                    $discount=0;
                    $amount2=$amount;
                }
               
            } 
            else
            {
                $amount2=$amount;
            }
            
            
            $purchase=new purchase($discount, $amount2, $quantityTicket, $idProjection, $time, $user->getIdUser(), true);
            try
            {
            
            $purchases= $this->listPurchase->Add($purchase);
            $listPurchase=$this->listPurchase->GetAll(); 
            $movies=$this->moviesContro->SeeMovies();
            $projections= $this->listProjection->getAllActuales();
            include(VIEWS_PATH."shoppingpurchase.php");
            }
            catch (\PDOException  $ex) {
                
                $controlScritpt=1;
                $message='error en la base';
                include(VIEWS_PATH."home2.php");//esta mal debe incluir otra vista pero no se cual, 
            }
       
        }
        public function delete($idPurchase=null)
        {
            $user=$this->userContro->checkSession();
            try {
                $this->listPurchase->inactivate($idPurchase);
                $listPurchase=$this->listPurchase->SearchXUser($user->getIdUser());
                $movies=$this->moviesContro->SeeMovies();
                $projections= $this->listProjection->getAllActuales();
              
                include(VIEWS_PATH."shoppingpurchase.php");
            } catch (\Throwable $th) {
               
                $controlScritpt=1;
                $message='error en la base';
                include(VIEWS_PATH."home2.php");
            }
            
        }
     
    }











