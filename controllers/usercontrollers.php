<?php
namespace controllers;
use models\User as User;
use daos\userdao as userD;
class UserControllers
{
private $daoUser;//en esta variable tiene una instancia de la clase Dao user, 
public function __construct()
{
    $daoUser = new userD();
}
   public function login($email, $password)
   {
    $listUser=$daoUser->GetAll();
    foreach ($listUser as $value) {
        foreach ($value as $key as $value2)
        {

            if ($value2==$email)
            {
                if($value2==$password)
                {
                  $user = $value;
                session_start($user);
                }
                else 
                {
                    echo ' incorrect password';
                }
               
            }
            else{
                echo 'incorrect user';
            }
        }
      
    }

   }
}