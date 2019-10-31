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
        $sql="INSERT INTO users (Name, lastName,email, password ) VALUES (:Name, :lastName, :email, :password)";
       
        
        $valuesArray["name"] = $user->getName();
        $valuesArray["lastName"] = $user->getLastName();
        
        $valuesArray["email"] = $user->getEmail();
        $valuesArray["password"] = $user->getPassword();
       
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
        $newUser =new user($pos['name'], $pos['lastName'], $pos['dni'] , $pos['email'], $pos['password']);
        
       $newUser->setIdUser($pos['idUser']);
        return $newUser;
       }, $arreglo);
       return count($arregloObjetos)>1? $arregloObjetos: $arregloObjetos['0'];
   }
   public function Delete($email)
   {
       $sql = "DELETE FROM users WHERE idUser = :idUser";
       $parameters['idUser'] = $email;

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
      
    }
    public function Search($objeto)
    {
      $sql="SELECT * FROM users where email=:email";   
      $parameters['email']=$objeto;
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