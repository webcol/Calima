<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PHPAyuda {
    
    //seguridad
    
    public function filtrarTexto($texto){
        return strip_tags($texto);
    }
    
    public function filtrarCaracteresEspeciales($texto){
        return htmlspecialchars($texto, ENT_QUOTES);
    }
    
    //email
    
    public function enviarCorreo($para, $titulo= 'Asunto', $mensaje= 'cuerpo del correo'){
        return mail($para, $titulo, $mensaje);
    }
}