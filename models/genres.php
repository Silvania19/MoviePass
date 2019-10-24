<?php
namespace models;
class Genres
{
    private $idGenres;
    private $nameGenres;
    public function __construct()
    {
      
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
        return $this->idGenres;
    }
    public function getNameGenres()
    {
        return $this->nameGenres;
    }
    
}