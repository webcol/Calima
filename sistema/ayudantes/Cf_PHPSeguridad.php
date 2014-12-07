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
}