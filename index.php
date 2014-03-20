<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)) . DS);
define('APP_PATH', ROOT . 'system'.DS.'core' . DS);
# define para mvc erp
define('VIEW_PATH', ROOT . 'mvc'.DS.'views' . DS);
define('CSS_PATH', ROOT . 'public_'.DS.'css' . DS);
define('IMG_PATH', ROOT . 'public_'.DS.'img' . DS);
define('JS_PATH', ROOT . 'public_'.DS.'js' . DS);
define('APP_LIBS', ROOT . 'system'.DS.'libs' . DS);



require_once APP_PATH . 'Km_Autocarga.php';
require_once APP_PATH . 'Km_Config.php';

try{
    Km_Bootstrap::run(new Km_Solicitud);
}
catch(Exception $e){
    echo $e->getMessage();
}
