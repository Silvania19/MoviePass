<?php
namespace daodb;
use models\Cinema as cinema;
USE interfaces\Idaos as Idaos;
use daodb\Connection as   Connection;

class CinemaDao implements Idaos
{
    private $connection;
    public function __construct()
    {

    }
    public function GetAll()
    {
        
        $sql="SELECT * FROM cinemas";
        try {
            $this->connection = Connection::getInstance();
            $listCinemas = $this->connection->execute($sql);  
           
        } catch (\PDOException  $ex) {
            throw $ex;
        }
        if (!empty($listCinemas))
        {
            return $this->mapear($listCinemas);
          
        }
        else{
            return false;
        }
    }
    public function Add($objeto)
    {
        // Guardo como string la consulta sql utilizando como values, marcadores de parámetros con nombre (:name) o signos de interrogación (?)
        // por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada
        $sql="INSERT INTO cinemas (idCine, numberCinema, capacity) VALUES (:idCine,:numberCinema, :capacity)";
      
        $parameters["idCine"]=$objeto->getIdCine();
        $parameters['numberCinema']=$objeto->getNumberCinema();
        $parameters["capacity"]=$objeto->getCapacity();
    
        try {
            $this->connection= Connection::getInstance();
            return $this->connection->executeNonQuery($sql, $parameters);
        } catch (\PDOException $ex) {
            throw $ex;
        }
    }
   /**
    * convertivos lo que traemos de la base de datos que es un arreglo donde 
    *cada posicion lo que tiene es un arreglo con los datos, a un arreglo de objeto del tipo al que pertece.
   **/
   private function mapear($arreglo)
   {
       $arreglo=is_array($arreglo)?$arreglo:[];
       $arregloObjetos=array_map(function($pos)
       {
        $newCinema =new cinema($pos['idCine'],$pos['numberCinema'], $pos['capacity']);
        $newCinema->setIdCinema($pos['idCinema']);
        return $newCinema;
       }, $arreglo);
       return count($arregloObjetos)>1? $arregloObjetos: $arregloObjetos['0'];
   }
   public function Delete($email)
   {
       $sql = "DELETE FROM cinemas WHERE idCinema = :idCinema";
       $parameters['idCinema'] = $email;

       try
       {
           $this->connection = Connection::getInstance();
           return $this->connection->ExecuteNonQuery($sql, $parameters);
       }
       catch(PDOException $e)
       {
           echo $e;
       }
   }
    
    public function Update($objeto, $buscador)
    {
        $sql="UPDATE cines SET idCine=:idCine, numberCine=:numberCine, capacity=:capacity  WHERE idCinema='$buscador';";
        $parameters['idCine']=$objeto->getIdCine();
        $parameters["numberCinema"]=$objeto->getNumberCinema();
        $parameters["capacity"]=$objeto->getCapacity();
   
        try
        {
            $this->connection = Connection::getInstance();
            return $this->connection->ExecuteNonQuery($sql, $parameters);
        }
        catch(PDOException $e)
        {
            echo $e;
        }
      
    }
    public function Search($objeto)
    {
      $sql="SELECT * FROM cinemas where objeto=:numberCinema";   
      $parameters['numberCinema']=$objeto;
      try {
          $this->connection = Connection:: getInstance();
          $resul=$this->connection->execute($sql, $parameters);
      } catch (\PDOException $th) {
          throw $th;
      }
      if(!empty ($resul))
      {
          return $this->mapear($resul);
      }
      else
      {
          return  false;
      }
    }
    public function SearchIdCine($objeto)
    {
      $sql="SELECT * FROM cinemas where idCine=:idCine";   
      $parameters['idCine']=$objeto;
      try {
          $this->connection = Connection:: getInstance();
          $resul=$this->connection->execute($sql, $parameters);
      } catch (\PDOException $th) {
          throw $th;
      }
      if(!empty ($resul))
      {
          return $this->mapear($resul);
      }
      else
      {
          return  false;
      }
    }
}
?>


?>