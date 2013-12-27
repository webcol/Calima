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

require_once APP_PATH . 'Km_Config.php';
require_once APP_PATH . 'Km_Request.php';
require_once APP_PATH . 'Km_Bootstrap.php';
require_once APP_PATH . 'Km_Controller.php';
require_once APP_PATH . 'Km_Model.php';
require_once APP_PATH . 'Km_View.php';
require_once APP_PATH . 'Km_Registro.php';
require_once APP_PATH . 'Km_Database.php';

try{
    Km_Bootstrap::run(new Km_Request);
}
catch(Exception $e){
    echo $e->getMessage();
}
