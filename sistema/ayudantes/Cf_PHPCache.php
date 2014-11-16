<?php

/**
*Package:
*CopyLeft:  Calima Framework http://www.calimaframework.com)
*Licencia: Copyleft License
*Localizado en: Sistema/ayudantes/Cf_PHPArchivo.php
*/

class Cf_PHPCache {
	/**
	 * Configuracion
	 *
	 * @access public
	 */
	public static $configuracion = array(
		'cache_dir' => 'cache',
		// por defecto el tiempo expira en  *minutos*
		'expires' => 180,
	);
	
	public static function configurar($clave, $valor = null) {
		if( is_array($clave) ) {
			foreach ($clave as $config_name => $config_value) {
				self::$configuracion[$config_name] = $config_value;
			}
		} else {
			self::$configuracion[$clave] = $valor;
		}
	}
	/**
	 * obtiene la ruta del archivo asociado a la clave.
	 *
	 * @access public
	 * @param string $clave
	 * @return string el nombre del archivo php
	 */
	public static function obtenerRuta($clave) {
		return static::$configuracion['cache_path'] . '/' . md5($clave) . '.php';
	}
	/**
	 * obtiene los datos asociados a la clave
	 *
	 * @access public
	 * @param string $clave	 
	 */
	public static function obtener($clave, $raw = false, $tiempo_personalizado = null) {
		if( ! self::file_expired($archivo = self::obtenerRuta($clave), $tiempo_personalizado)) {
			$contenido = file_get_contents($archivo);
			return $raw ? $contenido : unserialize($contenido);
		}
		return null;
	}
	/**
	 * Envia el contenido dentro de la cache
	 *
	 * @access public
	 * @param string $clave
	 * @param mixed $content the the content you want to store
	 * @param bool $raw whether if you want to store raw data or not. If it is true, $content *must* be a string
	 *        It can be useful for static html caching.
	 * @return bool whether if the operation was successful or not
	 */
	public static function enviar($clave, $contenido, $raw = false) {
		return @file_put_contents(self::obtenerRuta($clave), $raw ? $contenido : serialize($contenido)) !== false;
	}
	/**
	 * Delete data from cache
	 *
	 * @access public
	 * @param string $clave
	 * @return bool true if the data was removed successfully
	 */
	public static function eliminar($clave) {
		if( ! file_exists($archivo = self::obtenerRuta($clave)) ) {
			return true;
		}
		return @unlink($archivo);
	}
	/**
	 * limpia la cache
	 *
	 * @access public
	 * @return bool always true
	 */
	public static function limpiar() {
		$cache_files = glob(self::$configuracion['cache_path'] . '/*.php', GLOB_NOSORT);
		foreach ($cache_files as $archivo) {
			@unlink($archivo);
		}
		return true;
	}
	/**
	 * Check if a file has expired or not.
	 *
	 * @access public
	 * @param $archivo the rout to the file
	 * @param int $fecha the number of minutes it was set to expire
	 * @return bool if the file has expired or not
	 */
	public static function file_expired($archivo, $fecha = null) {
		if( ! file_exists($archivo) ) {
			return true;
		}
		return (time() > (filemtime($archivo) + 60 * ($fecha ? $fecha : self::$configuracion['expires'])));
	}
}
