<?php
namespace daodb;
use models\Projection as projection;
USE interfaces\Idaos as Idaos;
use daodb\Connection as   Connection;

class ProjectionDao implements Idaos
{
    private $connection;
    public function __construct()
    {

    }
    public function GetAll()
    {
        
        $sql="SELECT * FROM projections";
        try {
            $this->connection = Connection::getInstance();
            $listProjection = $this->connection->execute($sql);  
           
        } catch (\PDOException  $ex) {
            throw $ex;
        }
        if (!empty($listProjection))
        {
            return $this->mapear($listProjection);
          
        }
        else{
            return false;
        }
    }
    public function Add($objeto)
    {
        // Guardo como string la consulta sql utilizando como values, marcadores de parámetros con nombre (:name) o signos de interrogación (?)
        // por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada
        $sql="INSERT INTO projections (date, hour, idCine, idMovie, idCinema, duration) VALUES (:date, :hour, :idCine,:idMovie, :idCinema, :duration)";
      
        $parameters["date"]=$objeto->getDate();
        $parameters['hour']=$objeto->getHour();
        $parameters["idCine"]=$objeto->getIdCine();
        $parameters["idMovie"]=$objeto->getIdMovie();
        $parameters["idCinema"]=$objeto->getIdCinema();
        $parameters["duration"]=$objeto->getDuration();
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
        $newProjection =new projection($pos['date'],$pos['hour'], $pos['idCine'], $pos['idMovie'], $pos['idCinema'], $pos['duration']);
        $newProjection->setIdProjection($pos['idProjection']);
        return $newProjection;
       }, $arreglo);
       return count($arregloObjetos)>1? $arregloObjetos: $arregloObjetos['0'];
   }
    public function Delete($idProjection)
    {
        $sql = "DELETE FROM projections WHERE idProjection = :idProjection";
        $parameters['idProjection'] = $idProjection;

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
        $sql="UPDATE projections SET date=:date, hour=:hour, idCine=:idCine, idMovie=:idMovie, idCinema=:idCinema, duration=:duration WHERE email = '$buscador';";
        $parameters['hour']=$objeto->getHour();
        $parameters["date"]=$objeto->getDate();
        $parameters["idCine"]=$objeto->getIdCine();
        $parameters['idMovie']=$objeto->getIdMovie();
        $parameters["idCinema"]=$objeto->getIdCinema();
        $parameters['duration']=$objeto->getDuration();
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
      $sql="SELECT * FROM projections where idProjection=:idProjection";   
      $parameters['idProjection']=$objeto;
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
public function SearchXCine($objeto)
{
  $sql="SELECT * FROM projections where idCine=:idCine";   
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
public function SearchXMovie($idMovie, $idCine)
{
  $sql="SELECT * FROM projections where idMovie=:idMovie and idCine=:idCine";   
  $parameters['idMovie']=$idMovie;
  $parameters['idCine']=$idCine;
  try {
      $this->connection = Connection:: getInstance();
      $resul=$this->connection->execute($sql, $parameters);
      
  } catch (\PDOException $th) {
      throw $th;
  }
  if(!empty ($resul))
  {
      return true;
  }
  else
  {
      return  false;
  }
}


public function SearchXMovieXCineXDate($idMovie, $idCine, $date)
{
  $sql="SELECT * FROM projections where (idCine=$idCine and idMovie=$idMovie and date='$date');";   
  $parameters['idCine']=$idCine;
  $parameters['idMovie']=$idMovie;
  $parameters['date']=$date;

  
  try {
      $this->connection = Connection:: getInstance();
      $resul=$this->connection->execute($sql);
     
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