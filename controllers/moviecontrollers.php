<?php
namespace controllers;
use models\Movie as Movie;
use daosjson\MovieDao as movieD;
use daosjson\GenresDao as genresD;
use daodb\ProjectionDao as projectionD;
use controllers\MovieControllers as movieC;

class MovieControllers
{ 
    private $listMovie;
    private $listGenres;
    private $listProjection;
    private $movieContro;
    public function __construct()
    {
        $this->listMovie=new movieD();
        $this->listGenres=new genresD();
        $this->listProjection= new projectionD();
        $this->movieContro=new movieC();
    }

    public function seeListMovie()
    {
        try {
             $listMovie2=$this->listMovie->GetAll();
           $listGenres2=$this->listGenres->GetAll(); 
           include(VIEWS_PATH."movieviews.php");
        } catch (\Throwable $th) {
            $controlScritpt=1;
             $message='error en la base';
              $projections=$this->listProjection->GetAllActuales();
                $movies=$this->movieContro->SeeMovies();
                $listGenres2=$this->listGenres->GetAll();
      
               include(VIEWS_PATH."home2.php");
        }
          
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
        try {
        $movies=$this->listMovie->GetAll();
        } catch (\Throwable $th) {
        $controlScritpt=1;
         $message='error en la base';
         $projections=$this->listProjection->GetAllActuales();
         $movies=$this->movieContro->SeeMovies();
         $listGenres2=$this->listGenres->GetAll();

        include(VIEWS_PATH."home2.php");
        }

        $resulMovie=array();
        if(isset($movies))
        {
            foreach($movies as $movie)
            {
                try {
                    if($this->listProjection->SearchXMovie($movie->getIdMovie()))
                    {
                      
                        array_push($resulMovie, $movie);
                    }
               } catch (\Throwable $th) {
                $controlScritpt=1;
                $message='error en la base';
                $projections=$this->listProjection->GetAllActuales();
                $movies=$this->movieContro->SeeMovies();
                $listGenres2=$this->listGenres->GetAll();
      
               include(VIEWS_PATH."home2.php");
                }
            }
        }
        return $resulMovie;
    }
    
}
?>