
    <?php
    
   
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

        include ('config/autoload.php');
        include ('config/constantes.php');
        include ('config/request.php');
        include ('config/router.php');
       
        use config\Autoload as auto;
        use config\Router as router;
        use config\Request as request;
        auto::Start();
        session_start();
        router:: address(new request);
    ?>

