<?php
namespace models;

class Cinema{
   private $idCinema;
   private $idCine;
   private $numberCinema;
   private $capacity;

   public function __construct( $idCine, $numberCinema, $capacity)
   {
   
      $this->idCine=$idCine;
      $this->numberCinema=$numberCinema;
      $this->capacity=$capacity;
   }
   public function setIdCinema($idCinema)
   {
      $this->idCinema=$idCinema;
   }
   public function setIdCine($idCine)
   {
      $this->idCine=$idCine;
   }
   public function setNumberCinema($numberCinema)
   {
      $this->numberCinema=$numberCinema;
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
   public function getNumberCinema()
   {
      return $this->numberCinema;
   }
   public function getCapacity()
   {
      return $this->capacity;
   }
}