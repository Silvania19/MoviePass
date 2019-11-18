<?php
 namespace controllers;
 use models\Purchase as purchase;
 use daodb\PurchaseDao as purchaseD;
 use daodb\TicketDao as ticketD;


 class PurchaseControllers
 {
     private $listPurchase;

     public function __construct()
     {
       $this->listMovie=new movieD();
     }
 }

?>