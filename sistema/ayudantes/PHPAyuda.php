<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PHPAyuda {
    
    //Seguridad
    
    public function filtrarTexto($texto){
        return strip_tags($texto);
    }
    
    public function filtrarCaracteresEspeciales($texto){
        return htmlspecialchars($texto, ENT_QUOTES);
    }
    
    //Email
    
    public function enviarCorreo($para, $titulo= 'Asunto', $mensaje= 'cuerpo del correo'){
        return mail($para, $titulo, $mensaje);
    }
    
    
     // filtros Email
    
    function filtroEmail(){
        if (!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)){
            echo "E-Mail no es valido";
        }
        else
        {
            echo "E-Mail es valido";
        }
        
    }
    
    //Redirecionar
    
    function Redireccion($url, $permanent = false){
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    exit();
    }
    
    function redireccion_($url, $statusCode = 303){
    header('Location: ' . $url, true, $statusCode);
    die();
    }
    
   
}
