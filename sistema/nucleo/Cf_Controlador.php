<?php

//namespace sistema\nucleo;
//use sistema\nucleo as nucleo;

abstract class Cf_Controlador
{
    protected $_vista;
    
    public function __construct() {
        $this->_vista = new Cf_Vista(new Cf_Solicitud);
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
