<?php 
 namespace models;
 class Pay 
 {
     private $idPay;
     private $wayToPay;
     private $idPurchase;


     public function __construct()
     {
         $this->idPay=$idPay;
         $this->wayToPay=$wayToPay;
         $this->idPurchase=$idPurchase;
         
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
     
 }
?>