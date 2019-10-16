<?php
class Request 
{
    private $controller; 
    private $method;
    private $parameters=array(); //recibo todos los para
    /**
     * constructor
     */
    public function __construct()
    {
        //toma lo que recibe de manera externa y lo convierte en un string
        $url=filter_input (INPUT_GET, 'url', FILTER_SANITIZE_URL);
        //desconpone el string en un array separando por barras
        $urlArray=explode ("/", $url);
        //eliminar todos los espacios en blanco, es necesario ya que un espacio en blanco puede causar problemas
        $urlArraySinBlancos= array_filter($urlArray);
        

        if(empty($urlArraySinBlancos))
        {
            $this->controller="views";

        }
        else
        {
            $this->controller=(array_shift($urlArraySinBlancos));//saco el priemr elemento del arreglo y lo guardo en la variable controller

        }
        if (empty ($urlArraySinBlancos))
        {
            $this->controllers="index";
        }
        else
        {
            $this->method=array_shift($urlArraySinBlancos);
        }
        $requestMethod=$this->getMethodRequest();//devolvera get o post
        if($requestMethod=='GET')//si es get quiere decir que es una peticion get, y se mandaron los datos por la url, 
        {
            if(!empty($urlArraySinBlancos))
            {
                $this->parameters=$urlArraySinBlancos;//entonces si despues de  quitar queda aun datos en el arreglo, donde descompuse la url, 
                //los guardo todos lo que quedan dentro de parameters
            }
            
        }
        else
        {
            //si no es get es post, en este caso se mandoron los datos en la variable post
            $this->parameters=$_POST;//guardo en parameters lo que venga en post
        }
             if($_FILES)
             {
                 $this->parameters[]=$_FILES;
             }
    }

public static function getMethodRequest()
{
    return $_SERVER['REQUEST_METHOD'];//la variable server es un arreglo donde una de sus valores tiene almacenado el tipo de methodo(get o post)
}
}
?>