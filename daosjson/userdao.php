<?php
namespace daosjson;
use models\User as User;
use interfaces\Idaos as Idaos;

class UserDao implements Idaos
{
    private $userList = array();
    public function __construct()
    {
       
       
    }

    public function Update($objeto)
    {
         
    }
    public function GetAll(){
        $this->RetrieveData();

        return $this->userList;
    }
    public function Search($objeto)//se recibira un email
    {  
       $user=null;
        $this->RetrieveData();
        foreach ($this->userList as $value) { 
                if ($value->getEmail()==$objeto){
                    
                    $user=$value;
                    // new User($this->userList[i]["name"],  $this->userList[i]["lastName"], $this->userList[i]["dni"], $this->userList[i]["email"], $this->userList[i]["password"], $this->userList[i]["userName"], $this->userList[i]["idUser"] );
                    
                }

            } 
            return $user;
          
    } 
    public function Delete($email){
		$this->retrieveData();
		$newList = array();
		foreach ($this->userList as $user) {
			if($user->getEmail() != $email){
				array_push($newList, $user);
			}
		}

		$this->userList = $newList;
		$this->saveData();
	}

    public function Add($objeto){
        
        $this->RetrieveData();
        $id=count($this->userList);
        $objeto->setIdUser($id+1);
        $newUser=$objeto;
        array_push($this->userList, $newUser);

        $this->SaveData();
    }

    //Json Persistence
    private function SaveData()
    {
        $arrayToEncode = array();
        $fileJson=$this->GetJsonFilePath();
        foreach($this->userList as $user)
        {
            $valuesArray["name"] = $user->getName();
            $valuesArray["lastName"] = $user->getLastName();
            $valuesArray["dni"] = $user->getDni();
            $valuesArray["email"] = $user->getEmail();
            $valuesArray["password"] = $user->getPassword();
            $valuesArray["idUser"] = $user->getIdUser();

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

                $user = new User($valuesArray["name"], $valuesArray["lastName"], $valuesArray["dni"], $valuesArray["email"], $valuesArray["password"], $valuesArray["idUser"]);
                
                array_push($this->userList, $user);
 
            }
        }
    }
    //funcion para que devuelve si es que existe el 
    function GetJsonFilePath(){

        $initialPath = "data/userJson.json";
        
        if(file_exists($initialPath)){
            $jsonFilePath = $initialPath;
        }else{
            $jsonFilePath = "../".$initialPath;
        }

        return $jsonFilePath;
    }
}