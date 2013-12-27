<?php

class indexController extends Km_Controller
{
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        $this->_view->titulo = 'KalimaFramework';
        $this->_view->renderizar('index', 'inicio');
    }
}
