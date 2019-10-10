
    <?php
    include ('header.php');
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

        include ('config/autoload.php');
        use config\Autoload as auto;
        use model\Person as per;
        auto::Start();
        $persona=new per('silvania');
        
        echo $persona->getName();
        include ('footer.php');
    ?>
