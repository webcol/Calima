<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class proyectosController extends Cf_Controlador
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