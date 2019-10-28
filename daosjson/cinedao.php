<?php
namespace daosjson;
use models\Cine as Cine;
use interfaces\Idaos as Idaos;
class CineDao implements Idaos
{
  private $cineList;

   public function __construct()
   {
       $this->cineList=array();
   }
    public function GetAll()
   {
       $this->RetrieveData();
       return $this->cineList;
    }
    public function Add($objeto)
    {
      $this->RetrieveData();
      $id=count($this->cineList);
      $objeto->setIdCine($id+1);
      array_push($this->cineList, $objeto);
      $this->SaveData();

    }
    public function Delete($email)
    {
      $this->retrieveData();
      $newList = array();
      foreach ($this->cineList as $cine) {
        if($cine->getEmail() != $email){
          array_push($newList, $cine);
        }
      }
      if($this->cineList==NULL)
      {
          return false;
      }
      else
      {
          return true;
      }
  
      $this->cineList = $newList;
      $this->saveData();

    }
    public function Update($objeto)
    {

    }
    public function Search($objeto)
    {
      $cine=null;
        $this->RetrieveData();
        foreach ($this->cineList as $value) { 
                if ($value->getEmail()==$objeto){
                    
                    $cine=$value;       
                }

            } 
            return $cine;
          
    }
    private function SaveData()
    {
        $arrayToEncode = array();
        $fileJson=$this->GetJsonFilePath();
        foreach($this->cineList as $cine)
        { 
            $valuesArray["idCine"] = $cine->getIdCine();
            $valuesArray["name"] = $cine->getName();
            $valuesArray["email"] = $cine->getEmail();
            $valuesArray["idUserAdmistrator"] = $cine->getIdUserAdministrator();
            $valuesArray["idLocation"] = $cine->getIdLocation();
          

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

                $cine = new Cine( $valuesArray["name"], $valuesArray["email"], $valuesArray["idUserAdmistrator"], $valuesArray["idLocation"]);
                
                array_push($this->cineList, $cine);
 
            }
        }
    }
    //funcion para que devuelve si es que existe el archivo, la tuta a este mismmo
    function GetJsonFilePath(){

        $initialPath = "data/cineJson.json";
        
        if(file_exists($initialPath)){
            $jsonFilePath = $initialPath;
        }else{
            $jsonFilePath = "../".$initialPath;
        }

        return $jsonFilePath;
    }
}
?>