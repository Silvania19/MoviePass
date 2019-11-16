<?php
    namespace daodb;
    use models\Ticket as tiquet;
    use interfaces\Idaos as Idaos;
    class TicketDao implements Idaos
    {
        private $connection;
        public function __construct()
        {
    
        }
        public function GetAll()
        {
            
            $sql="SELECT * FROM tickets";
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
            $sql="INSERT INTO users (numberTicket, qr, idProjection, price,  idUser) VALUES (:numberTicket, :qr, :idProjection, :price, :idUser)";
           
            
            $valuesArray["numberTicket"] = $objeto->getNumberTicket();
            $valuesArray["qr"] = $objeto->getQr();
            $valuesArray['idProjection']= $objeto->getIdProjection();
            $valuesArray["price"] = $objeto->getPrice();
            $valuesArray["idUser"] = $objeto->getIdUser();
            
           
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
            $newTicket =new ticket($pos['numberTicket'], $pos['price'], $pos['idUser'] , $pos['qr'], $pos['idProjection']);
            
           $newTicket->setIdTicket($pos['idTicket']);
            return $newTicket;
           }, $arreglo);
           return count($arregloObjetos)>1? $arregloObjetos: $arregloObjetos['0'];
       }
       public function Delete($objeto)
       {
           $sql = "DELETE FROM tickets WHERE idTicket = :idTicket";
           $parameters['idTicket'] = $objeto;
    
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
            $sql="UPDATE tickets SET numberTicket=:numberTicket, qr=:qr, idProjection=:idProjection, price=:price, idUser =:idUser WHERE idTicket='$buscador';";
            $parameters["numberTicket"] = $objeto->getNumberTicket();
            $parameters["qr"] = $objeto->getQr();
            $parameters['idProjection']= $objeto->getIdProjection();
            $parameters["price"] = $objeto->getPrice();
            $parameters["idUser"] = $objeto->getIdUser();
            try
            {
                $this->connection = Connection::getInstance();
                return $this->connection->ExecuteNonQuery($sql, $parameters);
            }
            catch(\PDOException $e)
            {
                echo $e;
            }
          
        }
        public function Search($objeto)
        {
          $sql="SELECT * FROM tickets where idTicket=:idTicket";   
          $parameters['idTicket']=$objeto;
          try {
              $this->connection = Connection:: getInstance();
              $resul=$this->connection->execute($sql, $parameters);
          } catch (\PDOException $th) {
              echo '<script>';
              echo 'console.log("error en la base. Archivo:userdao.php)';
              echo '</script>';//sacar 
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
        public function SearchXnumber ($number)
    {
        $sql = "SELECT * FROM tickets where numberTicket = :numberTicket";

        $parameters['numberTicket'] = $number;

        try
        {
            $this->connection = Connection::getInstance();
            $resul = $this->connection->execute($sql, $parameters);
        }
        catch(PDOException $e)
        {
            echo $e;
        }

        if(!empty($resul))
            return true;
        else
            return false;
    }
    }