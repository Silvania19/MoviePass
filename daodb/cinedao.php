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
            $sql="INSERT INTO cines (name, idUserAdministrator, address) VALUES (:name, :idUserAdministrator, :address)";
        
            $parameters["name"]=$objeto->getName();
            $parameters['idUserAdministrator']=$objeto->getIdUserAdministrator();
            $parameters["address"]=$objeto->getAddress();
        
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
            $newCine =new cine($pos['name'], $pos['idUserAdministrator'], $pos['address']);
            $newCine->setIdCine($pos['idCine']);
            return $newCine;
        }, $arreglo);
        return count($arregloObjetos)>1? $arregloObjetos: $arregloObjetos['0'];
    }
        public function Delete($objeto)
        {
            $sql = "DELETE FROM cines WHERE idCine = :idCine";
            $parameters['idCine'] = $objeto;

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
            $sql="UPDATE cines SET name=:name, idUserAdministrator=:idUserAdministrator, address=:address WHERE idCine = '$buscador';";
            $parameters['name']=$objeto->getName();
            $parameters["idUserAdministrator"]=$objeto->getIdUserAdministrator();
            $parameters["address"]=$objeto->getAddress();
        
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
        public function Search($objeto)
        {
        $sql="SELECT * FROM cines where idCine=:idCine";   
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