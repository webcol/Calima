<?php

class pruebaModelo extends Cf_Modelo {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function llamarDatos(){
        //echo DB_HOST;
        $post=$this->_bd->consulta('select * from post ');
        return $post=$this->_bd->resultset();//=$this->_bd->resultset();$post->fetchall();
        
       
    }
    
    public function insertarDatos(){
        
        $post=$this->_bd->consulta('INSERT INTO post (id, titulo, cuerpo) VALUES (:id, :titulo, :cuerpo)');
        $post=$this->_bd->enlace(':id', '4');
        $post=$this->_bd->enlace(':titulo', 'efrasoft');
        $post=$this->_bd->enlace(':cuerpo', 'este es el cuerpo 23');
        $post=$this->_bd->ejecucion();
        //return $post=$this->_bd->resultset();
        //echo $post=$this->_bd->lastInsertId();
    }
    
    public function actualizarDatos(){
        $post=$this->_bd->consulta('UPDATE post set titulo = :titulo');
       
        $post=$this->_bd->enlace(':titulo', 'efrasoft5');
        
        $post=$this->_bd->ejecucion();
        
    }
}