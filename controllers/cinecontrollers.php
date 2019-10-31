<?php
namespace controllers;
use models\Cine as cine;
use daodb\CineDao as cineD;
use daodb\CinemaDao as cinemaD;
class CineControllers
{
    private $cineRepo;//esta variable, sera aquella aque le iguale lo que traiga de la base de datos. Cuando la tenga
    private $cinemaList;
    public function __construct()
    {
        $this->cineRepo= new cineD();// sera reemplazado por una instancia de la clases donde tenga  la base correspondiente
        $this->cinemaList= new cinemaD();
     }
    
    public function add()
    { 
      $name=$_POST['name']; 
      $adm=$_POST['adm'];
      $address=$_POST['address'];
      $email=$_POST['email'];
      $cine=new cine($name,$email,  $adm, $address);
     
      $this->cineRepo->Add($cine);
      
    }

    public function update()
    {
      $name=$_POST['name']; 
      $adm=$_POST['adm'];
      $address=$_POST['address'];
      $email=$_POST['email'];
      $emailActual=$_POST['emailupdate'];
      $cine=new cine($name,$email,  $adm, $address);
      $this->cineRepo->Update($cine, $emailActual);
      
    }

    public function remove()
    {

      $idCine=$_POST['idCine'];
      $listCinema=$this->cinemaList->GetAll();
     foreach($listCinema as $cinema)
     {
         if($cinema->getIdCine()==$idCine)
         {
             $this->cinemaList->Delete($cinema->getIdCinema());
         }
     }
     $this->cineRepo->Delete($idCine);
    }
}