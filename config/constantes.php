<?php
 
 define ('ROOT', dirname(__DIR__));
 //$base = explode($_SERVER["DOCUMENT_ROOT"], ROOT);
 //define ("BASE", $base[0]);
  //esta constante define el camino a las vistas, es decir donde estan guardadas las vistas
 define ("CSS", "front/styles/");//la ruta donde se encuentra los archivos css

 define ("FRONT_ROOT","/MoviePass");
  define ("VIEWS_PATH","views/");
 //constantes para trabajar con base de datos
 define ("DB_HOST", "localhost");
 define ("DB_NAME", "MoviePass");
 define ("DB_USER", "root");
 define ("DB_PASS", "");

 define("PORCENTAJE_DESCUENTO", 25);
define('DIR_QR', 'temp/');

//constantes para mandar email
define('EMAIL_LOCAL', "florencia.juarez.159@gmail.com");
define('PASSWORD_EMAIL_LOCAL', "ojosdevidrio");

 ?>
 
