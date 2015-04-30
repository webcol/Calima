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
//namespace mvc\controladores;
//verificamos la version de php en tu servidor web o local
if (version_compare(PHP_VERSION, '5.3.20', '<'))
{
	die('Su Hosting tiene una version < a PHP 5.3.20 debes actualizar para esta version de Calima. su version actual de PHP es: '.PHP_VERSION);
}




//Cargamos los Espacios de nombres para el nucleo y los ayudantes
//Utilizamos un alias
use Sistema\Nucleo as Sisnuc;
use Sistema\Ayudantes as Sisayu;

class instaladorControlador extends Sisnuc\CFControlador
{
    //put your code here
    private $_basedatos;
    private $_ayuda;
    private $_analytics;
    public function __construct() {
        parent::__construct();
       $this->_basedatos=$this->cargaModelo('instalador'); 
        
        $this->_ayuda= new Sisayu\CfPHPAyuda;
    }
    
    public function index(){
        $this->_vista->titulo="Instalador de Inicio App";
        $this->_vista->imprimirVista('index','instalador');
        
    }
    
    //metodo para crear la base de datos de inicio de proyecto
    public function crearBaseDatos(){
        
       
        $this->_basedatos->crearTablas();
        $this->_ayuda->redireccionUrl('');
       
    }
    
    public function verificarBd(){
        
               $proyecto=$_POST['proyecto'];
               if(isset($_POST['analytics'])!=''){
                    $this->_analytics="'".$_POST['analytics']."'";
               }
                   $this->_analytics="'"."UA-xxxxxx"."'";
               
               
               $analytics=$this->_analytics;
               $hostbd="'".$_POST['hostbd']."'";
               $nombrebd="'".$_POST['nombrebd']."'";
               $usuariobd="'".$_POST['usuariobd']."'";
               $clavebd="'".$_POST['clavebd']."'";
               $config="'".$_POST['config']."'";
               
             $a= $this->_basedatos->verificarBdM($_POST['nombrebd'],$_POST['usuariobd'],$_POST['clavebd']);
             
             if($a){
                 
                $this->paso1($proyecto,$analytics,$hostbd,$nombrebd,$usuariobd,$usuariobd,$clavebd,$config);
             }else{
                 $this->_ayuda->redireccionUrl('instalador?error="Los datos que estas ingresando no coniciden con los de la BD"');
             }
        
    }


