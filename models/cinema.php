<?php
namespace models;
class Cinema
{
    private $idCine;
    private $name;
    private $administratorUser;
    

    public function __construct($name, $idCine)
    {
        $this->name=$name;
        $this->idCine=$idCine;
    }

}