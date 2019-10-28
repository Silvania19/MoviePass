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
     
     public function exucute($query, $parameters=array())
     {
        try {
            $this->pdoStatement=$this->pdo->prepare($query);
           
            foreach ($parameters as $parameterName => $value) {
              $this->pdoStatement->bindParam(":".$parameterName, $value);
            }
            $this->pdoStatement->execute();
            return $this->pdoStatement->fetchAll();
        } catch (\Excepcion $ex) {
            throw $ex;
        }
     }
   

   //  execute lo ejecuto caundo tengo que traer algo de datos
   public function executeNonQuery($query, $parameters = array())
   {
        try
        {
             // Creo una sentencia llamando a prepare. Esto devuelve un objeto statement
             $this->pdoStatement = $this->pdo->prepare($query);
             foreach($parameters as $parameterName => $value) {
                  // Reemplazo los marcadores de parametro por los valores reales utilizando el método bindParam().
                  $this->pdoStatement->bindParam(":$parameterName", $parameters[$parameterName]);
             }
             $this->pdoStatement->execute();
             return $this->pdoStatement->rowCount();
        }
        catch(\PDOException $ex)
        {
             throw $ex;
        }
   }

 }
?>