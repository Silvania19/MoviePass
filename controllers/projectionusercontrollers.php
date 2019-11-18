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
        public function carteleraxMovie($idMovie=null)
        {
            
            $user=$this->userContro->checkSession();
            $projections=$this->listProjection->GetAllActuales();
            $listMoviesAct=$this->moviesProjections();
            $movies=array();
            $cinesAll=$this->listCine->GetAll();
            $cines=array();
           $cartelera=array();
            if(!empty($projections))
            {
                if(is_array($projections))
                {
                  
                       foreach($projections as $proj)
                       {
                      
                             if($proj->getIdMovie()==$idMovie)
                             {
                               
                                    foreach($listMoviesAct as $mo)
                                    {
                                        
                                        if($mo->getIdMovie()==$idMovie)
                                        {
                                        
                                        $movies['0']=$mo;
                                       
                                        
                                        }
                                    } 
                                    array_push($cartelera,  $proj); 
                            }
                       }
                        foreach($cartelera as $proje)
                       {
                          foreach($cinesAll as $c) 
                           {
                                if($c->getIdCine()== $proje->getIdCine())
                                {
                                    array_push($cines, $c);
                                }
                           }
                          
                       }
                
                }
                if(is_object($projections))
                {
                    
                   if($projections->getIdMovie()==$idMovie && $projection->getIdCine()==$cines->getIdCine()&& $projection->getIdMovie()==$idMovie)
                   {
                    $movie=$this->listMovie->Search($movies->getIdMovie());
                    $cine=$this->listCine->Search($cines->getIdCine());
                    array_push($cartelera, $this->listProjection->Search($projections->getIdProjection()));
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
        public function carteleraXCine($idCine)
        {
            $user=$this->userContro->checkSession();
            $projections=$this->listProjection->GetAllActuales();
            $listMoviesAct=$this->moviesProjections();
            $movies=array();
           
            $cines=array();
           $cartelera=array();
            if(!empty($projections))
            {
                if(is_array($projections))
                {
                  
                       foreach($projections as $proj)
                       {
                      
                             if($proj->getIdCine()==$idCine)
                             {
                               
                                   $cines['0']=$this->listCine->Search($idCine);
                                      array_push($cartelera,  $proj);
                            }
                            
                       }
                        foreach($cartelera as $proje)
                       {
                          foreach($listMoviesAct as $mo) 
                           {
                                if($mo->getIdMovie()== $proje->getIdMovie())
                                {
                                    array_push($movies, $mo);
                                }
                           }
                          
                       }
                
                }
                if(is_object($projections))
                {
                    
                   if($projections->getIdMovie()==$idMovie && $projection->getIdCine()==$cines->getIdCine()&& $projection->getIdMovie()==$idMovie)
                   {
                    $movie=$this->listMovie->Search($movies->getIdMovie());
                    $cine=$this->listCine->Search($cines->getIdCine());
                    array_push($cartelera, $this->listProjection->Search($projections->getIdProjection()));
                   }
                }
                  
                   include(VIEWS_PATH."cartelerauser.php");
            }
           
   
        }
    }

?>