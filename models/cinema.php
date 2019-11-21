<?php
namespace models;

class Cinema{
   private $idCinema;
   private $idCine;
   private $nameCinema;
   private $capacity;
   private $price;
   public function __construct( $idCine, $nameCinema, $capacity,$price)
   {
   
      $this->idCine=$idCine;
      $this->nameCinema=$nameCinema;
      $this->capacity=$capacity;
      $this->price=$price;
   }
   public function setIdCinema($idCinema)
   {
      $this->idCinema=$idCinema;
   }
   public function setIdCine($idCine)
   {
      $this->idCine=$idCine;
   }
   public function setNameCinema($nameCinema)
   {
      $this->nameCinema=$nameCinema;
   }
   public function setPrice($price)
   {
       $this->price=$price;
   }
   public function getPrice()
   {
      return $this->price;
   }
   public function setCapacity($capacity)
   {
      $this->capacity=$capacity;
   }
   public function getIdCinema()
   {
      return $this->idCinema;
   }
   public function getIdCine()
   {
      return $this->idCine;
   }
   public function getnameCinema()
   {
      return $this->nameCinema;
   }
   public function getCapacity()
   {
      return $this->capacity;
   }
}