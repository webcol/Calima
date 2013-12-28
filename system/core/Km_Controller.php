<?php

abstract class Km_Controller
{
    protected $_view;
    
    public function __construct() {
        $this->_view = new Km_View(new Km_Request);
    }
}
