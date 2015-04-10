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
 * @package    root
 * @copyright  Copyright (c) 2006 - 2014 webcol.net (http://www.webcol.net/calima)
 * @license	https://github.com/webcol/Calima/blob/master/LICENSE	MIT
 * @version	##BETA 1.0##, ##2014 - 2015##
 * <http://www.calimaframework.com>.
 */



/** Cf directorio separador */
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
/** Cf raiz del sitio */
defined('SITE_ROOT')? null: define('SITE_ROOT', realpath(dirname(__FILE__)).DS);
/** Cf PATH del sitio */
defined('SITE_PATH') ? NULL : define ('SITE_PATH', realpath(dirname(__FILE__) . DS . '..' . DS) . DS);

/** Cf definimos constante Ruta directa al nucleo de framework  */
define('RUTA_NUCLEO', SITE_ROOT . 'sistema'.DS.'nucleo' . DS);

# define para mvc erp

/** Cf definimos constante  directa a la vista del framework  */
define('VIEW_PATH', SITE_ROOT . 'mvc'.DS.'vistas' . DS);
/** Cf definimos constante  directa a los controladores del framework  */
define('CONTR_PATH', SITE_ROOT . 'mvc'.DS.'controladores' . DS);
/** Cf definimos constante  directa a los modelos del framework  */
define('RUTA_MOD', SITE_ROOT . 'mvc'.DS.'modelos' . DS);

# define ruta a los stilos del public

/** Cf definimos constante  directa a los css dentro del directorio public_ del framework  */
define('CSS_PATH', SITE_ROOT . 'public_'.DS.'css' . DS);
/** Cf definimos constante  directa a los css dentro del directorio public_ del framework  */
define('IMG_PATH', SITE_ROOT . 'public_'.DS.'img' . DS);
/** Cf definimos constante  directa a los js dentro del directorio public_ del framework  */
define('JS_PATH', SITE_ROOT . 'public_'.DS.'js' . DS);
/** Cf definimos constante  directa a las librerias dentro  del framework  */
define('RUTA_LIBS', SITE_ROOT . 'sistema'.DS.'librerias' . DS);
/** Cf definimos constante  directa a los ayudantes del framework  */
define('RUTA_AYUDANTES', SITE_ROOT . 'sistema'.DS.'ayudantes' . DS);

#Firewall desactivado

/*define('PHP_FIREWALL_REQUEST_URI', strip_tags( $_SERVER['REQUEST_URI'] ) );
define('PHP_FIREWALL_ACTIVATION', true );
if ( is_file( @dirname(__FILE__).'RUTA_LIBS'.DS.'php-firewall'.DS.'firewall.php' ) )
	include_once( @dirname(__FILE__).'RUTA_LIBS'.DS.'php-firewall'.DS.'firewall.php' );*/

# Cargamos la autocarga dinamica y configuraciones
require_once RUTA_NUCLEO . 'Cf_Autocarga.php';
require_once RUTA_NUCLEO . 'Cf_Configuracion.php';



try{
  Cf_Bootstrap::actuar(new Cf_Solicitud);
}
catch(Exception $e){
    echo $e->getMessage();
}