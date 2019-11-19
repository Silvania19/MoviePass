<?php
namespace daodb;
use models\User as user;
USE interfaces\Idaos as Idaos;
use daodb\Connection as   Connection;

class UserDao implements Idaos
{
    private $connection;
    public function __construct()
    {

    }
    public function GetAll()
    {
        
        $sql="SELECT * FROM users";
        try {
            $this->connection = Connection::getInstance();
            $listUser = $this->connection->execute($sql);  
           
        } catch (\PDOException  $ex) {
            throw $ex;
        }
        if (!empty($listUser))
        {
            return $this->mapear($listUser);
          
        }
        else{
            return false;
        }
    }
    public function Add($objeto)
    {
       
        // Guardo como string la consulta sql utilizando como values, marcadores de parámetros con nombre (:name) o signos de interrogación (?)
        // por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada
        $sql="INSERT INTO users (name, lastName, dni, email, password, idRol ) VALUES (:name, :lastName, :dni, :email, :password, :idRol)";
       
        
        $valuesArray["name"] = $objeto->getName();
        $valuesArray["lastName"] = $objeto->getLastName();
        $valuesArray['dni']= $objeto->getDni();
        $valuesArray["email"] = $objeto->getEmail();
        $valuesArray["password"] = $objeto->getPassword();
        $valuesArray['idRol']=$objeto->getIdRol();
       
        try {
            $this->connection= Connection::getInstance();
            return $this->connection->executeNonQuery($sql, $valuesArray);
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
        $newUser =new user($pos['name'], $pos['lastName'], $pos['dni'] , $pos['email'], $pos['password'], $pos['idRol']);
        
       $newUser->setIdUser($pos['idUser']);
        return $newUser;
       }, $arreglo);
       return count($arregloObjetos)>1? $arregloObjetos: $arregloObjetos['0'];
   }
   public function Delete($objeto)
   {
       $sql = "DELETE FROM users WHERE idUser = :idUser";
       $parameters['idUser'] = $objeto;

       try
       {
           $this->connection = Connection::getInstance();
           return $this->connection->ExecuteNonQuery($sql, $parameters);
       }
       catch(PDOException $e)
       {
           throw $e;
       }
   }
    public function Update($objeto, $buscador)
    { 
        $sql="UPDATE users SET name=:name, lastName=:lastName, dni=:dni, email=:email, password =:password WHERE idUser='$buscador';";
        $parameters['name']=$objeto->getName();
        $parameters["lastName"]=$objeto-> getLastName();
        $parameters["dni"]=$objeto->getDni();
        $parameters["password"]=$objeto->getPassword();
        $parameters['email']=$objeto->getEmail();
        try
        {
            $this->connection = Connection::getInstance();
            return $this->connection->ExecuteNonQuery($sql, $parameters);
        }
        catch(\PDOException $e)
        {
            throw $e;
        }
      
    }
    public function Search($objeto)
    {
      $sql="SELECT * FROM users where email=:email";   
      $parameters['email']=$objeto;
      try {
          $this->connection = Connection:: getInstance();
          $resul=$this->connection->execute($sql, $parameters);
      } catch (\PDOException $th) {
        throw  $th;
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