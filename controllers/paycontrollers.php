<?php 
    namespace controllers;
    use models\Pay as pay;
    use daodb\PayDao as payD;
    use daodb\PurchaseDao as purchaseD;
    use controllers\TiketsControllers as ticketC;
    use controllers\MovieControllers as movieC;
    use controllers\UserControllers as userC;
    use daodb\ProjectionDao as projectionD;
    use daodb\PurchaseDao as purchaseD;
    class Pay 
    {
        private $listPays;
        private $listPurchase;
        private $tiketContro;
        private $userContro;
        private $listPurchase;
        private $listMovie;
        private $listProjection;
        public function __construct()
        {
            $this->listPays=new payD();
            $this->listPurchase= new purchaseD();
            $this->listMovie=new movieD();
            $this->listProjection=new projectionD();
            $this->moviesContro= new movieC();
            $this->tiquedContro=new ticketC();
            $this->userContro=new userC();
        }
        public function add($waytopay=null)
        {
            $user=$this->userContro->checkSession();
            $waytopay2=strtolower($waytopay)
            if($waytopay2=='visa' || $waytopay2=="master")
            {
                $waytopay3=$waytopay2;
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
            $date= strftime("%Y-%m-%d %I:%M:%S %p", time());
            $listPurchesesToPay=$this->listPurchese->SearchXUser($user.>getIdUser());
            if(is_array($listPurchaseToPay))
            {
                foreach($listPurchaseToPay as $purchase)
                {
                    $pay= new pay($waytopay3, $purchase->getIdPurchase(), $date);
                    try {
                         $this->ticketContro->generateTicket($purchase->getIdProjection());
                         $this->listPurchase->Delete($purchase->getIdPurchase());
                       
                    } catch (\Throwable $th) {
                        
                        $controlScript=1;
                        $message="error en la base";
                    }
                   
                }
            }

        }
    }
?>