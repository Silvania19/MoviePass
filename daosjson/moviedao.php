<?php
 namespace daosjson;
 use models\Movie as Movie;
 
 class MovieDaos
 {
  $movieList;
  public function __constructor()
  {

  }
  public function getNowMovie()
        {
            return $this->retrieveData();
        }
        private function retrieveData()
        {
            $movielist= array();
            $jsonContent= file_get_contents('https://api.themoviedb.org/3/movie/now_playing?api_key=8c491ec0ca4ed58cbf814b5ee1618a44&language=en-US&page=1', true);
            $arrayTodecode = ($jsonContent) ? json_decode($jsonContent, true) : array();
            $filmArray = $arrayTodecode['results'];
            foreach ($filmArray as $indice)
            {
                $movie= new Movie();
                $movie->setIdMovie($indice['id']);
                $movie->setPopularity($indice['popularity']);
                $movie->setVote_count($indice['vote_count']);
                $movie->setVideo($indice['video']);
                $movie->setPoster_path($indice['poster_path']);
                $movie->setAdult($indice['adult']);
                $movie->setBackdrop_path($indice['backdrop_path']);
                $movie->setOriginal_language($indice['original_language']);
                $movie->setOriginal_title($indice['original_title']);
                $movie->setGenre_ids($indice['genre_ids']);
                $movie->setTitle($indice['title']);
                $movie->setOverview($indice['overview']);
               
                array_push($movielist, $movie);
            }
            return $movielist;
        }

 }
 
?>