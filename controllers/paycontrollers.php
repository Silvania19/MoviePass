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
    use daosjson\GenresDao as genresD;

    class PayControllers
    {
        private $listPays;
        private $listPurchase;
        private $ticketContro;
        private $userContro;
        private $listMovie;
        private $listProjection;
        private $listGenre;
        public function __construct()
        {
            $this->listPays=new payD();
            $this->listPurchase= new purchaseD();
            $this->listMovie=new movieD();
            $this->listProjection=new projectionD();
            $this->moviesContro= new movieC();
            $this->ticketContro=new ticketC();
            $this->userContro=new userC();
            $this->listGenre= new genresD();
        }
        public function add($waytopay=null, $numberAcount=null)
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
                                $pay= new pay($waytopay3, $purchase->getIdPurchase(), $numberAcount, $date);
                                
                                try {
                                
                                    $this->listPays->add($pay);
                                
                                    $this->ticketContro->generateTicket($purchase->getIdProjection());
                                
                                    $this->listPurchase->inactivate($purchase->getIdPurchase());
                                    
                                
                                } catch (\PDOException $th) {
                                
                                    $controlScript=1;
                                    
                                    $message="error en la base";
                                    $projections=$this->listProjection->GetAllActuales();
                                    $movies=$this->moviesContro->SeeMovies();
                                    $listGenres2=$this->listGenre->GetAll();

                                    include(VIEWS_PATH."home2.php");
                                }
                                $cantTicket--;
                            }
                            
                        }
                        
                    
                    }
                  
                }
                if(is_object($listPurchasesToPay))
                {
                    if($listPurchasesToPay->getState()==true)
                    {
                        $cantTicket=$listPurchasesToPay->getQuantityTickets();
                        while($cantTicket>0)
                        {
                            $pay= new pay($waytopay3, $listPurchasesToPay->getIdPurchase(), $numberAcount, $date);
                            
                            try {
                            
                                $this->listPays->add($pay);
                            
                                $this->ticketContro->generateTicket($listPurchasesToPay->getIdProjection());
                            
                                $this->listPurchase->inactivate($listPurchasesToPay->getIdPurchase());
                                
                            
                            } catch (\PDOException $th) {
                            
                                $controlScript=1;
                                
                                $message="error en la base";
                                $projections=$this->listProjection->GetAllActuales();
                                $movies=$this->moviesContro->SeeMovies();
                                $listGenres2=$this->listGenre->GetAll();

                                include(VIEWS_PATH."home2.php");
                            }
                            $cantTicket--;
                        }
                        
                    } 
                    
                }
                $this->ticketContro->SeeTicket(); 
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

      
    }
?>