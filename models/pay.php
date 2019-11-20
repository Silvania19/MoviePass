<?php 
 namespace models;
 class Pay 
 {
     private $idPay;
     private $wayToPay;
     private $idPurchase;
     private $fecha;


     public function __construct( $wayToPay, $idPurchase, $fecha)
     {
        
         $this->wayToPay=$wayToPay;
         $this->idPurchase=$idPurchase;
         $this->fecha=$fecha;
         
     }
     public function setIdPay($idPay)
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
     public function getWayToPay()
     {
       return $this->wayToPay;
     }
     public function getIPurchase()
     {
       return  $this->idPurchase;
     }
     public function getFecha()
     {
       return  $this->fecha;
     }
 }
?>