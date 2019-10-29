<?php
namespace controllers;
use models\Cine as cine;
use daodb\CineDao as cineD;
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
      $address=$_POST['address'];
      $email=$_POST['email'];
      $cine=new cine($name,$email,  $adm, $address);
     
      $this->cinemaRepo->Add($cine);
      
    }

    public function update()
    {
      $name=$_POST['name']; 
      $adm=$_POST['adm'];
      $address=$_POST['address'];
      $email=$_POST['email'];
      $emailActual=$_POST['emailupdate'];
      $cine=new cine($name,$email,  $adm, $address);
      $this->cinemaRepo->Update($cine, $emailActual);
      
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