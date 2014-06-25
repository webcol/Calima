<?php

spl_autoload_register ( function ( $class )  { 
    $path  =  CONTR_PATH . $class . ".php" ; 
    if  ( file_exists ( $path ))  { 
        require  $path ; 
        return true ; 
    } 
    $path  =  VIEW_PATH . $class . ".php" ; 
    if  ( file_exists ( $path ))  { 
        require  $path ; 
        return true;
     } 
     $path  =  APP_PATH . $class . ".php" ; 
     //$path  =  APP_PATH . ucfirst(strtolower($class)) . ".php" ; 
    if  ( file_exists ( $path ))  { 
        require  $path ; 
        return true;
     } 
} );


// se define una funcion para la autocarga de los metodos de las clases del systema/nucleo php > 5.3
/*spl_autoload_register(function ($class) {
   // include 'clases/' . $class . '.clase.php';
    include APP_PATH . ucfirst($class) . '.php'; 
});*/

// se define una funcion para la autocarga de los metodos de las clases del systema/core
/*function cargaClasesCore($class){ 
	if(file_exists(APP_PATH . ucfirst(strtolower($class)) . '.php')){
	include APP_PATH . ucfirst(strtolower($class)) . '.php'; 
	}
}

spl_autoload_register( 'cargaClasesCore' );*/