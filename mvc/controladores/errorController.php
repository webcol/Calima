<?php

class ErrorController extends Km_Controller
{

  public function __construct()
  {
    parent::__cosntruct();
  }
  
  public function index()
  {
    $this->view->titulo='';
    $this->view->mensaje= $this->_getError();
  }
  
  private function _getError($codigo = false)
  {
  
    if($codigo)
    {
      $codigo= $this->filtrarInt($codigo);
      if(is_int($codigo))
      $codigo=$codigo
    
    }
    else
    {
      $codigo = 'default';
    }
    
    $error['default']='Ha ocurrido un error';
    $error['5050']='Accesos Restringido';
    if(array_key_exists($codigo, $error)
    {
      return $error[$codigo];
    }
    else
    {
      return $error['default'];
    }
  }

}
