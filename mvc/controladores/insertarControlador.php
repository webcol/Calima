<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class insertarControlador extends Cf_Controlador {
    
    private $_ayud; // variable para metodos de ayuda
    
    public function __construct() {
        parent::__construct();
        
        // cargamos la clase ayudantes para usar sus metodos de ayuda
        $this->cargaAyudante('PHPAyuda');
        $this->_ayud= new PHPAyuda;
        }
        
        public function index(){
            
            $datas = $this->cargaModelo('prueba');
            //$datas->insertarDatos();
            $datas->actualizarDatos();
        }
}