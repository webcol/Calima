<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Cf_PHPAyuda {
    
    
    
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
    
    //cadenas
    
    function rangoTexto($texto, $inicio, $cantidad){
        
        return $limite= substr($texto, $inicio, $cantidad); 
        
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
    
    //texto
    public function filtrarEntero($int){
        
       return filter_var($int, FILTER_VALIDATE_INT);
       
    }
    
   
}
