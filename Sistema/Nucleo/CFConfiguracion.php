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


/* La siguiente CONSTANTE permite el apuntapiento para archivos js, css, imagenes desde la vista hacia el directorio _public */
// esta constante es muy importante para el inicio de Cf Usted debe de escribr aqui el url de su sitio
// Ejemplo: http://misitioweb.co/ o http://localhost/midirectorio/
define('Cf_BASE_URL', 'http://localhost/calima/');

/* definimos un controlador inicial en nuestro proyecto */
define('CONTROLADOR_INICIAL', 'instalador');


/* Sedefine una CONSTANTE al directorio adicionales en la vista */
define('ADICIONALES_VISTA', 'adicionales');


/* Creditos de la aplicacion */
define('CF_AP_CREDITOS', 'CopyLeft 2015 Debeloped by www.webcol.net');


/* #base de datos */

/* Configuracion de tu base de datos */
define('CF_BD_HOST', 'localhost');
define('CF_BD_NOMBRE', '');
define('CF_BD_USUARIO', '');
define('CF_BD_CLAVE', '');
define('CF_BD_CHAR', 'utf8');
define('CF_BD_CONECTOR', 'mysql');