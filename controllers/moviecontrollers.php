<?php
namespace controllers;
use models\Movie as Movie;
use daosjson\movieDao as movieD;
class MovieControllers
{
    $listMovie;
    public function __construct()
    {

    }

    public function seeListMovie()
    {
        $this->listMovie=new movieD();
        $this->listMovie->getNowMovie;
    } 
}
?>