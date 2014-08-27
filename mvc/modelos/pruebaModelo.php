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
}