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
    
    protected function cargaMod($modelo){
        $modelo=$modelo.'Modelo';
       $rutaMod = RUTA_MOD . $modelo . '.php';
        if(is_readable($rutaMod)){
            require_once $rutaMod;
            $modelo = new $modelo;
            return $modelo;
           //echo 'modelo cargado';
        }
        else {
            //echo $rutaMod;
            
            
            throw new Exception("Error al cargar el modelo");
            
        }
    }
}
