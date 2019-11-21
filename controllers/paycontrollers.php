<?php 
    namespace controllers;
    use models\Pay as pay;
    use daodb\PayDao as payD;
    use daosjson\MovieDao as movieD;
    use daodb\PurchaseDao as purchaseD;
    use controllers\TicketControllers as ticketC;
    use controllers\MovieControllers as movieC;
    use controllers\UserControllers as userC;
    use daodb\ProjectionDao as projectionD;
  
    class PayControllers
    {
        private $listPays;
        private $listPurchase;
        private $ticketContro;
        private $userContro;
        private $listMovie;
        private $listProjection;
        public function __construct()
        {
            $this->listPays=new payD();
            $this->listPurchase= new purchaseD();
            $this->listMovie=new movieD();
            $this->listProjection=new projectionD();
            $this->moviesContro= new movieC();
            $this->ticketContro=new ticketC();
            $this->userContro=new userC();
        }
        public function add($waytopay=null)
        {
            $user=$this->userContro->checkSession();
            $waytopay2=strtolower($waytopay);
            if($waytopay2=='visa' || $waytopay2=='master')
            {
                $waytopay3=$waytopay2; 
                $date= strftime("%Y-%m-%d %I:%M:%S %p", time());
                $listPurchasesToPay=$this->listPurchase->SearchXUser($user->getIdUser());
                if(is_array($listPurchasesToPay))
                {
                    foreach($listPurchasesToPay as $purchase)
                    {
                        if($purchase->getState()==true)
                        {
                            $cantTicket=$purchase->getQuantityTickets();
                            while($cantTicket>0)
                            {
                                $pay= new pay($waytopay3, $purchase->getIdPurchase(), $date);
                                
                                try {
                                
                                    $this->listPays->add($pay);
                                
                                    $this->ticketContro->generateTicket($purchase->getIdProjection());
                                
                                    $this->listPurchase->inactivate($purchase->getIdPurchase());
                                    
                                
                                } catch (\PDOException $th) {
                                
                                    $controlScript=1;
                                    
                                    $message="error en la base";
                                }
                                $cantTicket--;
                            }
                            
                        }
                        
                    
                    }
                   $this->ticketContro->SeeTicket(); 
                }
                if(is_object($listPurchasesToPay))
                {
                    if($listPurchasesToPay->getState()==true)
                    {
                        $cantTicket=$listPurchasesToPay->getQuantityTicket();
                        while($cantTicket>0)
                        {
                            $pay= new pay($waytopay3, $listPurchasesToPay->getIdPurchase(), $date);
                            
                            try {
                            
                                $this->listPays->add($pay);
                            
                                $this->ticketContro->generateTicket($listPurchasesToPay->getIdProjection());
                            
                                $this->listPurchase->inactivate($listPurchasesToPay->getIdPurchase());
                                
                            
                            } catch (\PDOException $th) {
                            
                                $controlScript=1;
                                
                                $message="error en la base";
                            }
                            $cantTicket--;
                        }
                        
                    }
                }
            }
            else
            {
                $controlScript=1;
                $message='Lo siento pero la cia de credito no esta autorizada';
                $listPurchase=$this->listPurchase->SearchXUser($user->getIdUser());
                $movies=$this->moviesContro->SeeMovies();
                $projections= $this->listProjection->getAllActuales();
                include(VIEWS_PATH."shoppingpurchase.php");
            }
           
            
        }

        public function KnowAmount()
        {
            $this->listPurchase->GetAll();
        }
    }
?>