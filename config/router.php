<?php
namespace config;
class Router
{
    public function construct()
    {

    }
    public static function address(Request $request)
    {
        //instancia la controladora
        $controller= $request->getController()."controllers";//tenia q borrarlo 
        $method= $request->getMethod();
        $parameters= $request->getParameters();//viewscontrollers
        //controllers/viewscontrollers
        $class="controllers\\".$controller;//crea la direccion para incluir la clase. el namespace+el nombre de la clase

        $instance= new $class();// crea instancia de la clase

        if(!isset($parameters))
        {
            call_user_func(array($instance,$method));
        }
      else
       {
          call_user_func_array(array($instance,$method),$parameters);
       }



    }
}
// ?>