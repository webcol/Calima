<?php

abstract class Cf_Controlador
{
    protected $_view;
    
    public function __construct() {
        $this->_view = new Cf_Vista(new Cf_Solicitud);
    }
}
