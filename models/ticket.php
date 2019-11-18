<?php
    namespace models;
   
    use daodb\TicketDao as ticketD;
   
    class Ticket
    {
        private $idTicket;
        private $numberTicket;
        private $qr;
        private $price;
        private $idUser;
        private $idProjection;
        public function __construct($numberTicket, $price, $idUser, $qr, $idProjection)
    {
        
        $this->numberTicket=$numberTicket;
        $this->price=$price;
        $this->idUser=$idUser;
        $this->qr=$qr;
        $this->idProjection=$idProjection;
    }

        public function setIdTicket($idTicket)
        {
            $this->setIdTicket=$idTicket;
        }
        
        public function setNumberTicket($numberTicket)
        {
            $this->numberTicket=$numberTicket;
        }
        public function setQr($qr)
        {
            $this->qr=$qr;
        }
        public function setPrice($price)
        {
            $this->price=$price;
        }
        public function setIdUser($idUser)
        {
            $this->idUser=$idUser;
        }
        public function setIdProjection($idProjection)
        {
            $this->setIdProjection=$idProjection;
        }
        public function getIdTicket()
        {
            return $this->idTicket;
        }
        public function getNumberTicket()
        {
            return $this->numberTicket;
        }
        public function getQr()
        {
            return $this->qr;
        }
        public function getPrice()
        {
            return $this->price;
        }
        public function getIdUser()
        {
            return $this->idUser;
        }
        public function getIdProjection()
        {
            return $this->idProjection;
        }


    }