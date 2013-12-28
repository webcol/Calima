class Km_Bootstrap
{
    public static function run(Km_Solicitud $peticion)
    {
        $controller = $peticion->getControlador() . 'Controller';
        //definimos la ruta al controlador
        $rutaControlador = ROOT . 'mvc' . DS .'controllers' . DS . $controller . '.php';
        $metodo = $peticion->getMetodo();
        $args = $peticion->getArgs();
        
        //verifcamos que el archivo existe is_readable
        if(is_readable($rutaControlador)){
            require_once $rutaControlador;
            $controller = new $controller;
            
            if(is_callable(array($controller, $metodo))){
                $metodo = $peticion->getMetodo();
            }
            else{
                $metodo = 'index';
            }
            
            if(isset($args)){
                call_user_func_array(array($controller, $metodo), $args);
            }
            else{
                call_user_func(array($controller, $metodo));
            }
            
        } else {
            throw new Exception('no encontrado');
        }
    }
}
