<?php
namespace controllers;
use models\Cine as cine;
use daosjson\CineDaos as cineD;
class CineControllers
{
    private $cinemaRepo;//esta variable, sera aquella aque le iguale lo que traiga de la base de datos. Cuando la tenga
    public function __construct()
    {
        $this->cinemaRepo= new cineD();// sera reemplazado por una instancia de la clases donde tenga  la base correspondiente
    }
    public function
   
}