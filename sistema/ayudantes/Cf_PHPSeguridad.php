<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class Cf_PHPSeguridad {

//Seguridad
    
    //xss funciones de mitigacion
    function xsseguro($texto,$encoding='UTF-8'){
       return htmlspecialchars($texto,ENT_QUOTES | ENT_HTML401,$encoding);
    }
    function xecho($texto){
       echo xsseguro($texto);
    }
    
    public function filtrarTexto($texto){
        return strip_tags($texto);
    }
    
     
    
    public function filtrarCaracteresEspeciales($texto){
        return htmlspecialchars($texto, ENT_QUOTES);
    }
    
    
    // Genracion de Cadenas Aleatorias
    function generarCadenaAleatoria($longitud = 10) {
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $longitudCaracteres = strlen($caracteres);
        $cadenaAleatoria = '';
        for ($i = 0; $i < $length; $i++) {
             $cadenaAleatoria .= $caracteres[rand(0, $longitudCaracteres - 1)];
        }
        return $cadenaAleatoria;
    }
    // Protecion CSRF
    public function generoTokenDeFormulario($formulario) {
        $secreta =  Cf_CSRF_SECRET.$this->generarCadenaAleatoria();
        $sid = session_id();
        $token = md5($secreta.$sid.$formulario);
        return $token;
    }
    
    public function verificoTokenDeFormulario($formulario, $token) {
        $secreta =  Cf_CSRF_SECRET.$this->generarCadenaAleatoria();
        $sid = session_id();
        $correcta = md5($secreta.$sid.$formulario);
        return ($token == $correcta);
    }
    
    function obtenerDireccionIP(){
    if (!empty($_SERVER ['HTTP_CLIENT_IP'] ))
      $ip=$_SERVER ['HTTP_CLIENT_IP'];
    elseif (!empty($_SERVER ['HTTP_X_FORWARDED_FOR'] ))
      $ip=$_SERVER ['HTTP_X_FORWARDED_FOR'];
    else
      $ip=$_SERVER ['REMOTE_ADDR'];

    return $ip;
	}
	
    function restringirIp($ip){
        $ipCliente = $this->obtenerDireccionIP();

        if($ipCliente == $ip){
        return true;
        }
        else{
        header('location: http://www.tusitioweb/redireccion');
        exit;
        }
    }
	
	function restringirConjuntoIps($ips){
    $ipCliente = obtenerDireccionIP();

    if (in_array($ipCliente,$ips)){
        return true;
    }
    else{
        header('location: http://direccion_envio_salida');
        exit;
    }
	}
	
	function restringirRango(){
    $ipCliente = obtenerDireccionIP();

    if(substr($ipCliente, 0, 8 ) == "150.214."){
        return true;
    }
    else{
        header('location: http://direccion_envio_salida');
        exit;
    }
	}
        
        
        /**
 *
 * @strip injection chars from email headers
 *
 * @param string $string
 *
 * return string
 *
 */
function emailSeguro($cadena) {
     return  preg_replace( '((?:\n|\r|\t|%0A|%0D|%08|%09)+)i' , '', $cadena );
}

/*** example usage 
$from = "sender@example.com
Cc:victim@example.com";

if(strlen($from) < 100)
{
    $from = emailSeguro($from);
}***/
    
}