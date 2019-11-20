<?php
 
 define ('ROOT', dirname(__DIR__));
 //$base = explode($_SERVER["DOCUMENT_ROOT"], ROOT);
 //define ("BASE", $base[0]);
 define ("VIEWS_PATH", "views/"); //esta constante define el camino a las vistas, es decir donde estan guardadas las vistas
 define ("CSS", "front/styles/");//la ruta donde se encuentra los archivos css
 define ("FRONT_ROOT","/MoviePass");
 //constantes para trabajar con base de datos
 define ("DB_HOST", "localhost");
 define ("DB_NAME", "MoviePass");
 define ("DB_USER", "root");
 define ("DB_PASS", "");

 define("PORCENTAJE_DESCUENTO", 25);
 //$con->close();
 

 define('DIR_QR', 'temp/');
 ?>
 
