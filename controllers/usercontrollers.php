<?php
    namespace controllers;
    use models\User as User;
    use daosjson\UserDao as userD;
    use daodb\ProjectionDao as projectionD;
    use daosjson\MovieDao as movieD;
    use daosjson\GenresDao as genreD;
    class UserControllers
    {
        private $daoUser;//en esta variable tiene una instancia de la clase Dao user, 
        private $listMovie;
        private $listProjection;
        private $listGenre;
        public function __construct()
        {
            $this->daoUser = new userD();
            $this->listMovie= new movieD();
            $this->listProjection= new projectionD();
            $this->listGenre= new genreD();

        }
        public function login($email = null, $password = null)
        {  

            $user=$this->daoUser->Search($email);
        
            if($user)
            {
                if($user->getPassword()==$password)
                {
                    $_SESSION['user']=$user;
                    $movies=$this->SeeMovies();
                    $listGenres2=$this->listGenre->GetAll();
                    include(VIEWS_PATH."home2.php");
                }
                else
                {
                echo" <script>alert('incorrect password');</script>" ;
                include(VIEWS_PATH."home.php");
                }
                
            }
            else
            {
                echo "<script>alert('incorrect user');</script>" ;
                include(VIEWS_PATH."home.php");
            }
            
        }
        public function signUp($name=null , $lastName=null ,  $dni=null ,  $email=null , $password=null)
        {
        
            $idRol=1;
            $user=new User($name,$lastName, $dni, $email, $password, $idRol);
            $this->daoUser->Add($user);
            $movies=$this->SeeMovies();
            $listGenres2=$this->listGenre->GetAll();
            $_SESSION['user']=$user;//pongo en session al nuevo usuario qye se acabo de resistrar
            include(VIEWS_PATH."home2.php");
        }
        public function deleteUser( $verificacion=null)
        {
            
            if($verificacion=='si')
            {
            if(isset($_SESSION['user']))
            {

            $user=$_SESSION['user'];
            } 
            if (isset($user))
            {
                $idUser=$user->getIduser();
                $this->daoUser->Delete($idUser);
                echo" <script>alert('user deleted');</script>" ;
                include(VIEWS_PATH."home.php");
                
            }
            }
            if($verificacion=='no')
            {
            
                $user=$_SESSION['user'];
                include(VIEWS_PATH."administratorviews.php");
            }
        }
        public function update( $name=null, $lastName=null, $dni=null,  $email=null,  $password=null)
        {
            $User1=$_SESSION['user'];//ver esto
            $user=new User($name,$lastName, $dni, $email, $password);
            $this->daoUser->Update($user, $User1->getIduser());
            $_SESSION['user']=$user;
            include(VIEWS_PATH."userviews.php");
        }
        public function checkSession ()
        {
            if (session_status() == PHP_SESSION_NONE)
                session_start();

            if(isset($_SESSION['user'])) {

                $user = $this->daoUser->Search($_SESSION['user']->getEmail());

                if($user->getPassword() == $_SESSION['user']->getPassword())
                    return $user;

            } else {
                return false;
            }
        }
        public function SeeMovies()
        {
        
            $movies=$this->listMovie->GetAll();
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