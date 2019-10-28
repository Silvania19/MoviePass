<?php
namespace daodb;
use models\Cine as cine;
USE interfaces\Idaos as Idaos;
use daodb\Connection as   Connection;
class CineDao implements Idaos
{
    private $connection;
    public function __construct()
    {

    }
    public function GetAll()
    {
        $sql="SELECT * FROM cines";
        try {
            $this->connection = Connection::getInstance();
            $listCines = $this->connection->execute($sql);
        } catch (\PDOException  $ex) {
            throw $ex;
        }
        if (!empty($listCines))
        {
            return $this->mapear($listCines);
        }
        else{
            return false;
        }
    }
    public function Add($objeto)
    {
        // Guardo como string la consulta sql utilizando como values, marcadores de parámetros con nombre (:name) o signos de interrogación (?)
        // por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada
        $sql="INSERT INTO cines (idCine, name, idUserAdministrator, email, address) values VALUES (:idCine, :name, :idUserAdministrator,:email, :address)";
        $parameters["idCine"]=$objeto->getIdCine();
        $parameters["name"]=$objeto->getName();
        $parameters['idUserAdministrator']=$objeto->getIdUserAdministrator();
        $parameters["address"]=$objeto->getAddress();
        $parameters["email"]=$objeto->getEmail();
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
        $newCine =new cine($pos['name'],$pos['email'], $pos['idUserAdaministrator'], $pos['address']);
        $newCine->setIdCine(($pos['idCine']);
        return $newCine;
       }, $arreglo);
       return count($arregloObjetos)>1? $arregloObjetos: $arregloObjetos['0'];
   }
    public function Delete($email){

    }
    public function Update($objeto){
        
    }
    public function Search($objeto)
    {
      $sql="SELECT * FROM cines where objeto=:email";   
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