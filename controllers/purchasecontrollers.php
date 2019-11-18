<?php
    namespace controllers;
    use models\Purchase as purchase;
    use daodb\ProjectionDao as projectionD;
    use daosdb\MovieDao as movieD;
    use daosdb\PurchaseDao as purchaseD;
    use daodb\CineDao as cineD;
    use controllers\MovieControllers as movieC;
    use controllers\UserControllers as userC;


    class PurchaseControllers
    {
        private $listMovie;
        private $listProjection;
        private $listCine;
        private $userContro;
        private $purchaseD;
        private $projection;


        public function __construct()
        {
            $this->listMovie=new movieD();
            $this->listProjection=new projectionD();
            $this->purchase= new purchase;
            $this->listCine=new cineD();
            $this->userContro=new userC();
            $this->purchaseD=new purchaseD();
        }
        

        public function addPart1($idProjection=null)
        {
            $user=$this->userContro->checkSession();
            $projection=$this->listProjection->Search($idProjection);
            $movie= $this->listMovie->Search($projection->getIdMovie());
            $cine=$this->listCine->Search($projection->getIdCine());
            $price=$this->listProjection->SearchXProjectionAmount($idProjection);
            include(VIEWS_PATH."formpurchase.php");

        }
        public function add($quantityTicket=null,$idProjection=null)
        {
            $user=$this->userContro->checkSession();
            $projection=$this->listProjection->Search($idProjection);
            $price=$this->listProjection->SearchXProjectionAmount($idProjection);
            $amount=$price*$quantityTicket;
            $amount1= $this->purchaseM->setAmount($amount);
            $time= strftime("%Y-%m-%d %I:%M:%S %p", time());
            $day=strftime("%A", time());
            if($day=='Tuesday'|| $day=='Wednesday')
            {
                if($quantityTicket>=2)
                {
                    $discount=$amount1-25%;
                    $amount2=$discount;
                }
                else
                {
                    $discount=0;
                    $amount2=$amount1;
                }
            }
            $this->purchaseD->Add($discount, $amount2, $quantityTicket,$projection,$time);
            include(VIEWS_PATH."shoppingpurchase.php");

        }

    }