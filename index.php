<?php

define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT')? null: define('SITE_ROOT', realpath(dirname(__FILE__)).DS);



//define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)) . DS);
define('RUTA_NUCLEO', SITE_ROOT . 'sistema'.DS.'nucleo' . DS);
# define para mvc erp
define('VIEW_PATH', SITE_ROOT . 'mvc'.DS.'vistas' . DS);
define('CONTR_PATH', ROOT . 'mvc'.DS.'controladores' . DS);
define('CSS_PATH', SITE_ROOT . 'public_'.DS.'css' . DS);
define('IMG_PATH', SITE_ROOT . 'public_'.DS.'img' . DS);
define('JS_PATH', SITE_ROOT . 'public_'.DS.'js' . DS);
define('RUTA_LIBS', SITE_ROOT . 'sistema'.DS.'librerias' . DS);
define('RUTA_AYUDANTES', SITE_ROOT . 'sistema'.DS.'ayudantes' . DS);
define('RUTA_MOD', SITE_ROOT . 'mvc'.DS.'modelos' . DS);
define('RUTA_ORM', SITE_ROOT . 'sistema'.DS.'librerias'.DS.'ORMbasico' . DS);




require_once RUTA_NUCLEO . 'Cf_Autocarga.php';
require_once RUTA_NUCLEO . 'Cf_Configuracion.php';



try{
  Cf_Bootstrap::actuar(new Cf_Solicitud);
}
catch(Exception $e){
    echo $e->getMessage();
}