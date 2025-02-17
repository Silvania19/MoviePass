<?php

namespace daodb;

use models\Projection as projection;
use interfaces\Idaos as Idaos;
use daodb\Connection as   Connection;

class ProjectionDao implements Idaos
{
    private $connection;
    public function __construct()
    { }
    public function GetAll()
    {

        $sql = "SELECT * FROM projections";
        try {
            $this->connection = Connection::getInstance();
            $listProjection = $this->connection->execute($sql);
        } catch (\PDOException  $ex) {
            throw $ex;
        }
        if (!empty($listProjection)) {
            return $this->mapear($listProjection);
        } else {
            return false;
        }
    }
    public function GetAllActuales()
    {



        $sql = "SELECT * FROM projections  as p where year(p.date)>=year(now()) and month(p.date)>=month(now())  union select* from projections as p where year(p.date)=year(now()) and month(p.date)=month(now()) and day(p.date)=day(now()) and hour(p.hour) > hour(now());";
        try {
            $this->connection = Connection::getInstance();
            $listProjection = $this->connection->execute($sql);
        } catch (\PDOException  $ex) {
            throw $ex;
        }
        if (!empty($listProjection)) {
            return $this->mapear($listProjection);
        } else {
            return false;
        }
    }
    public function Add($objeto)
    {
        // Guardo como string la consulta sql utilizando como values, marcadores de parámetros con nombre (:name) o signos de interrogación (?)
        // por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada
        $sql = "INSERT INTO projections (date, hour, idCine, idMovie, idCinema, duration) VALUES (:date, :hour, :idCine,:idMovie, :idCinema, :duration)";

        $parameters["date"] = $objeto->getDate();
        $parameters['hour'] = $objeto->getHour();
        $parameters["idCine"] = $objeto->getIdCine();
        $parameters["idMovie"] = $objeto->getIdMovie();
        $parameters["idCinema"] = $objeto->getIdCinema();
        $parameters["duration"] = $objeto->getDuration();
        try {
            $this->connection = Connection::getInstance();
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
        $arreglo = is_array($arreglo) ? $arreglo : [];
        $arregloObjetos = array_map(function ($pos) {
            $newProjection = new projection($pos['date'], $pos['hour'], $pos['idCine'], $pos['idMovie'], $pos['idCinema'], $pos['duration']);
            $newProjection->setIdProjection($pos['idProjection']);
            return $newProjection;
        }, $arreglo);
        return count($arregloObjetos) > 1 ? $arregloObjetos : $arregloObjetos['0'];
    }
    public function Delete($idProjection)
    {
        $sql = "DELETE FROM projections WHERE idProjection = :idProjection";
        $parameters['idProjection'] = $idProjection;

        try {
            $this->connection = Connection::getInstance();
            return $this->connection->ExecuteNonQuery($sql, $parameters);
        } catch (PDOException $e) {
            throw $e;
        }
    }


    public function Update($objeto, $buscador)
    {
        $sql = "UPDATE projections SET date=:date, hour=:hour, idCine=:idCine, idMovie=:idMovie, idCinema=:idCinema, duration=:duration WHERE email = '$buscador';";
        $parameters['hour'] = $objeto->getHour();
        $parameters["date"] = $objeto->getDate();
        $parameters["idCine"] = $objeto->getIdCine();
        $parameters['idMovie'] = $objeto->getIdMovie();
        $parameters["idCinema"] = $objeto->getIdCinema();
        $parameters['duration'] = $objeto->getDuration();
        try {
            $this->connection = Connection::getInstance();
            return $this->connection->ExecuteNonQuery($sql, $parameters);
        } catch (PDOException $e) {
            throw $e;
        }
    }
    public function Search($objeto)
    {
        $sql = "SELECT * FROM projections where idProjection=:idProjection";
        $parameters['idProjection'] = $objeto;
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
    public function SearchXCine($objeto)
    {
        $sql = "SELECT * FROM projections where idCine=:idCine";
        $parameters['idCine'] = $objeto;
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
    public function SearchXMovie($idMovie)
    {
        $sql = "SELECT * FROM projections as p where p.idMovie=:idMovie and year(p.date)>=year(now()) and month(p.date)>=month(now())  union select* from projections as p where p.idMovie=:idMovie and year(p.date)=year(now()) and month(p.date)=month(now()) and day(p.date)=day(now()) and hour(p.hour) > hour(now());";
        $parameters['idMovie'] = $idMovie;


        try {
            $this->connection = Connection::getInstance();
            $resul = $this->connection->execute($sql, $parameters);
        } catch (\PDOException $th) {
            throw $th;
        }
        if (!empty($resul)) {
            return true;
        } else {
            return  false;
        }
    }
    public function availability($cant, $idProjection)
    {
        $sql = "SELECT * FROM projections as p  JOIN cinemas as c on c.idCinema = p.idCinema where  p.idProjection=:idProjection and c.capacity>='$cant'";
        
        $parameters['idProjection']=$idProjection;
        try {
            $this->connection = Connection::getInstance();
            $resul = $this->connection->execute($sql, $parameters);
           
        } catch (\PDOException $th) {
            throw $th;
        }
        if (!empty($resul)) {
            return true;
        } else {
            return  false;
        }
    }

    public function SearchXProjectionAmount($idProjection)
    {
        $sql = "SELECT c.price from cinemas as c join projections as p on p.idCinema=c.idCinema where p.idProjection=:idProjection;";
        $parameters['idProjection'] = $idProjection;

        try {
            $this->connection = Connection::getInstance();
            $resul = $this->connection->execute($sql, $parameters);
        } catch (\PDOException $th) {
            throw $th;
        }
        if (!empty($resul)) {
            $reto1 = $resul['0'];
            $reto = $reto1['0'];

            return $reto;
        } else {
            return  false;
        }
    }
    /*buscamos las projecciones de uan sala, me devuelve TODAS las projecciones de una sala

    */
    public function SearchXIdCinema($idCinema)
    { 
        $sql = "SELECT p.* from projections as p join cinemas as c on p.idCinema=c.idCinema where p.idCinema=:idCinema;";
        $parameters['idCinema'] = $idCinema;

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
    /*
    buscamos todas las projeccciones de un cine en un determinado dia Todas
    */
    public function SearchXMovieXCineXDate($idMovie, $idCine, $date)
    {
        $sql = "SELECT * FROM projections where idCine=$idCine and idMovie=$idMovie and date='$date' limit 1;";
       
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
    public function SearchXCineXDate($idCine, $date)
    {
        $sql = "SELECT * FROM projections where idCine=:idCine and date='$date';";
        $parameters['idCine'] = $idCine;
        
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
}
