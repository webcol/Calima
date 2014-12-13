<?php
// Se define la funcion spl_autoload_register de php para permitir la autocarga de clases (PHP 5 >= 5.1.2)

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
     $path  =  RUTA_NUCLEO . $class . ".php" ;      
    if  ( file_exists ( $path ))  { 
        require  $path ; 
        return true;
     } 
} );