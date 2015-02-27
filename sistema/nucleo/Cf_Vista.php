<?php


class Cf_Vista
{
    private $_controlador;
    
    public function __construct(Cf_Solicitud $peticion) {
        $this->_controlador = $peticion->getControlador();
    }
    
    public function imprimirVista($vista, $item = false)
    {            
            
        $ver_ruta = VIEW_PATH . $this->_controlador . DS . $vista . '.phtml';
        
        if(is_readable($ver_ruta)){
            include_once SITE_ROOT . 'mvc/vistas' . DS . ADICIONALES_VISTA . DS . 'encabezado.php';
            include_once $ver_ruta;
            include_once SITE_ROOT . 'mvc/vistas' . DS . ADICIONALES_VISTA . DS . 'pie_de_pagina.php';
        } 
        else {
            
            header('Location: '.  Cf_BASE_URL.'error/index'.'?error='.'vista' );
            
        }
    }
}