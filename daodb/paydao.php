<?php 
    namespace daodb;
    use models\Pay as pay;
    USE interfaces\Idaos as Idaos;
    use daodb\Connection as   Connection;

    class PayDao implements Idaos
    {
        private $connection;
        public function __construct()
        {

        }
        public function GetAll()
        {
            
            $sql="SELECT * FROM pays";
            try {
                $this->connection = Connection::getInstance();
                $listPays = $this->connection->execute($sql);  
            
            } catch (\PDOException  $ex) {
                throw $ex;
            }
            if (!empty($listPays))
            {
                return $this->mapear($listPays);
            
            }
            else{
                return false;
            }
        }
        public function Add($objeto)
        {
            // Guardo como string la consulta sql utilizando como values, marcadores de parámetros con nombre (:name) o signos de interrogación (?)
            // por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada
            $sql="INSERT INTO pays (wayToPay, idPurchase,  fecha, numberAcount) VALUES (:wayToPay,:idPurchase,:fecha, :numberAcount);";
             
            $parameters["wayToPay"]=$objeto->getWayToPay();
            $parameters['idPurchase']=$objeto->getIdPurchase();
            $parameters['fecha']=$objeto->getFecha();
            $parameters['numberAcount']=$objeto->getNumberAcount();
            
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
                $newPay =new pay($pos['wayToPay'], $pos['idPurchase'], $pos['numberAcount'], $pos['fecha']);
                $newPay->setIdPurchase($pos['idPay']);
                return $newPay;
            }, $arreglo);
            return count($arregloObjetos)>1? $arregloObjetos: $arregloObjetos['0'];
        }
        public function Delete($objeto)
        {
            $sql = "DELETE FROM pays WHERE idPay = :idPay";
            $parameters['idPay'] = $objeto;

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
            $sql="UPDATE pays SET wayToPay=:wayToPay, idPurchase=:idPurchase , fecha=:fecha WHERE idPay='$buscador';";
            $parameters['wayToPay']=$objeto->getWayToPay();
            $parameters["idPurchase"]=$objeto->getIdPurchase();
            $parameters['fecha']=$objeto->geyFecha();
            
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
        $sql="SELECT * FROM pays where idPay=:idPay";   
        $parameters['idPay']=$objeto;
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