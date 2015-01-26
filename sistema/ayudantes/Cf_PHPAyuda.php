<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Cf_PHPAyuda {
    
    
    private $_sesion;
    //Email
    
    public function __construct() {
        //parent::__construct();
    
    $this->_sesion=new Cf_Sesion();
    }
    public function enviarCorreo($para, $titulo= 'Asunto', $mensaje= 'cuerpo del correo'){
        return mail($para, $titulo, $mensaje);
    }
    
    
     // filtros Email
    
    function filtroEmail($email){
        if (!filter_input(INPUT_POST, $email, FILTER_VALIDATE_EMAIL)){
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
    
    function redireccionUrl($url){
        $url=Cf_BASE_URL.$url;
    header('Location: ' . $url);
    exit();
    }
    
    function redireccionUrlMsj($controlador){
        $this->_sesion->iniciarSesion('_s', false);
        $_SESSION[error_ingreso]='Error en el intento de ingreso';
        $controlador=Cf_BASE_URL.$controlador;
    header('Location: ' . $controlador);
    exit();
    }
    
    function redireccion_($url, $statusCode = 303){
    header('Location: ' . $url, true, $statusCode);
    die();
    }
    
    function redirect($controller,$method = "index",$args = array())
{
    global $core; /* Guess Obviously */

    $location = $core->Cf_BASE_URL . "/" . $controller . "/" . $method . "/" . implode("/",$args);

    /*
        * Use @header to redirect the page:
    */
    header("Location: " . $location);
    exit;
}
    
    
    
    //texto
    public function filtrarEntero($int){
        
       return filter_var($int, FILTER_VALIDATE_INT);
       
    }
    
   
}
