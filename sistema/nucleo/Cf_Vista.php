<?php


class Cf_Vista
{
    private $_controlador;
    
    public function __construct(Cf_Solicitud $peticion) {
        $this->_controlador = $peticion->getControlador();
    }
    
    public function imprimirVista($vista, $item = false)
    {            
            
        $rutaView = VIEW_PATH . $this->_controlador . DS . $vista . '.phtml';
        
        if(is_readable($rutaView)){
            include_once SITE_ROOT . 'mvc/vistas' . DS . ADICIONALES_VISTA . DS . 'header.php';
            include_once $rutaView;
            include_once SITE_ROOT . 'mvc/vistas' . DS . ADICIONALES_VISTA . DS . 'footer.php';
        } 
        else {
            throw new Exception('houston tenemos un problema! vista no encontrada');
        }
    }
}