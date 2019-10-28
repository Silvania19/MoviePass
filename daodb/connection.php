<?php
 namespace  daodb;
 class Connection
 {
     private $pdo=null;
     private $pdoStatement=null;
     private static $instance=null;

     public function __construct()
     {
       //  try ya ue viene incluido usaria un if si es que 

       try {
        $this->pdo=new \PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
        $this->pdo->setAtribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
       } catch (\Exception $ex) {
           throw $ex;
           
       }
     }
     public static getInstance()
     {
        if(self::$instance ==null)
        {
            self :: $instance = new Connection();
        }
        return self::$instance;
     }

     execute //lo ejecuto caundo tengo que traer algo de datos
     executenot//

 }
?>