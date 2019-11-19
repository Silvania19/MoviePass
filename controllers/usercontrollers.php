<?php
    namespace controllers;
    use models\User as User;
    use daosjson\UserDao as userD;
    use daodb\ProjectionDao as projectionD;
    use daosjson\MovieDao as movieD;
    use daosjson\GenresDao as genreD;
    use controllers\MovieControllers as movieC;
    class UserControllers
    {
        private $daoUser;//en esta variable tiene una instancia de la clase Dao user, 
        private $listMovie;
        private $listProjection;
        private $listGenre;
        private $movieContro;
        public function __construct()
        {
            $this->daoUser = new userD();
            $this->listMovie= new movieD();
            $this->listProjection= new projectionD();
            $this->listGenre= new genreD();
            $this->movieContro=new movieC();

        }
        public function login($email = null, $password = null)
        {  
            try {
                $user=$this->daoUser->Search($email);
            } catch (\Throwable $th) {
                $controlScritpt=1;
                $message='error en la base';
                include(VIEWS_PATH."home.php");
            }
           
            
            $controScript=0;
            if(isset($user))
            {
                if($user->getPassword()==$password)
                {
                    $_SESSION['user']=$user;
                    $movies=$this->movieContro->SeeMovies();
                    try {
                        try {
                             $listGenres2=$this->listGenre->GetAll();
                        include(VIEWS_PATH."home2.php");
                        } catch (\Throwable $th) {
                            $controlScritpt=1;
                            $message='error en la base';
                            //no se include(VIEWS_PATH."userviews.php");
                        }
                        
                        
                    } catch (\Throwable $th) {
                        include(VIEWS_PATH."home.php");
                    }
                   
               }
            }
            
        }
        public function signUp($name=null , $lastName=null ,  $dni=null ,  $email=null , $password=null)
        {
        
            $idRol=1;
            $user=new User($name,$lastName, $dni, $email, $password, $idRol);
            try {
                $this->daoUser->Add($user);
                $movies=$this->movieContro->SeeMovies();
                $listGenres2=$this->listGenre->GetAll();
                $_SESSION['user']=$user;//pongo en session al nuevo usuario qye se acabo de resistrar
                include(VIEWS_PATH."home2.php");
            } catch (\PDOException $th) {
                $controlScritpt=1;
                $message='error en la base';
                include(VIEWS_PATH."home2.php");
            }
           
        }
        public function deleteUser( $verificacion=null)
        {
            $controScript=0;
            if($verificacion=='si')
            {
            if(isset($_SESSION['user']))
            {

            $user=$_SESSION['user'];
            } 
            if (isset($user))
            {
                $controlScript=1;
                $idUser=$user->getIduser();
                try {
                     $this->daoUser->Delete($idUser);
                $massage='user deleted' ;
                include(VIEWS_PATH."home.php");
                
                } catch (\PDOException $th) {
                    $controlScritpt=1;
                    $message='error en la base';
                    include(VIEWS_PATH."home.php");
                }
               
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
            try {
                 $this->daoUser->Update($user, $User1->getIduser());
            $_SESSION['user']=$user;
            include(VIEWS_PATH."userviews.php");
            } catch (\PDOException $th) {
                $controlScritpt=1;
         $message='error en la base';
         include(VIEWS_PATH."userviews.php");
            }
           
        }
        public function checkSession ()
        {
            if (session_status() == PHP_SESSION_NONE)
                session_start();

            if(isset($_SESSION['user'])) {
                try {
                    $user = $this->daoUser->Search($_SESSION['user']->getEmail()) ;
                } catch (\Throwable $th) {
                    $controlScritpt=1;
                    $message='error en la base';
                    include(VIEWS_PATH."home.php");
                }
                if($user->getPassword() == $_SESSION['user']->getPassword())
                    return $user;

              

            } else {
                return false;
            }
        }



    }
?>