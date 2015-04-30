<?php 

/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license. For more information, see
 * @category   
 * @package    sistema/nucleo
 * @copyright  Copyright (c) 2006 - 2014 webcol.net (http://www.webcol.net/calima)
 * @license	https://github.com/webcol/Calima/blob/master/LICENSE	MIT
 * @version	##BETA 1.0##, ##2014 - 2015##
 * <http://www.calimaframework.com>.
 */


/* inicio la configuracion*/
define('Cf_CONFIG_INICIO', 'true');

/* Defino zona horaria*/
date_default_timezone_set('America/Bogota');

/* Define una cuenta de correo para uso del app */
define('DESTINO_EMAIL', 'info@calimaframework.com');

/* Defino el formato de fecha */
define('Cf_FORMATO_FECHA', 'l, d F Y');

/* CalimaFramework clave de licencia */
define('Cf_LICENSE', 'Cf-O17N-JHK8-TDJL-B5AO-8WKA');

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

/* Transladamos a formato local */
define('CF_FECHA_FORMATO_LOCAL', '%A, %d %B %G');

/* Translatable time format */
define('CF_LOCALE_TIME_FORMAT', ' %T');

/* Por defecto almacenamos los datos de la aplicacion. */
define('CF_PATH_DATA', dirname(__FILE__) . '/Cf-data');

#Configuracion Basica

/* La siguiente CONSTANTE permite el apuntapiento para archivos js, css, imagenes desde la vista hacia el directorio _public */
define('Cf_BASE_URL', 'http://localhost/Calima/');

/* definimos un controlador inicial en nuestro proyecto */
define('CONTROLADOR_INICIAL', 'instalador');

/* Sedefine una CONSTANTE al directorio adicionales en la vista */
define('ADICIONALES_VISTA', 'adicionales');

/* Definimos una CONSTANTE como nombre de aplicacion */
define('CF_AP_NOMBRE', 'CalimaFramework');

/* Definimos un Slogan para la aplicacion web */
define('CF_AP_SLOGAN', 'Tu Framework php MVC hispano ');

/* Empresa de la aplicacion */
define('CF_AP_EMPRESA', 'www.webcol.net');

/* Creditos de la aplicacion */
define('CF_AP_CREDITOS', 'Licencia MIT 2014 - 2015 Debeloped by www.webcol.net');

#webcol seguridad

/* Definimos un indice de clave para concatenar en encriptacion de datos */
define('Cf_KEY_MD5', 'P0L1');

/*  en el controlador concatena la constante con el llamado a la funcion generarCadenaAleatoria() de Cf_PHPSeguridad */
define('Cf_CSRF_SECRET','Cfbeta');

/* #base de datos */

/* Configuracion de tu base de datos */
define('CF_BD_HOST', '');
define('CF_BD_NOMBRE', '');
define('CF_BD_USUARIO', '');
define('CF_BD_CLAVE', '');
define('CF_BD_CHAR', '');
define('CF_BD_CONECTOR', 'mysql');