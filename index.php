<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)) . DS);
define('APP_PATH', ROOT . 'sistema'.DS.'nucleo' . DS);
# define para mvc erp
define('VIEW_PATH', ROOT . 'mvc'.DS.'views' . DS);
define('CSS_PATH', ROOT . 'public_'.DS.'css' . DS);
define('IMG_PATH', ROOT . 'public_'.DS.'img' . DS);
define('JS_PATH', ROOT . 'public_'.DS.'js' . DS);
define('APP_LIBS', ROOT . 'sistema'.DS.'libs' . DS);



require_once APP_PATH . 'Cf_Autocarga.php';
require_once APP_PATH . 'Cf_Config.php';

try{
    Cf_Bootstrap::run(new Cf_Solicitud);
}
catch(Exception $e){
    echo $e->getMessage();
}
