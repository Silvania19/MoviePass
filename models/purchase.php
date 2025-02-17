<?php 
namespace models;

    class Purchase
    {
    private $idPurchase;
    private $discount;
    private $amount;//total
    private $quantityTickets;
    private $idProjection;
    private $time;
    private $state;
    private $idUser;
    
    


    public function __construct($discount, $amount, $quantityTickets, $idProjection, $time, $idUser, $state)
    {
        
        $this->discount=$discount;
        $this->amount=$amount;
        $this->quantityTickets=$quantityTickets;
        $this->idProjection=$idProjection;
        $this->time=$time;
        $this->idUser=$idUser;
        $this->state=$state;
        
    }
        public function setIdUser($idUser)
        {
            $this->idUser=$idUser;
        }

        public function setIdPurchase($idPurchase)
        {
            $this->idPurchase=$idPurchase;
        }
        public function setState($state)
        {
            $this->state=$state;
        }
        public function setTime($time)
        {
            $this->time=$time;
        }
        public function setDiscount($discount)
        {
            $this->discount=$discount;
        }

        public function setAmount($amount)
        {
            $this->amountt=$amount;
        }

        public function setQuantityTickets($quantityTickets)
        {
            $this->quantityTickets=$quantityTickets;
        }

        
        public function setIdProjection($idProjection)
        {
            $this->idProjection=$idProjection;
        }


        public function getIdPurchase()
        {
            return $this->idPurchase;
        }
        
        public function getState()
        {
            return $this->state;
        }

        public function getDiscount()
        {
            return $this->discount;
        }

        public function getAmount()
        {
            return $this->amount;
        }

        public function getQuantityTickets()
        {
            return $this->quantityTickets;
        }

    
        public function getIdProjection()
        {
            return $this->idProjection;
        }

        public function getTime()
        {
            return $this->time;
        }
        public function getIdUser()
        {
            return $this->idUser;
        }
    }


?>