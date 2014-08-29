<?php

//namespace sistema\nucleo;
//use sistema\nucleo as nucleo;

abstract class Cf_Controlador
{
    protected $_vista;
    
    public function __construct() {
        $this->_vista = new Cf_Vista(new Cf_Solicitud);
    }
    
    protected function cargaLib($libreria){
        $rutaLib = RUTA_LIBS . $libreria . '.php';
        if(is_readable($rutaLib)){
            require_once $rutaLib;
           //echo 'libreria cargada';
        }
        else {
            throw new Exception("houston tenemos un problema! al cargar libreria");
        }
    }
    
    protected function cargaModelo($modelo){
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
            
            
            throw new Exception("houston tenemos un problema! al cargar modelo");
            
        }
    }
    
    protected function cargaAyudante($ayudante){
       $rutaAyudante = RUTA_AYUDANTES . $ayudante . '.php';
        if(is_readable($rutaAyudante)){
            require_once $rutaAyudante;
           //echo 'libreria cargada';
        }
        else {
            throw new Exception("houston tenemos un problema! al cargar ayudante");
        }
    }
    
}
