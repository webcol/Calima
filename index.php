<?php

define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT')? null: define('SITE_ROOT', realpath(dirname(__FILE__)).DS);

//echo SITE_ROOT;

//define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)) . DS);
define('APP_PATH', SITE_ROOT . 'sistema'.DS.'nucleo' . DS);
# define para mvc erp
define('VIEW_PATH', SITE_ROOT . 'mvc'.DS.'vistas' . DS);
define('CONTR_PATH', ROOT . 'mvc'.DS.'controladores' . DS);
define('CSS_PATH', SITE_ROOT . 'public_'.DS.'css' . DS);
define('IMG_PATH', SITE_ROOT . 'public_'.DS.'img' . DS);
define('JS_PATH', SITE_ROOT . 'public_'.DS.'js' . DS);
define('APP_LIBS', SITE_ROOT . 'sistema'.DS.'librerias' . DS);

//echo ROOT;


require_once APP_PATH . 'Cf_Autocarga.php';
require_once APP_PATH . 'Cf_Configuracion.php';


//Cf_Bootstrap::run(new Cf_Solicitud);
try{
  Cf_Bootstrap::run(new Cf_Solicitud);
}
catch(Exception $e){
    echo $e->getMessage();
}



/*
 * <?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)) . DS);
define('APP_PATH', ROOT . 'sistema'.DS.'nucleo' . DS);
# define para mvc erp
define('VIEW_PATH', ROOT . 'mvc'.DS.'vistas' . DS);
define('CONTR_PATH', ROOT . 'mvc'.DS.'controladores' . DS);
define('CSS_PATH', ROOT . 'public_'.DS.'css' . DS);
define('IMG_PATH', ROOT . 'public_'.DS.'img' . DS);
define('JS_PATH', ROOT . 'public_'.DS.'js' . DS);
define('APP_LIBS', ROOT . 'sistema'.DS.'librerias' . DS);


//echo ROOT;
require_once APP_PATH . 'Cf_Autocarga.php';
require_once APP_PATH . 'Cf_Configuracion.php';

/*require_once APP_PATH . 'Cf_Bootstrap.php';
require_once APP_PATH . 'Cf_Solicitud.php';*/

//Cf_Bootstrap::run(new Cf_Solicitud);
/*try{
  Cf_Bootstrap::run(new Cf_Solicitud);
}
catch(Exception $e){
    echo $e->getMessage();
}

 */