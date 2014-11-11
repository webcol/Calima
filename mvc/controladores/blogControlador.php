<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class blogControlador extends Cf_Controlador {
    
    private $_ayud;


    public function __construct() {
        parent::__construct();
        
        $this->cargaAyudante("PHPAyuda");
        $this->_ayud = new PHPAyuda;
    }
    
    public function index(){
        $datas = $this->cargaModelo('blog');       
        
        $this->_vista->postear= $datas->llamarDatosBlog();
        $this->_vista->titulo = 'Blog Calima Framework';
        $this->_vista->imprimirVista('index', 'blog');        
        
    }
    public function crearpost(){
        $datas = $this->cargaModelo('blog');       
        
        $this->_vista->postear= $datas->llamarDatosBlog();
        $this->_vista->titulo = 'Blog Calima Framework crear post';
        $this->_vista->imprimirVista('crearpost', 'blog');  
        
    }
    
    public function wikipost(){
        $datas = $this->cargaModelo('blog');       
        
        $this->_vista->postear= $datas->llamarDatosBlog();
        $this->_vista->comentarios= $datas->llamarComentarios();
        $this->_vista->contar= $datas->contarComentarios($_GET['id']);
        $this->_vista->titulo = 'Blog 1 Calima Framework';
        $this->_vista->imprimirVista('wikipost', 'blog');  
        
        
        $this->_vista->titulo = 'Registro CalimaFramework';
            if(isset($_GET['titulo'])){
            $this->_vista->salida_campo = $_GET['titulo'];
            }
            
            $this->_vista->imprimirVista('wikipost', 'blog');
            //$datas = $this->cargaModelo('blog');
            if (isset($_POST['enviar'])&& isset($_POST['option1'])  ) {
                
                $datas->insertarDatos(
                     $this->_ayud->filtrarEntero($_POST['id']),
                     $this->_ayud->filtrarTexto($_POST['nombre']),
                     $this->_ayud->filtrarTexto($_POST['email']),
                     $this->_ayud->filtrarTexto($_POST['comentario'])
                    );
                echo $this->_ayud->filtrarEntero('id');
                $_POST['option1']=false;
                
            }
        
    }
    
    public function insertarComentario(){
        
         /*$this->_vista->titulo = 'Registro CalimaFramework';
            if(isset($_GET['titulo'])){
            $this->_vista->salida_campo = $_GET['titulo'];
            }
            
            $this->_vista->imprimirVista('wikipost', 'blog');
            $datas = $this->cargaModelo('blog');
            if (isset($_POST['titulos'])) {
                $id_unico=$this->_ayud->filtrarEntero($_POST['id']).$this->_ayud->aleatorio();
                $datas->insertarDatos(
                     $id_unico,
                     $this->_ayud->filtrarTexto($_POST['nombre']),
                     $this->_ayud->filtrarTexto($_POST['email']),
                     $this->_ayud->filtrarTexto($_POST['comentario'])
                    );
                echo $this->_ayud->filtrarEntero('id');
            }*/
        
    }
    
    
    
    
    
            
}