<?php
namespace ORM;

require_once 'ORM/DataSource/DataSource.php';
require_once 'ORM/DataSource/Modifiable.php';
require_once 'ORM/DataSource/Transactional.php';

use ORM\DataSource\DataSource;
use ORM\DataSource\Modifiable;
use ORM\DataSource\Transactional;

/**
 * ORM object base class. 
 */
abstract class Object
{
    /**
     * The global datasource to use for this class and it's subclasses. Can be
     * overriden at the subclass level.
     * 
     * @var DataSource
     */
    protected static $_classDataSource = null;
    
    /**
     * The object's name. By default this will be the class name in lower-case
     * format, but by overriding this class property another name can be set.
     * 
     * @var string
     */
    protected static $_name = null;
    
    /**
     * Our object instance's data.
     * 
     * @var array
     */
    private $_data;
    
    /**
     * Is this a new object? (E.g. not retrieved using find.)
     * 
     * @var boolean
     */
    private $_isNew;
    
    /**
     * The datasource for this row.
     * 
     * @var DataSource
     */
    private $_dataSource;
    
    /**
     * Constructs a new object instance.
     * 
     * @param array $data initial data
     */
    public function __construct($data = array())
    {
        $this->_data = $data;
        $this->_isNew = true;
        $this->_dataSource = static::getDataSource();
    }
    
    /**
     * Change whatever this object should be considered new or not.
     * 
     * @param boolean $isNew is new?
     */
    protected function _setNew($isNew)
    {
        $this->_isNew = $isNew;
    }
    
    /**
     * Is this a new object? (E.g. not retrieving using find.)
     * 
     * @return boolean is new?
     */
    public function isNew()
    {
        return $this->_isNew;
    }
    
    /**
     * Returns the datasource for this row.
     * 
     * @return DataSource datasource
     */
    protected function _getDataSource()
    {
        return $this->_dataSource;
    }
    
    /**
     * Helper method which checks if this object can be modified or not and if
     * not throws an exception.
     */
    private function _validateModifiable()
    {
        if (!($this->getDataSource() instanceof Modifiable)) {
            throw new \Exception("Object is read-only.");
        }
    }
    
    /**
     * Returns the value of the given property.
     * 
     * @param string $property property name
     * 
     * @return mixed property value
     */
    public function __get($property)
    {
        return $this->_data[$property];
    }
    
    /**
     * Checks whatever the given property is set.
     * 
     * @param string $property property name
     * 
     * @return boolean is property set?
     */
    public function __isset($property)
    {
        return isset($this->_data[$property]);
    }
    
    /**
     * Changes the value of the given property to the given value.
     * 
     * @param string $property property name
     * @param mixed  $value    property value
     */
    public function __set($property, $value)
    {
        $this->_validateModifiable();
        $this->_data[$property] = $value;
    }
    
    /**
     * Unsets the given property.
     * 
     * @param string $property property name
     */
    public function __unset($property)
    {
        $this->_validateModifiable();
        $this->_data[$property] = null;
    }
    
    /**
     * Saves this object instance.
     */
    public function save()
    {
        $this->_validateModifiable();
        
        if ($this->isNew()) {
            $this->_getDataSource()->add(static::_getName(), $this->_data);
        } else {
            $this->_getDataSource()->update(static::_getName(), $this->_data);
        }
    }

    /**
     * Returns the object name for this class. Is either the value of the static
     * $_name property or the lower-case class name.
     * 
     * @return string object name for this class
     */
    protected static function _getName()
    {
        return isset(static::$_name) ? static::$_name : strtolower(get_called_class());
    }
    
    /**
     * Returns the datasource for this class. If not set explicitly for this
     * class the parent's class datasource will be returned etc.
     * 
     * @return DataSource datasource instance
     */
    public static function getDataSource()
    {
        return static::$_classDataSource;
    }
    
    /**
     * Sets the datasource for this class (and subclasses which don't have
     * another datasource set).
     * 
     * @param DataSource $dataSource datasource instance
     */
    public static function setDataSource(DataSource $dataSource)
    {
        static::$_classDataSource = $dataSource;
    } 
    
    /**
     * Finds the first row using the given (optional) criteria and the given
     * optional order.
     * 
     * @param array  $criteria key/value criteria, may contain wildcards "*"
     * @param string $order    order by the given property
     * 
     * @return Object instance of this class
     */
    public static function findFirst($criteria = array(), $order = null)
    {
        $objects = static::find($criteria, $order, 1, 0);
        return count($objects) == 1 ? $objects[0] : null;
    }    
    
    /**
     * Finds the rows using the given criteria, optional order and limit the
     * results using the given limit starting at the given offset.
     * 
     * @param array  $criteria key/value criteria, may contain wildcards "*"
     * @param string $order    order by the given property
     * @param int    $limit    limit to the given number of rows
     * @param int    $offset   starting at the given offset
     * 
     * @return array array of Object instances of this class
     */
    public static function find($criteria = array(), $order = null, $limit = null, $offset = 0)
    {
        $result = static::getDataSource()->find(static::_getName(), $criteria, $order, $limit, $offset);

        $objects = array();
        foreach ($result as $data) {
            $object = new static($data);
            $object->_setNew(false);
            $objects[] = $object;
        }
        
        return $objects;
    }

    /**
     * Returns the number of rows that match given key/value criteria.
     * 
     * @param array  $criteria key/value criteria, may contain wildcards "*"
     * 
     * @return int row count
     */
    public static function count($criteria = array())
    {
        return static::getDataSource()->count(static::_getName(), $criteria);
    }
    
    /**
     * Wraps the given callback inside a transaction for this class datasource.
     * 
     * @param mixed $callback callback
     */
    public static function transaction($callback)
    {
        if (!(static::getDataSource() instanceof Transactional)) {
            call_user_func($callback);
            return;
        }
        
        try {
            static::getDataSource()->beginTransaction();
            call_user_func($callback);
            static::getDataSource()->commit();
        } 
        catch (\Exception $ex) {
            static::getDataSource()->rollBack();
            throw $ex;
        }
    }
    
    /**
     * Catch static method calls for which no methods exist so we can support
     * dynamic find and count methods like findFirstByFirstNameAndLastName,
     * findByLastname, countByCity etc.
     * 
     * @param string $method method name
     * @param array  $params method parameters
     * 
     * @return mixed method result
     */
    public static function __callStatic($method, $params)
    {
        if (!preg_match('/^(find|findFirst|count)By(\w+)$/', $method, $matches)) {
            throw new \Exception("Call to undefined method {$method}");
        }
        
        $criteriaKeys = explode('_And_', preg_replace('/([a-z0-9])([A-Z])/', '$1_$2', $matches[2]));
        $criteriaKeys = array_map('strtolower', $criteriaKeys);
        $criteriaValues = array_slice($params, 0, count($criteriaKeys));
        $criteria = array_combine($criteriaKeys, $criteriaValues);
        
        $method = $matches[1];
        return static::$method($criteria);
    }
}