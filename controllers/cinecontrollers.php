<?php
namespace controllers;
use models\Cine as cine;
use daosjson\CineDao as cineD;
class CineControllers
{
    private $cinemaRepo;//esta variable, sera aquella aque le iguale lo que traiga de la base de datos. Cuando la tenga
    public function __construct()
    {
        $this->cinemaRepo= new cineD();// sera reemplazado por una instancia de la clases donde tenga  la base correspondiente
    }
    public function add()
    { 
      $name=$_POST['name']; 
      $adm=$_POST['adm'];
      $idLocation=$_POST['location'];
      $email=$_POST['email'];
      $cine=new cine($name,$email,  $adm, $idLocation);
      $this->cinemaRepo->Add($cine);
      
    }

    public function alter()
    {
        
    }

    public function remove($email)
    {
        $email=$_POST['email'];
       
    if( $this->cinemaRepo->Delete($email)==true)
       {
           echo 'eliminado con exito';
       }
       else{
           echo 'el cine no existe';
       }

    }
}