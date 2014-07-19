<?php

class Cf_Bootstrap
{
    public static function actuar(Cf_Solicitud $peticion)
    {
        $controlador = $peticion->getControlador() . 'Controller';
        //definimos la ruta al controlador
        $rutaControlador = ROOT . 'mvc' . DS .'controladores' . DS . $controlador . '.php';
        $metodo = $peticion->getMetodo();
        $args = $peticion->getArgumentos();
        
        //verifcamos que el archivo existe con la funcion de PHP is_readable
        if(is_readable($rutaControlador)){
            require_once $rutaControlador;
            $controlador = new $controlador;
            
            if(is_callable(array($controlador, $metodo))){
                $metodo = $peticion->getMetodo();
            }
            else{
                $metodo = 'index';
            }
            
            if(isset($args)){
                call_user_func_array(array($controlador, $metodo), $args);
            }
            else{
                call_user_func(array($controlador, $metodo));
            }
            
        } else {
            throw new Exception('Creemos que tienes un problema! controlador no encontado');
        }
    }
}
