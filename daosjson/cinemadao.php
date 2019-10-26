<?php
namespace daosjson;
use models\Cinema as Cinema;
use interfaces\Idaos as Idaos;
class CinemaDao implements Idaos
{
   private $cinemaList;
   public function __construct()
   {
        $this->cinemaList=array();
   }
    public function GetAll()
   {
       $this->RetrieveData();
       return $this->cinemaList;
    }
    public function Add($objeto)
    {
      $this->RetrieveData();
      $id=count($this->cinemaList);
      $objeto->setIdCinema($id+1);
      $newCinema=$objeto;
      array_push($this->cinemaList, $newCinema);
      $this->SaveData();

    }
    public function Delete($email)
    {
      $this->retrieveData();
      $newList = array();
      foreach ($this->$cinemaList as $cinema) {
        if($cinema->getEmail() != $objeto){
          array_push($newList, $cinema);
        }
      }
  
      $this->cinemaList = $newList;
      $this->saveData();

    }
    public function Update($objeto)
    {

    }
    public function Search($objeto)
    {
      $cinema=null;
        $this->RetrieveData();
        foreach ($this->cineList as $value) { 
                if ($value->getNumberCinema()==$objeto){
                    
                    $cinema=$value;       
                }

            } 
            return $cinema;
          
    }
    private function SaveData()
    {
        $arrayToEncode = array();
        $fileJson=$this->GetJsonFilePath();
        foreach($this->cinemaList as $cinema)
        { 
            $valuesArray["numberCinema"] = $cinema->getNumberCinema();
            $valuesArray["idCinema"] = $cinema->getIdCinema();
            $valuesArray["idCine"] = $cinema->getIdCine();
            $valuesArray["capacity"] = $cinema->getCapacity();

            array_push($arrayToEncode, $valuesArray);
        }

        $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
        
        file_put_contents($fileJson, $jsonContent);
    }
    private function RetrieveData() {
        
        $fileJson=$this->GetJsonFilePath();
        if(file_exists($fileJson))
        {
            $jsonContent = file_get_contents($fileJson);

            $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();
             

            foreach($arrayToDecode as $valuesArray)
            {

                $cinema = new Cinema($valuesArray["idCine"], $valuesArray["numberCinema"], $valuesArray["capacity"]);
                
                
                array_push($this->cinemaList, $cinema);
               
            }
        }
    }
    //funcion para que devuelve si es que existe el archivo, la tuta a este mismmo
    function GetJsonFilePath(){

        $initialPath = "data/cinema.json";
        
        if(file_exists($initialPath)){
        
            $jsonFilePath = $initialPath;
        }else{
            $jsonFilePath = "../".$initialPath;
        }

        return $jsonFilePath;
    }
}
?>