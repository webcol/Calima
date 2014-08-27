<?php


class Cf_Basedatos{
    
    private $host      = CF_BD_HOST;
    private $usuario      = CF_BD_USUARIO;
    private $clave      = CF_BD_CLAVE;
    private $bdnombre    = CF_BD_NOMBRE;
    private $bdchar    = CF_BD_CHAR;
    private $bdconector    = CF_BD_CONECTOR;
 
    private $stmt;
    private $dbh;
    private $error;
    protected $db;
 
    public function __construct(){
        // definimos el dsn
          $dns = $this->bdconector . ':host=' . $this->host . ';dbname=' . $this->bdnombre;
          
        // Opciones para PDO
               
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        );
        
        
        // creamos una instancia de PDO
        try{
            $this->dbh = new PDO($dns, $this->usuario, $this->clave, $options);
        }
        // Catch any errors
        catch(PDOException $e){
            $this->error = $e->getMessage();
        }
    }
    
    public function consulta($query){
    $this->stmt = $this->dbh->prepare($query);
    }
    
    public function enlace($param, $value, $type = null){//bind
    if (is_null($type)) {
        switch (true) {
            case is_int($value):
                $type = PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type = PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type = PDO::PARAM_NULL;
                break;
            default:
                $type = PDO::PARAM_STR;
        }
    }
    $this->stmt->bindValue($param, $value, $type);//bindValue de PDO php
    }
    
    public function ejecucion(){
    return $this->stmt->execute();
    }
    
    public function resultset(){
    $this->ejecucion();
    return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function primeraColumna(){
    $this->ejecucion();
    return $this->stmt->fetchColumn();
    }
    
    
    
    public function PrimerRegistro(){
    $this->ejecucion();
    return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function contarFilas(){
    return $this->stmt->rowCount();
    }
    
    public function lastInsertId(){
    return $this->dbh->lastInsertId();
    }
    public function beginTransaction(){
    return $this->dbh->beginTransaction();
    }
    
    public function endTransaction(){
    return $this->dbh->commit();
    }
    
    public function cancelTransaction(){
    return $this->dbh->rollBack();
    }
    
    public function debugDumpParams(){
    return $this->stmt->debugDumpParams();
    }
}