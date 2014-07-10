<?php

//namespace sistema\nucleo;
//use sistema\nucleo as nucleo;

abstract class Cf_Modelo
{
    protected $_vista;
    
    public function __construct() {
        $this->_vista = new Cf_Vista(new Cf_Solicitud);
    }
    
    protected function cargaLibModelo($orm){
        $rutaLib = RUTA_ORM . $orm . '.php';
        if(is_readable($rutaLib)){
            require_once $rutaLib;
           //echo 'libreria cargada';
        }
        else {
            throw new Exception("Error al cargar libreria");
        }
    }
}
