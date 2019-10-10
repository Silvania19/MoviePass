<?php
namespace config;
include ("config/constantes.php");

class Autoload{
    public static function Start()
    {
        spl_autoload_register(function ($class)
        {
            $class2=ROOT."/". strtolower(str_replace("\\", "/",$class).'.php');
            include_once ($class2);

        });
    }
}