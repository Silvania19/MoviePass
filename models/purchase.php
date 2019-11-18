<?php 
namespace models;

class Purchase
{
  private $idPurchase;
  private $discount;
  private $amount;//total
  private $quantityTickets;
  private $wayToPay;
  private $idProjection;
  private $remainder;//remanente
  


  public function __constructor($idPurchase,$discount,$amount,$quantityTickets,$wayToPay,$idProjection,$remaider)
  {
      $this->idPurchase=$idPurchase;
      $this->discount=$discount;
      $this->amount=$amount;
      $this->quantityTickets=$quantityTickets;
      $this->wayToPay=$wayToPay;
      $this->idProjection=$idProjection;
      $this->remaider=$remaider;
  }

    public function setIdPurchase($idPurchase)
    {
        $this->idPurchase=$idPurchase;
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

    public function setWayToPay($wayToPay)
    {
        $this->wayToPay=$wayToPay;
    }

    public function setIdProjection($idProjection)
    {
        $this->idProjection=$idProjection;
    }

    public function setRemaider($remaider)
    {
        $this->remaider=$remaider;
    }

    public function getIdPurchase()
    {
        return $this->idPurchase;
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

    public function getWayToPay()
    {
        return $this->wayToPay;
    }

    public function getIdProjection()
    {
        return $this->idProjection;
    }

    public function getRemaider()
    {
        return $this->remaider;
    }
}


?>