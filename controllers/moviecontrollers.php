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
           $listMovie2=$this->listMovie->GetAll();
           $listGenres2=$this->listGenres->GetAll(); 
           include(VIEWS_PATH."movieviews.php");
    } 
    public function filterGenre()
    {
        $idGenre=$_POST['idGenre'];
      
        $listGenres2=$this->listGenres->GetAll(); 
        
        $filter=$this->listMovie->filterGenres($idGenre);
        include(VIEWS_PATH."movieviews.php");
    } 
    public function filterDate()
       {
           $date=$_POST['date'];
           $listGenres2=$this->listGenres->GetAll(); 
           $filter=$this->listMovie-> filterDate($date);
           include(VIEWS_PATH."movieviews.php");
       }
    
    
}
?>