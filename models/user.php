<?php
namespace models;
 
    class User 
    {
        private $name;
        private $lastName;
        private $dni;
        private $email;
        private $password;
    
        private $idUser;
        private $idRol;//1 sera usaro comun, 2 sera usuario Administrador

    public  function __construct($name, $lastName, $dni, $email,$password, $idRol)
    {
            $this->name=$name;
            $this->lastName=$lastName;
            $this->dni=$dni;
            $this->email=$email;
            $this->password=$password;
            $this->idRol=$idRol;
        
        
    }
    public function setIdUser($idUser)
    {
        $this->idUser=$idUser;
    }
    public function getIduser()
    {
        return $this->idUser;
    }
    public function setName($name)
        {
        $this->name=$name;
        }
        public function setLastName($lastName)
        {
            $this->lastName=$lastName;
        }
        public function setDni($dni)
        {
            $this->dni=$dni;
        }
        public function setIdRol($idRol)
        {
            $this->idRol=$idRol;
        }
        public function getName()
        {
            return  $this->name;
        }
        public function getIdRol()
        {
            return  $this->idRol;
        }
        public function getLastName ()
        {
            return  $this->lastName;
        }
        public function getDni()
        {
            return  $this->dni;
        }
        public function setPassword($password)
    {
        $this->password=$password;
    }
    public function setEmail($email)
    {
        $this->email=$email;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getEmail()
    {
    return $this->email;
    }



    }