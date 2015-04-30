<?php

class contactosControlador extends \Sistema\Nucleo\CFControlador
{
    
    private $_ayuda;
    
    public function __construct() {
        parent::__construct();
        
        // cargamos la clase ayudantes para usar sus metodos de ayuda
       
        $this->_ayuda= new Sistema\Ayudantes\CFPHPAyuda();
    }
    
    public function index()
    {
        $this->_vista->titulo = 'CalimaFramework';
        $this->_vista->imprimirVista('index', 'inicio');
        
        if (isset($_POST['email'])) {
            $this->_vista->validar=1;
        $para="webmaster@webcol.net";
        $this->_ayuda->enviarCorreo(
                $_POST['email'],
                $this->_ayuda->filtrarTexto($_POST['asunto']),
                $this->_ayuda->filtrarTexto($_POST['mensaje'])
        );
        }
    }
    
    public function contacto()
    {
        $this->_vista->titulo = 'CalimaFramework Contactos';
        $this->_vista->imprimirVista('contactos', 'index');
             
        
                   
       
       if (isset($_POST['email'])) {
        $para="webmaster@webcol.net";
        $this->_ayuda->enviarCorreo(
                $_POST['email'],
                $this->_ayuda->filtrarTexto($_POST['asunto']),
                $this->_ayuda->filtrarTexto($_POST['mensaje'])
        );
        }
    }
    
    
}