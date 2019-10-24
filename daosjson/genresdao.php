<?php
namespace daosjson;
use interfaces\idaos as idaos;
use models\Genres as Genres;
class GenresDao implements idaos
{
    private $genresList;

    public function __construct()
    {
        $this->genresList=array();
    }
    public function GetAll()
    {
         $this->retrieveData();
       return $this->genresList;
    }
    public function Add($objeto){

    }
    public function Delete($email){

    }
    public function Update($objeto){

    }
    public function Search($objeto){
        $nombre="";
        $this->retrieveData();
        foreach($this->genresList as $genres)
        {
            if($genres->getIdGenres() == $objeto)
            {
                $nombre=$genres->getNameGenres();
            }
        }
        return $nombre; 
    }
  
    private function retrieveData()
    {
        $this->genresList= array();
        $jsonContent= file_get_contents('https://api.themoviedb.org/3/genre/movie/list?api_key=8c491ec0ca4ed58cbf814b5ee1618a44&language=en-US', true);
        $arrayTodecode = ($jsonContent) ? json_decode($jsonContent, true) : array();
        $genresArray = $arrayTodecode;
        var_dump($genresArray);
        foreach($genresArray as $valor)
        {
            foreach($valor as $key=>$valor2)
            {
                $genres= new Genres();
                $genres->setIdGenres($valor2['id']);
                $genres->setNameGenres($valor2['name']);
                var_dump($genres);
                array_push($this->genresList, $genres);
            }
        }
    }
}
?>