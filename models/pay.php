<?php 
 namespace models;
 class Pay 
 {
     private $idPay;
     private $wayToPay;
     private $idPurchase;
     private $numberAcount;
     private $fecha;


     public function __construct( $wayToPay, $idPurchase, $numberAcount,  $fecha)
     {
        
         $this->wayToPay=$wayToPay;
         $this->idPurchase=$idPurchase;
         $this->numberAcount=$numberAcount;
         $this->fecha=$fecha;
         
     }
     public function setIdPay($idPay)
     {
      $this->numberAcount=$numberAcount;
     }
     public function setNumberAcount($numberAcount)
     {
      $this->idPay=$idPay;
     }
     public function setWayToPay($wayToPay)
     {
      $this->wayToPay=$wayToPay;
     }
     public function setIdPurchase($idPurchase)
     {
      $this->idPurchase=$idPurchase;
     }
     public function setFecha($fecha)
     {
       $this->fecha=$fecha;
     }
     public function getIdPay()
     {
       return  $this->idPay;
     }
     public function getNumberAcount()
     {
       return  $this->numberAcount;
     }
     public function getWayToPay()
     {
       return $this->wayToPay;
     }
     public function getIdPurchase()
     {
       return  $this->idPurchase;
     }
     public function getFecha()
     {
       return  $this->fecha;
     }
 }
?>