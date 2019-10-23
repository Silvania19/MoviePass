<?php
namespace controllers;
use models\Movie as Movie;
use daosjson\movieDao as movieD;
class MovieControllers
{ 
    private $listMovie;
    
    public function __construct()
    {
        $this->listMovie=new movieD();
    }

    public function seeListMovie()
    {
        $listMovie2=$this->listMovie->getNowMovie();
           include(VIEWS_PATH."movieviews.php");
    } 
}
?>