<?php
namespace config;


class Autoload{
    public static function Start()
    {
        //recibimos un nombre de una clase y un namespace como parametro ($class)
        spl_autoload_register(function ($class) 
        { 
            //arreglamos la ruta que vamos a incluir en, como el nombre de las clases comienzan con mayusculas
            //y los nombres que las contienen estan con minuscula convertimos todo en minuscula

            //tenia que concatenarle el .class : $class2=ROOT."/". strtolower(str_replace("\\", "/",$class).'.class.php');
            $class2=ROOT."/". strtolower(str_replace("\\", "/",$class).'.php');//ROOT es una constante que contiene la ruta raiz, esta defenida en config/constantes
            include_once ($class2);

        });
        
    }
}