<?php

class Cf_Sesion
{
    
    
private $host      = BD_HOST;
private $usuario      = BD_USUARIO;
private $clave      = BD_CLAVE;
private $bdnombre    = BD_NOMBRE;
private $bdchar    = BD_CHAR;
private $bdconector    = BD_CONECTOR;

private $stmt;
private $dbh;
private $error;
protected $db;
    
    
    
function __construct() {
    

// set our custom session functions.
session_set_save_handler(array($this, 'abrir'), array($this, 'cerrar'), array($this, 'leer'), array($this, 'escribir'), array($this, 'destruir'), array($this, 'gc'));

// This line prevents unexpected effects when using objects as save handlers.
register_shutdown_function('session_write_close');
}

function iniciarSesion($session_name, $secure) {
// Make sure the session cookie is not accessable via javascript.
$httponly = true;

// Hash algorithm to use for the sessionid. (use hash_algos() to get a list of available hashes.)
$session_hash = 'sha512';

// Check if hash is available
if (in_array($session_hash, hash_algos())) {
  // Set the has function.
  ini_set('session.hash_function', $session_hash);
}
// How many bits per character of the hash.
// The possible values are '4' (0-9, a-f), '5' (0-9, a-v), and '6' (0-9, a-z, A-Z, "-", ",").
ini_set('session.hash_bits_per_character', 5);

// Force the session to only use cookies, not URL variables.
ini_set('session.use_only_cookies', 1);

// Get session cookie parameters 
$cookieParams = session_get_cookie_params(); 
// Set the parameters
session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly); 
// Change the session name 
session_name($session_name);
// Now we cat start the session
session_start();
// This line regenerates the session and delete the old one. 
// It also generates a new encryption key in the database. 
session_regenerate_id(true); 
}


function abrir() {
  
   $mysqli = new mysqli($this->host, $this->usuario, $this->clave, $this->bdnombre);
   $this->dbh = $mysqli;
   return true;
}

function cerrar() {
   $this->dbh->close();
   return true;
}


function leer($id) {
   if(!isset($this->read_stmt)) {
      $this->read_stmt = $this->dbh->prepare("SELECT data FROM sesion WHERE id = ? LIMIT 1");
   }
   $this->read_stmt->bind_param('s', $id);
   $this->read_stmt->execute();
   $this->read_stmt->store_result();
   $this->read_stmt->bind_result($data);
   $this->read_stmt->fetch();
   $key = $this->getkey($id);
   $data = $this->decrypt($data, $key);
   return $data;
}





function escribir($id, $data) {
   // Get unique key
   $key = $this->getkey($id);
   // Encrypt the data
   $data = $this->encrypt($data, $key);
 
   $time = time();
   if(!isset($this->w_stmt)) {
      $this->w_stmt = $this->dbh->prepare("REPLACE INTO sesion (id, set_time, data, session_key) VALUES (?, ?, ?, ?)");
   }
 
   $this->w_stmt->bind_param('siss', $id, $time, $data, $key);
   $this->w_stmt->execute();
   return true;
}

function destruir($id) {
   if(!isset($this->delete_stmt)) {
      $this->delete_stmt = $this->dbh->prepare("DELETE FROM sesion WHERE id = ?");
   }
   $this->delete_stmt->bind_param('s', $id);
   $this->delete_stmt->execute();
   return true;
}

function gc($max) {
   if(!isset($this->gc_stmt)) {
      $this->gc_stmt = $this->dbh->prepare("DELETE FROM sesion WHERE set_time < ?");
   }
   $old = time() - $max;
   $this->gc_stmt->bind_param('s', $old);
   $this->gc_stmt->execute();
   return true;
}

private function getkey($id) {
   if(!isset($this->key_stmt)) {
      $this->key_stmt = $this->dbh->prepare("SELECT session_key FROM sesion WHERE id = ? LIMIT 1");
   }
   $this->key_stmt->bind_param('s', $id);
   $this->key_stmt->execute();
   $this->key_stmt->store_result();
   if($this->key_stmt->num_rows == 1) { 
      $this->key_stmt->bind_result($key);
      $this->key_stmt->fetch();
      return $key;
   } else {
      $random_key = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
      return $random_key;
   }
}

private function encrypt($data, $key) {
   $salt = 'cH!swe!retReGu7W6bEDRup7usuDUh9THeD2CHeGE*ewr4n39=E@rAsp7c-Ph@pH';
   $key = substr(hash('sha256', $salt.$key.$salt), 0, 32);
   $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
   $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
   $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $data, MCRYPT_MODE_ECB, $iv));
   return $encrypted;
}
private function decrypt($data, $key) {
   $salt = 'cH!swe!retReGu7W6bEDRup7usuDUh9THeD2CHeGE*ewr4n39=E@rAsp7c-Ph@pH';
   $key = substr(hash('sha256', $salt.$key.$salt), 0, 32);
   $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
   $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
   $decrypted = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode($data), MCRYPT_MODE_ECB, $iv);
   return $decrypted;
}
    
    
}

//estructura para bd

/*

CREATE TABLE IF NOT EXISTS `sesion` (
  `id` char(128) NOT NULL,
  `set_time` char(10) NOT NULL,
  `data` text NOT NULL,
  `session_key` char(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

*/
