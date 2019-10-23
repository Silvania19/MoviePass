<?php
namespace models;
class Genres
{
    private $idGenres;
    private $nameGenres;
    public function __construct($idGenres, $nameGenres)
    {
      $this->idGenres=$idGenres;
      $this->nameGenres=$nameGenres;   
    }
    public function setIdGenres($idGenres)
    {
        $this->idGenres=$idGenres;
    }
    public function setNameGenres($nameGenres)
    {
        $this->nameGenres=$nameGenres;
    }
    public function getIdGenres()
    {
        require $this->idGenres;
    }
    public function getNameGenres()
    {
        require $this->nameGenres;
    }
    
}