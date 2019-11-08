<?php
namespace models;

class Cinema{
   private $idCinema;
   private $idCine;
   private $nameCinema;
   private $capacity;

   public function __construct( $idCine, $nameCinema, $capacity)
   {
   
      $this->idCine=$idCine;
      $this->nameCinema=$nameCinema;
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
   public function setNameCinema($nameCinema)
   {
      $this->nameCinema=$nameCinema;
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