<?php

/* Defino zona horaria*/
date_default_timezone_set('America/Bogota');

/* Set default date format */
define('Cf_FORMATO_FECHA', 'l, d F Y');

/* CalimaFramework license key */
define('Cf_LICENSE', 'Cf-O17N-JHK8-TDJL-B5AO-8WKA'); //'FREE-5RTY-POI8-0UYT-IUYT-TGH6'

/* Enable or disable warning messages */
define('CF_DEBUG', TRUE);

/* Default application locale */
define('CF_LOCALE', 'es_ES');

define('CF_ANALYTICS', 'UA-56990391-1');

/* Translatable locale format */
define('CF_LOCALE_DATE_FORMAT', '%A, %d %B %G');

/* Translatable time format */
define('CF_LOCALE_TIME_FORMAT', ' %T');

/* Default location to store application data. Must be protected from public. */
define('CF_PATH_DATA', dirname(__FILE__) . '/Cf-data');

/* More information on this file at http://www.calimaframework.com/info/ */

#Configuracion Basica
define('BASE_URL', 'http://localhost/calima/');
define('CONTROLADOR_INICIAL', 'index');
define('ADICIONALES_VISTA', 'adicionales');

define('CF_AP_NOMBRE', 'CalimaFramework');
define('CF_AP_SLOGAN', 'Tu Framework php MVC hispano ');
define('CF_AP_EMPRESA', 'www.webcol.net');

#webcol seguridad
define('CF_KEY_MD5', 'P0L1');


#base de datos
// Configuracion de tu base de datos
define('CF_BD_HOST', 'localhost');
define('CF_BD_NOMBRE', 'calima');
define('CF_BD_USUARIO', 'cali');
define('CF_BD_CLAVE', '654321aa');
define('CF_BD_CHAR', 'utf8');
define('CF_BD_CONECTOR', 'mysql');



ini_set('memory_limit', '256M');
