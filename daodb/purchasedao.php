<?php

namespace daodb;

use models\Purchase as purchase;
use interfaces\Idaos as Idaos;
use daodb\Connection as   Connection;

class PurchaseDao implements Idaos
{
    private $connection;

    public function __construct()
    { }
    public function GetAll()
    {

        $sql = "SELECT * FROM purchases";
        try {
            $this->connection = Connection::getInstance();
            $listPurchases = $this->connection->execute($sql);
        } catch (\PDOException  $ex) {
            throw $ex;
        }
        if (!empty($listPurchases)) {
            return $this->mapear($listPurchases);
        } else {
            return false;
        }
    }
    public function Add($objeto)
    {

        // Guardo como string la consulta sql utilizando como values, marcadores de parámetros con nombre (:name) o signos de interrogación (?)
        // por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada
        $sql = "INSERT INTO purchases (discount, amount, quantityTickets, idProjection, time, idUser, state) VALUES (:discount, :amount, :quantityTickets, :idProjection, :time, :idUser, :state)";
        $valuesArray["discount"] = $objeto->getDiscount();
        $valuesArray["amount"] = $objeto->getAmount();
        $valuesArray['quantityTickets'] = $objeto->getQuantityTickets();
        $valuesArray["idProjection"] = $objeto->getIdProjection();
        $valuesArray['time'] = $objeto->getTime();
        $valuesArray['idUser'] = $objeto->getIdUser();
        $valuesArray['state'] = $objeto->getState();

        try {
            $this->connection = Connection::getInstance();
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
        $arreglo = is_array($arreglo) ? $arreglo : [];
        $arregloObjetos = array_map(function ($pos) {
            $newPurchase = new purchase($pos['discount'], $pos['amount'], $pos['quantityTickets'], $pos['idProjection'], $pos['time'], $pos['idUser'],  $pos['state']);

            $newPurchase->setIdPurchase($pos['idPurchase']);
            return $newPurchase;
        }, $arreglo);
        return count($arregloObjetos) > 1 ? $arregloObjetos : $arregloObjetos['0'];
    }
    public function Delete($objeto)
    {
        $sql = "DELETE FROM purchases WHERE idPurchase = :idPurchase";
       
        $parameters['idPurchase'] = $objeto;

        try {
            $this->connection = Connection::getInstance();
            return $this->connection->ExecuteNonQuery($sql, $parameters);
        } catch (PDOException $e) {
            throw $e;
        }
    }
    public function inactivate($objeto)
    {
        $sql = "UPDATE purchases SET state=0 WHERE idPurchase = :idPurchase";
       
        $parameters['idPurchase'] = $objeto;

        try {
            $this->connection = Connection::getInstance();
            return $this->connection->ExecuteNonQuery($sql, $parameters);
        } catch (PDOException $e) {
            throw $e;
        }
    }
  
     public function Update($objeto, $buscador)
     { 
         $sql="UPDATE projections SET  discount=:discount, amount=:amount, quantityTickets=:quantityTickets,  idProjection =:idProjection, time=:time WHERE idPurchase='$buscador';";
         $parameters['discount']=$objeto->getDiscount();
        
         $parameters["quantityTickets"]=$objeto->getQuantityTickets();
          $parameters["amount"]=$objeto->getAmount();
         $parameters['idProjection']=$objeto->getIdProjection();
         $parameters['time']=$objeto->getTime();
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
        $sql = "SELECT * FROM purchases where idPurchase=:idPurchase";
        $parameters['idPurchase'] = $objeto;
        try {
            $this->connection = Connection::getInstance();
            $resul = $this->connection->execute($sql, $parameters);
        } catch (\PDOException $th) {
            throw $th;
        }
        if (!empty($resul)) {
            return $this->mapear($resul);
        } else {
            return  false;
        }
    }
    public function SearchXIdPurchase()
    {
        $sql="SELECT pu.* from pays as py join purchases as pu on py.idPurchase=pu.idPurchase";
       
        try {
            $this->connection = Connection::getInstance();
            $resul = $this->connection->execute($sql);
        } catch (\PDOException $th) {
            throw $th;
        }
        if (!empty($resul)) {
            return $this->mapear($resul);
        } else {
            return  false;
        }
    }
    public function SearchXUser($idUser)
    {
        $sql = "SELECT * FROM purchases where idUser=:idUser";
        $parameters['idUser'] = $idUser;
        try {
            $this->connection = Connection::getInstance();
            $resul = $this->connection->execute($sql, $parameters);
        } catch (\PDOException $th) {
            throw $th;
        }
        if (!empty($resul)) {
            return $this->mapear($resul);
        } else {
            return  false;
        }
    }
    public function SearchIdPurchase($objeto)
    {
      $sql="SELECT * FROM purchases where idProjection=:idProjection";   
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
}
