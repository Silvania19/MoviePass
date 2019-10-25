<?php
namespace controllers;
use models\Movie as Movie;
use daosjson\MovieDao as movieD;
use daosjson\GenresDao as genresD;
class MovieControllers
{ 
    private $listMovie;
    private $listGenres;
    
    public function __construct()
    {
        $this->listMovie=new movieD();
        $this->listGenres=new genresD();
    }

    public function seeListMovie()
    {
           $listMovie2=$this->listMovie->getNowMovie();
           $listGenres2=$this->listGenres->GetAll(); 
           include(VIEWS_PATH."movieviews.php");
    } 
    
}
?>