    public function paso1($proyecto,$analytics,$hostbd,$nombrebd,$usuariobd,$usuariobd,$clavebd,$config){
        
               
               
               
        //$this->crearBaseDatos($_POST['hostbd'],$_POST['nombrebd'],$_POST['usuariobd'],$_POST['clavebd']);
        //Cf_Configuracion.php
        $file = fopen(RUTA_NUCLEO."Cf_Configuracion.php", "w");
        
        fwrite($file, "<?php " . PHP_EOL.PHP_EOL);
        
        fwrite($file, "/* inicio la configuracion*/" . PHP_EOL);
        fwrite($file, "define('Cf_CONFIG_INICIO', $config);" . PHP_EOL.PHP_EOL);
        
        fwrite($file, "/* Defino zona horaria*/" . PHP_EOL);
        fwrite($file, "date_default_timezone_set('America/Bogota');" . PHP_EOL.PHP_EOL);
        
        
        fwrite($file, "/* Define una cuenta de correo para uso del app */" . PHP_EOL);
        fwrite($file, "define('DESTINO_EMAIL', 'info@calimaframework.com');" . PHP_EOL.PHP_EOL);        

        fwrite($file, "/* Defino el formato de fecha */" . PHP_EOL);
        fwrite($file, "define('Cf_FORMATO_FECHA', 'l, d F Y');" . PHP_EOL.PHP_EOL);
        
        fwrite($file, "/* CalimaFramework clave de licencia */" . PHP_EOL);
        fwrite($file, "define('Cf_LICENSE', 'Cf-O17N-JHK8-TDJL-B5AO-8WKA');" . PHP_EOL.PHP_EOL);
        
        fwrite($file, "/* mensajes de warnin */" . PHP_EOL);
        fwrite($file, "define('CF_DEBUG', TRUE);" . PHP_EOL.PHP_EOL);
        
        fwrite($file, "/* Idioma local */" . PHP_EOL);
        fwrite($file, "define('CF_LOCALE', 'es_ES');" . PHP_EOL.PHP_EOL);
        
        
        fwrite($file, "/* Create una cuenta con google analytics y agrega el UA en la constante */" . PHP_EOL);
        fwrite($file, "define('CF_ANALYTICS', $analytics);" . PHP_EOL.PHP_EOL);
        
        fwrite($file, "/* con la siguiente constante podras crear una ip fija de tu empresa para hacer " . PHP_EOL);
        fwrite($file, "* pruebas en tu entorno de red basado en tu ip que te ofrece tu proveedor de servicio" . PHP_EOL);
        fwrite($file, "*/" . PHP_EOL);
        fwrite($file, "define('Cf_IPPRUEBAS', 'x.x.x.x');" . PHP_EOL.PHP_EOL);
        
        
        fwrite($file, "/* Transladamos a formato local */" . PHP_EOL);
        fwrite($file, "define('CF_FECHA_FORMATO_LOCAL', '%A, %d %B %G');" . PHP_EOL.PHP_EOL);
        
        fwrite($file, "/* Translatable time format */" . PHP_EOL);
        fwrite($file, "define('CF_LOCALE_TIME_FORMAT', ' %T');" . PHP_EOL.PHP_EOL);
        
        fwrite($file, "/* Por defecto almacenamos los datos de la aplicacion. */" . PHP_EOL);
        fwrite($file, "define('CF_PATH_DATA', dirname(__FILE__) . '/Cf-data');" . PHP_EOL.PHP_EOL);
        
        fwrite($file, "#Configuracion Basica" . PHP_EOL.PHP_EOL);
        
        fwrite($file, "/* La siguiente CONSTANTE permite el apuntapiento para archivos js, css, imagenes desde la vista hacia el directorio _public */" . PHP_EOL);
        fwrite($file, "define('Cf_BASE_URL', 'http://localhost$proyecto');" . PHP_EOL.PHP_EOL);
        
        fwrite($file, "/* definimos un controlador inicial en nuestro proyecto */" . PHP_EOL);
        fwrite($file, "define('CONTROLADOR_INICIAL', 'index');" . PHP_EOL.PHP_EOL);
        
        fwrite($file, "/* Sedefine una CONSTANTE al directorio adicionales en la vista */" . PHP_EOL);
        fwrite($file, "define('ADICIONALES_VISTA', 'adicionales');" . PHP_EOL.PHP_EOL);
        
        fwrite($file, "/* Definimos una CONSTANTE como nombre de aplicacion */" . PHP_EOL);
        fwrite($file, "define('CF_AP_NOMBRE', 'CalimaFramework');" . PHP_EOL.PHP_EOL);
        
        fwrite($file, "/* Definimos un Slogan para la aplicacion web */" . PHP_EOL);
        fwrite($file, "define('CF_AP_SLOGAN', 'Tu Framework php MVC hispano ');" . PHP_EOL.PHP_EOL);
        
        fwrite($file, "/* Empresa de la aplicacion */" . PHP_EOL);
        fwrite($file, "define('CF_AP_EMPRESA', 'www.webcol.net');" . PHP_EOL.PHP_EOL);
        
        fwrite($file, "/* Creditos de la aplicacion */" . PHP_EOL);
        fwrite($file, "define('CF_AP_CREDITOS', 'CopyLeft 2015 Debeloped by www.webcol.net');" . PHP_EOL.PHP_EOL);
        
        fwrite($file, "#webcol seguridad" . PHP_EOL. PHP_EOL);
        
        fwrite($file, "/* Definimos un indice de clave para concatenar en encriptacion de datos */" . PHP_EOL);
        fwrite($file, "define('Cf_KEY_MD5', 'P0L1');" . PHP_EOL.PHP_EOL);
        
        fwrite($file, "/*  en el controlador concatena la constante con el llamado a la funcion generarCadenaAleatoria() de Cf_PHPSeguridad */" . PHP_EOL);
        fwrite($file, "define('Cf_CSRF_SECRET','Cfbeta');" . PHP_EOL.PHP_EOL);
        
        fwrite($file, "/* #base de datos */" . PHP_EOL. PHP_EOL);
        
        fwrite($file, "/* Configuracion de tu base de datos */" . PHP_EOL);
        fwrite($file, "define('CF_BD_HOST', $hostbd);" . PHP_EOL);
        fwrite($file, "define('CF_BD_NOMBRE', $nombrebd);" . PHP_EOL);
        fwrite($file, "define('CF_BD_USUARIO', $usuariobd);" . PHP_EOL);
        fwrite($file, "define('CF_BD_CLAVE', $clavebd);" . PHP_EOL);
        fwrite($file, "define('CF_BD_CHAR', 'utf8');" . PHP_EOL);
        fwrite($file, "define('CF_BD_CONECTOR', 'mysql');");
        fwrite($file, "");
        fclose($file);
        
        $this->_ayuda->redireccionUrl('instalador/crearBaseDatos');
        //$this->crearBaseDatos();
        }
        
    }
