<?php
namespace controllers;
use models\Movie as Movie;
use daosjson\MovieDao as movieD;
use daosjson\GenresDao as genresD;
use daodb\ProjectionsDao as projectionD;
class MovieControllers
{ 
    private $listMovie;
    private $listGenres;
    private $listProjection;
    public function __construct()
    {
        $this->listMovie=new movieD();
        $this->listGenres=new genresD();
        $this->listProjection= new projectionsD();
    }

    public function seeListMovie()
    {
           $listMovie2=$this->listMovie->GetAll();
           $listGenres2=$this->listGenres->GetAll(); 
           include(VIEWS_PATH."movieviews.php");
    } 

    public function filterGenres($movies, $idGenre)
    {
        $retorno=array();
        
        foreach($movies as $movie)
        {
            $arrayG=$movie->getGenre_ids();
            foreach($arrayG as $genre)
            {
                if($genre == $idGenre)
                {
                    array_push($retorno, $movie);
                }
            }
        }
        
        return $retorno;
    }
    public function filterDate($movies, $date)
    {
        $retorno=array();
        foreach($movies as $movie)
        {
            if($date == $movie->getRelease_date())
            {
                array_push($retorno, $movie);
            }
        }
            return $retorno;
    }
        
    public function SeeMovies()
    {
    
        $movies=$this->GetAll();
        $resulMovie=array();
        if(isset($movies))
        {
            foreach($movies as $movie)
            {
            if($this->listProjection->SearchXMovie($movie->getIdMovie()))
            {
                
                array_push($resulMovie, $movie);
            }
            }
        }
        return $resulMovie;
    }
    
}
?>