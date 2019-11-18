<?php
 namespace daodb;
 use models\Purchase as purchase;
 USE interfaces\Idaos as Idaos;
 use daodb\Connection as   Connection;
 
 class PurchaseDao implements Idaos
 {
     private $connection;
     public function __construct()
     {
 
     }
     public function GetAll()
     {
         
         $sql="SELECT * FROM purchases";
         try {
             $this->connection = Connection::getInstance();
             $listPurchases = $this->connection->execute($sql);  
            
         } catch (\PDOException  $ex) {
             throw $ex;
         }
         if (!empty($listUser))
         {
             return $this->mapear($listPurchases);
           
         }
         else{
             return false;
         }
     }
     public function Add($objeto)
     {
        
         // Guardo como string la consulta sql utilizando como values, marcadores de parámetros con nombre (:name) o signos de interrogación (?)
         // por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada
         $sql="INSERT INTO purchases (discount, amount, quantityTickets, wayToPay, idProjection, remaider) VALUES (:discount, :amount, :quantityTickets, :wayToPay, :idProjection, :remaider)";
        
         
         $valuesArray["discount"] = $objeto->getDiscount();
         $valuesArray["amount"] = $objeto->getAmount();
         $valuesArray['quantityTickets']= $objeto->getQuantityTickets();
         $valuesArray["wayToPay"] = $objeto->getWayToPay();
         $valuesArray["idProjection"] = $objeto->getIdProjection();
         $valuesArray['remainder']=$objeto->getRemaider();
        
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
         $newPurchase =new purchase($pos['discount'], $pos['amount'], $pos['quantityTickets'] , $pos['wayToPay'], $pos['idProjection'], $pos['remainder']);
         
        $newPurchase->setIdPurchase($pos['idPurchase']);
         return $newPurchase;
        }, $arreglo);
        return count($arregloObjetos)>1? $arregloObjetos: $arregloObjetos['0'];
    }
    public function Delete($objeto)
    {
        $sql = "DELETE FROM purchases WHERE idPurchase = :idPurchase";
        $parameters['idPurchase'] = $objeto;
 
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
         $sql="UPDATE projections SET  discount=:discount, amount=:amount, quantityTickets=:quantityTickets, wayToPay=:wayToPay, idProjection =:idProjection, remaider=:remaider WHERE idPurchase='$buscador';";
         $parameters['discount']=$objeto->getName();
         $parameters["amount"]=$objeto-> getLastName();
         $parameters["quantityTickets"]=$objeto->getDni();
         $parameters["wayToPay"]=$objeto->getPassword();
         $parameters['idProjection']=$objeto->getEmail();
         $parameters['reimader']=$objeto->getRemaider();
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
       $sql="SELECT * FROM purchases where idPurchase=:idPurchase";   
       $parameters['idPurchase']=$objeto;
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