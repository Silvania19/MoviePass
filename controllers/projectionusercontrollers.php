<?php
    namespace controllers;
    use models\Projection as projection;
    use daodb\ProjectionDao as projectionD;
    use daosjson\MovieDao as movieD;
    use daosjson\GenresDao as genreD;
    use daodb\CineDao as cineD;
    use daodb\CinemaDao as cinemaD;
    use controllers\MovieControllers as movieC;
    class ProjectionUserControllers
    {
        private $listMovie;
        private $listGenre;
        private $listProjection;
        private $listCine;
        private $listCinema;
        private $movieContro;
        public function __construct()
        {
            $this->listMovie=new movieD();
            $this->listGenre=new genreD();
            $this->listProjection=new projectionD();
            $this->listCine=new cineD();
            $this->listCinema=new cinemaD();
            $this->movieContro= new movieC();
        }


    }

?>