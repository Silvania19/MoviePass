<?php
namespace controllers;

use models\User as User;
use daosjson\userdao as userD;
use daosjson\CineDao as cineD;
class viewscontrollers
{
    private $listCine;
    public function __construct()
    {
        $this->listCine=new cineD();
    }
    public function index()
    {
        include(VIEWS_PATH."home.php");
    }
    public function cine()
    {
        
     include(VIEWS_PATH."cineviews.php");     
    }
    public function cinemaview()
    {
        $listCine2=$this->listCine->GetAll();
        include(VIEWS_PATH."cinemaviews.php");    

    }
}
