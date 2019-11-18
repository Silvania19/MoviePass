<?php
    namespace controllers;
    use models\Projection as projection;
    use daodb\ProjectionDao as projectionD;
    use daosjson\MovieDao as movieD;
    use daodb\CineDao as cineD;
    use controllers\MovieControllers as movieC;
    use controllers\UserControllers as userC;


    class PurchaseControllers
    {
        private $listMovie;
        private $listProjection;
        private $listCine;
        private $userContro;

        public function __construct()
        {
            $this->listMovie=new movieD();
            $this->listProjection=new projectionD();
            $this->listCine=new cineD();
            $this->userContro=new userC();
          
        }
        

        public function addPart1($idProjection=null)
        {
            $user=$this->userContro->checkSession();
            $projection=$this->listProjection->Search($idProjection);
            $movie= $this->listMovie->Search($projection->getIdMovie());
            $cine=$this->listCine->Search($projection->getIdCine());
            $price=$this->listProjection->SearchXProjection($idProjection);
            include(VIEWS_PATH."formpurchase.php");

        }
        public function add($quantityTicket=null,$idProjection=null)
        {
            $user=$this->userContro->checkSession();
            
            $projection=$this->listProjection->Search($idProjection);

        }

    }