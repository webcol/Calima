<?php

class contactosController extends Cf_Controlador
{
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        $this->_vista->titulo = 'CalimaFramework';
        $this->_vista->renderizar('index', 'inicio');
    }
}