<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class blogModelo extends Cf_Modelo {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function insertarDatos($id_blog, $nombre,  $email, $comentario){
        
        $post=$this->_bd->consulta('INSERT INTO comentarios (id_blog, nombre, email, comentario) VALUES (:id_blog, :nombre, :email, :comentario)');
        $post=$this->_bd->enlace(':id_blog', $id_blog);
        $post=$this->_bd->enlace(':nombre',$nombre);
        $post=$this->_bd->enlace(':email', $email);
        $post=$this->_bd->enlace(':comentario', $comentario);
        $post=$this->_bd->ejecucion();
        return $post=$this->_bd->resultset();
        
    }
    
    public function llamarDatosCategoria(){
        //echo DB_HOST;
        $cate=$this->_bd->consulta('select * from categoria ');
        return $cate=$this->_bd->resultset();//=$this->_bd->resultset();$post->fetchall();
        
       
    }
    
    public function llamarDatosTags(){
        //echo DB_HOST;
        $post=$this->_bd->consulta('select * from tags ');
        return $post=$this->_bd->resultset();//=$this->_bd->resultset();$post->fetchall();
        
       
    }
    
    
    public function llamarDatosBlog(){
        //echo DB_HOST;
        $post=$this->_bd->consulta('select * from blog ');
        return $post=$this->_bd->resultset();//=$this->_bd->resultset();$post->fetchall();
        
       
    }
    
    public function llamarDatosBlogId($id){
        //echo DB_HOST;
        $idvideo=$id;
        $datosQuery="select idvideo from blog where id = :idvideo";
        $gsent=$this->_bd->consulta('SELECT idvideo FROM blog WHERE id = :idvideo');
        $gsent=$this->_bd->enlace(':idvideo', $idvideo);
        //$gsent=$this->_bd->ejecucion();
        $row = $gsent=$this->_bd->single();
        return  $row;
       
    }
    
    public function llamarComentarios(){
        //echo DB_HOST;
        $post=$this->_bd->consulta('select * from comentarios ');
        return $post=$this->_bd->resultset();//=$this->_bd->resultset();$post->fetchall();
        
       
    }
    
    public function contarComentarios($id){
        //echo DB_HOST;
        $post=$this->_bd->consulta('SELECT COUNT(*) FROM comentarios');
        return $post=$this->_bd->resultset();//=$this->_bd->resultset();$post->fetchall();
        
       
    }
    
}