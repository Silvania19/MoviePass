<?php 
namespace models;
    class Projection
    {
        private $idProjection;
        private $date;
        private $hour;
        private $idCine;
        private $idMovie;
        private $idCinema;
        private $duration;

        public function __construct( $date, $hour, $idCine, $idMovie, $idCinema, $duration)
        {
            $this->date=$date;
            $this->hour=$hour;
            $this->idCine=$idCine;
            $this->idMovie=$idMovie;
            $this->idCinema=$idCinema;
            $this->duracion=$duration;
        }
        public function setIdProjection($idProjection)
        {
            $this->idProjection=$idProjection;
        }
        public function setDate($date)
        {
            $this->date=$date;
        }
        public function setHour($hour)
        {
            $this->hour=$hour;
        }
        public function setIdCine($idCine)
        {
            $this->idCine=$idCine;
        }
        public function setIdMovie($idMovie)
        {
            $this->idMovie=$idMovie;

        }
        public function setIdCinema($idCinema)
        {
            $this->idCinema=$idCinema;
        }
        public function setDuration($duration)
        {
            $this->duracion=$duration;
        }
        public function getIdProjection()
        {
            return $this->idProjection;
        }
        public function getDate()
        {
            return $this->date;
        }
        public function getHour()
        {
            return $this->hour;
        }
        public function getIdCine()
        {
            return $this->idCine;
        }
        public function getIdMovie()
        {
            return $this->idMovie;
        }
        public function getIdCinema()
        {
            return $this->idCinema;
        }
        public function getDuration()
        {
            return $this->duration;
        }
    }

?>