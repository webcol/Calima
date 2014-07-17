<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class pruebaModelo extends Cf_Modelo {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function llamarDatos(){
        //echo DB_HOST;
        $post=$this->_bd->query('select * from post');
        return $post=$this->_bd->resultset();
        
       
    }
}
