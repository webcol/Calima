<?php

class contactosController extends Cf_Controlador
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
        
        
    }
}