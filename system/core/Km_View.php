<?php


class Km_View
{
    private $_controlador;
    
    public function __construct(Km_Solicitud $peticion) {
        $this->_controlador = $peticion->getControlador();
    }
    
    public function renderizar($vista, $item = false)
    {
        
        
        $_layoutParams = array(
            'ruta_css' => BASE_URL . 'mvc/views/layout/' . DEFAULT_LAYOUT . '/css/',
            'ruta_img' => BASE_URL . 'mvc/views/layout/' . DEFAULT_LAYOUT . '/img/',
            'ruta_js' => BASE_URL . 'mvc/views/layout/' . DEFAULT_LAYOUT . '/js/',
            'menu' => $menu
        );
        
        $rutaView = VIEW_PATH . $this->_controlador . DS . $vista . '.phtml';
        
        if(is_readable($rutaView)){
            include_once ROOT . 'mvc/views'. DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'header.php';
            include_once $rutaView;
            include_once ROOT . 'mvc/views'. DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'menu.php';
            include_once ROOT . 'mvc/views'. DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'footer.php';
        } 
        else {
            throw new Exception('Error de vista');
        }
    }
}
