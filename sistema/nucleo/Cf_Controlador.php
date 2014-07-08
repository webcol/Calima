<?php

abstract class Cf_Controlador
{
    protected $_view;
    
    public function __construct() {
        $this->_view = new Cf_Vista(new Cf_Solicitud);
    }
    
    protected function cargalib($libreria){
        $rutaLib = RUTA_LIBS . $libreria . '.php';
        if(is_readable($rutaLib)){
            require_once $rutaLib;
           //echo 'libreria cargada';
        }
        else {
            throw new Exception("Error al cargar libreria");
        }
    }
}
