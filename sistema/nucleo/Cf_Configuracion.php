<?php

/* Defino zona horaria*/
date_default_timezone_set('America/Bogota');

/* Set default date format */
define('Cf_FORMATO_FECHA', 'l, d F Y');

/* CalimaFramework clave de licencia */
define('Cf_LICENSE', 'Cf-O17N-JHK8-TDJL-B5AO-8WKA'); //'FREE-5RTY-POI8-0UYT-IUYT-TGH6'

/* mensajes de warnin */
define('CF_DEBUG', TRUE);

/* Idioma local */
define('CF_LOCALE', 'es_ES');

/* Create una cuenta con google analytics y agrega el UA en la constante */
define('CF_ANALYTICS', 'UA-xxxxxx');


/* con la siguiente constante podras crear una ip fija de tu empresa para hacer 
 * pruebas en tu entorno de red basado en tu ip que te ofrece tu proveedor de servicio 
 */
define('Cf_IPPRUEBAS', 'x.x.x.x');


/* Translatable locale format */
define('CF_LOCALE_DATE_FORMAT', '%A, %d %B %G');

/* Translatable time format */
define('CF_LOCALE_TIME_FORMAT', ' %T');

/* Default location to store application data. Must be protected from public. */
define('CF_PATH_DATA', dirname(__FILE__) . '/Cf-data');

/* Mas informacion para este archivo http://www.calimaframework.com/info/ */

#Configuracion Basica

define('Cf_BASE_URL', 'http://localhost/calima/');
define('CONTROLADOR_INICIAL', 'index');
define('ADICIONALES_VISTA', 'adicionales');

define('CF_AP_NOMBRE', 'CalimaFramework');
define('CF_AP_SLOGAN', 'Tu Framework php MVC hispano ');
define('CF_AP_EMPRESA', 'www.webcol.net');

#webcol seguridad
define('Cf_KEY_MD5', 'P0L1');

// en el controlador concatena la constante con el llamado a la funcion generarCadenaAleatoria() de Cf_PHPSeguridad
define('Cf_CSRF_SECRET','Cfbeta');

#base de datos
// Configuracion de tu base de datos
define('CF_BD_HOST', 'localhost');
define('CF_BD_NOMBRE', 'calima');
define('CF_BD_USUARIO', 'cali');
define('CF_BD_CLAVE', '654321aa');
define('CF_BD_CHAR', 'utf8');
define('CF_BD_CONECTOR', 'mysql');



ini_set('memory_limit', '256M');
