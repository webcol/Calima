<?php

//namespace sistema\nucleo;
//use sistema\nucleo as nucleo;

class Cf_Modelo
{
    protected $_bd;
    
    public function __construct() {
        $this->_bd=new Cf_Basedatos();
    }
}