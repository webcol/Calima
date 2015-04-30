<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class errorControlador extends \Sistema\Nucleo\CFControlador{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        
        $this->_vista->titulo="Error detectado";
        $this->_vista->imprimirVista('index','error');
    }
    
}