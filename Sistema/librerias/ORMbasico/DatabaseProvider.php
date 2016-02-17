<?php
abstract class DatabaseProvider
{
    protected $resource;
    public abstract function connect($host, $user, $pass, $dbname);
    public abstract function disconnect ();
    public abstract function getErrorNo();
    public abstract function getError();
    public abstract function query($q);
    public abstract function numRows($resource);
    public abstract function fetchArray($resource);
    public abstract function isConnected();
    public abstract function escape($var);
    public abstract function getInsertedID();
    public abstract function changeDB($database);
    public abstract function setCharset($charset);
}