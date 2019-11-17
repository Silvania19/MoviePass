<?php
    namespace controllers;
    use models\Projection as projection;
    use daodb\ProjectionDao as projectionD;
    use daosjson\MovieDao as movieD;
    use daosjson\GenresDao as genreD;
    use daodb\CineDao as cineD;
    use daodb\CinemaDao as cinemaD;
    use controllers\MovieControllers as movieC;
    use controllers\UserControllers as userC;
    class ProjectionUserControllers
    {
        private $listMovie;
        private $listGenre;
        private $listProjection;
        private $listCine;
        private $listCinema;
        private $movieContro;
        private $userContr;
        public function __construct()
        {
            $this->listMovie=new movieD();
            $this->listGenre=new genreD();
            $this->listProjection=new projectionD();
            $this->listCine=new cineD();
            $this->listCinema=new cinemaD();
            $this->movieContro= new movieC();
            $this->userContro= new userC();
        }

        public function filterGenre($idGenre=null)
        {
           $user=$this->userContro->checkSession();
            $movies=$this->moviesProjections();
            $filter=array();
            if(is_array($movies))
            {
                foreach($movies as $movie)
                {
                    $arrayG=$movie->getGenre_ids();
                        foreach($arrayG as $genre)
                        {
                            if($genre == $idGenre)
                            {
                                array_push($filter, $movie);
                            }
                        }
                }   
            }
            $movies=array();
            $listGenres2=$this->listGenre->GetAll();
            include(VIEWS_PATH."home2.php");
        }
        public function filterDateProjection($date=null)
        {
            $user=$this->userContro->checkSession();
            $projections=$this->listProjection->getAllActuales();
           
            $filter=array();
            if(!empty($projections))
            { 
                if(is_array($projections))
                {
                    foreach($projections as $pro)
                    {
                        
                        if($pro->getDate()==$date)
                        {
                          $movie=$this->listMovie->Search($pro->getIdMovie());
                          array_push($filter, $movie);
                        }
                    }
                }
                if(is_object($projections))
                {
                    if($projections->getDate()==$date)
                        {
                          $movie=$this->listMovie->Search($projections->getIdMovie());
                          array_push($filter, $movie);
                        }
                }
             
             $listGenres2=$this->listGenre->GetAll();
            
             include(VIEWS_PATH."home2.php");
            }
        } 
        public function moviesxCines($idMovie=null)
        {
            
            $user=$this->userContro->checkSession();
            $projections=$this->listProjection->GetAllActuales();
            $movies=$this->listMovie->GetAll();
            $cines=$this->listCine->GetAll();
           
            if(!empty($projections))
            {
                if(is_array($projections))
                {
                   foreach($cines as $c)
                   {
                       foreach($projections as $proj)
                       {
                           foreach($movies as $mo)
                           {
                             
                             if(($proj->getIdCine()==$c->getIdCine())&& ($proj->getIdMovie()==$idMovie)&&($mo->getIdMovie()==$idMovie))
                             {
                              $movie=$this->listMovie->Search($mo->getIdMovie());
                              $cine=$this->listCine->Search($c->getIdCine());
                              $proj=$this->listProjection->Search($proj->getIdProjection());
                             
                             }
                           }
                       }
                   }
                }
                if(is_object($projection))
                {
                    
                   if( ($projections->getIdMovie()=$idMovie) && ($projection->getIdCine()==$cines->getIdCine())&& ($projection->getIdMovie()==$idMovie)
                   {
                    $movie=$this->listMovie->Search($movies->getIdMovie());
                    $cine=$this->listCine->Search($cines->getIdCine());
                    $proj=$this->listProjection->Search($projections->getIdProjection());
                   }
                }
                   include(VIEWS_PATH."cartelerauser.php");
            }
           

  
        }  
        public function moviesProjections()
        {
          
          $movies=$this->listMovie->GetAll();
          
          $resulMovie=array();
          if(!empty($movies))
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
        public function carteleraXMovies($idCine)
        {
            
            $cines= $this->listCine->GetAll();
            $projection=$this->listProjection->GetAllActuales();
            if(!empty($cines))
            {
                 foreach ($cines as $c)
                 {
                     foreach ($projection as $p) 
                     {
                         if($c->getIdCine()==$idCine)
                        { 
                           if($p->getIdCine()==$idCine)
                           {
                            $cine=$this->listCines->Search($c->getIdCine());
                            $projection=$this->listProjection->Search($p->getIdCine());
                           }
                        }
                     }
                    
                
                 }
                 include(VIEWS_PATH."cartelerauser.php");
            }
        }

    }

?>