<?php


class usuarioControlador extends \Sistema\Nucleo\CFControlador
{
    private $_ayuda;
    private $_seg;
    private $_sesion;    
    public function __construct() {
        parent::__construct();
               
        // cargamos la clase ayudantes para usar sus metodos de ayuda  
        // esta clase por que no se carga global ya que todos lo controladores la van a usar ??
        $this->_ayuda= new Sistema\Ayudantes\CFPHPAyuda;        
        $this->_seg= new Sistema\Ayudantes\CFPHPSeguridad;
        $this->_sesion=new Sistema\Nucleo\CFSesion();       
    }    
    
    public function index(){     
        $this->_sesion->iniciarSesion('_s', Cf_SESION_PARAMETRO_SEGURO);
        // si se tiene una clase para la creacion de sessiones por que se llama el session_destroy directamente ??
        session_destroy();
        $this->_vista->titulo = 'CalimaFramework Login';
        $this->_vista->error = 'CalimaFramework Login';
        $this->_vista->imprimirVista('index', 'usuario');
    }  
    
    public function registro(){ 
        $this->_vista->titulo = 'CalimaFramework registro';
        $this->_vista->imprimirVista('registro', 'usuario');
        
    }
    
    public function crearRegistro(){
        $datas = $this->cargaModelo('usuario');    
        if(isset($_POST['nombre'])){
        $nombre=$_POST['nombre'];
        $email=$_POST['email'];
        $usuario=$_POST['nombre'];
         $clave=$this->_seg->cifrado($this->_seg->filtrarTexto($_POST['clave']));
        
         $datas->insertarRegistro(
                     $this->_seg->filtrarTexto($_POST['nombre']),
                     $this->_seg->filtrarTexto($_POST['email']),
                     '1',
                     $clave
                    );
                $this->_ayuda->redireccionUrl('usuario');       
        }
        else{
            $this->_ayuda->redireccionUrl('usuario/registro');
        }
    }
    
    public function valida(){
        if(isset($_POST['usuario'])){
        $usuario=$_POST['usuario'];
        $clave=$this->_seg->cifrado($this->_seg->filtrarTexto($_POST['clave']));
        
        $datosUser = $this->cargaModelo('usuario');
        $valida=$datosUser->seleccionUsuario($usuario, $clave);  
        
        if(isset($valida)){
            $this->_sesion->iniciarSesion('_s', Cf_SESION_PARAMETRO_SEGURO);
            $_SESSION['usuario']=$usuario;             
            $_SESSION['id_usuario']=$valida['id_usuario'];
            $_SESSION['nivel']=$valida['nivel']; 
            $this->_ayuda->redireccionUrl('data/index');         
        }
       $this->_ayuda->redireccionUrl('usuario');
        
        }
    }
    
     public function cerrarSesion(){
        $this->_sesion->iniciarSesion('_s', false);
        session_destroy();
        $this->_sesion->destruir('usuario');
        $this->_ayuda->redireccionUrl('usuario');
        
    }
}
