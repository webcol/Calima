<?php

abstract class Cf_Controller
{
    protected $_view;
    
    public function __construct() {
        $this->_view = new Cf_View(new Cf_Solicitud);
    }
}
