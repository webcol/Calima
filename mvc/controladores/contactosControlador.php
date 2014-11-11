<?php

class contactosControlador extends Cf_Controlador
{
    public function __construct() {
        parent::__construct();
        
        // cargamos la clase ayudantes para usar sus metodos de ayuda
        $this->cargaAyudante('PHPAyuda');
        $this->_ayud= new PHPAyuda;
    }
    
    public function index()
    {
        $this->_vista->titulo = 'CalimaFramework';
        $this->_vista->imprimirVista('index', 'inicio');
        
        if (isset($_POST['email'])) {
            $this->_vista->validar=1;
        $para="webmaster@webcol.net";
        $this->_ayud->enviarCorreo(
                $_POST['email'],
                $this->_ayud->filtrarTexto($_POST['asunto']),
                $this->_ayud->filtrarTexto($_POST['mensaje'])
        );
        }
    }
    
    public function contacto()
    {
        $this->_vista->titulo = 'CalimaFramework Contactos';
        $this->_vista->imprimirVista('contactos', 'index');
             
        
                   
       
       if (isset($_POST['email'])) {
        $para="webmaster@webcol.net";
        $this->_ayud->enviarCorreo(
                $_POST['email'],
                $this->_ayud->filtrarTexto($_POST['asunto']),
                $this->_ayud->filtrarTexto($_POST['mensaje'])
        );
        }
    }
    
    
}