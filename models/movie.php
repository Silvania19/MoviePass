<?php
namespace models;
class Movie
{
   private  $idMovie;
   private $title;
   private $original_title;
   private $original_lenguage;
   private $overview;//resumen, descripcion
   private $poster_path; //camino al cartel
   private $adult;//tendra un valor booleano si es que es para adultos o no
   private $release_date; //fecha de lanzamiento
   private $genre_ids;//id del genero al que pertenece
   private $backdrop_path;//camino de fondo 
   private $popularity;
   private $vote_count;
   private $video;//vote_avarege ver si variable o no
   public function __construct()
   {

   }
   public function setIdMovie($idMovie)
   {
    $this->idMovie=$idMovie;
   }
   public function setTitle($title)
   {
    $this->title=$title;
   }
   
   public function setOriginal_title($original_title)
   {
       $this->original_title=$original_title;
   }
   public function setOriginal_language($original_lenguage)
   {
       $this->original_lenguage=$original_lenguage;
   }
   public function setOverview($overview)
   {
       $this->overview=$overview;
   }
   public function setPoster_path($poster_path)
   {
       $this->poster_path=$poster_path;
   }
   public function setAdult($adult)
   {
       $this->adult=$adult;
   }
   public function setRelease_date($release_date)
   {
       $this->release_date=$release_date;
   }
   public function setGenre_ids($genre_ids)
   {
       $this->genre_ids=$genre_ids;
   }
   public function setBackdrop_path($backdrop_path)
   {
       $this->backdrop_path=$backdrop_path;
   }
   public function setPopularity($popularity)
   {
       $this->popularity=$popularity;
   }
   public function setVote_count($vote_count)
   {
       $this->vote_count=$vote_count;
   }
   public function setVideo($video)
   {
       $this->video=$video;
   }
   
   public function getIdMovie()
   {
       return  $this->idMovie;
   }
   public function getTitle()
   {
       return  $this->title;
   }
   public function getOriginal_title()
   {
       return  $this->original_title;
   }
   public function getOriginal_lenguage()
   {
       return  $this->original_lenguage;
   }
   public function getOverview()
   {
       return  $this->overview;
   }
   public function getAdult()
   {
       return  $this->adult;
   }
   public function getPoster_Path()
   {
       return  $this->poster_path;
   }
   public function getRelease_date()
   {
       return  $this->release_date;
   }
   public function getGenre_ids()
   {
       return  $this->genre_ids;
   }
   public function getBackdrop_path()
   {
       return  $this->backdrop_path;
   }
   public function getPopularity()
   {
       return  $this->popularity;
   }
   public function getVote_count()
   {
       return  $this->vote_count;
   }
   public function getVideo()
   {
       return  $this->video;
   }
}