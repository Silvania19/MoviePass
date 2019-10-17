<?php
namespace controllers;
use models\cinema as cine;
class CinemaControllers
{
    private $cinemaRepo;//esta variable, sera aquella aque le iguale lo que traiga de la base de datos. Cuando la tenga
    public function __construct()
    {
        $this->cinemaRepo=array();// sera reemplazado por una instancia de la clases donde tenga  la base correspondiente
    }
    public function add($cine)
    {
         array_push($this->cinemaRepo, $cine);
    }
}