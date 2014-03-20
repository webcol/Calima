<?php

// se define una funcion para la autocarga de los metodos de las clases del systema/core
function cargaClasesCore($class){ 
	if(file_exists(APP_PATH . ucfirst(strtolower($class)) . '.php')){
	include APP_PATH . ucfirst(strtolower($class)) . '.php'; 
	}
}

spl_autoload_register( 'cargaClasesCore' );
