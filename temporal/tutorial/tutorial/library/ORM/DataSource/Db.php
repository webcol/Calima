<?php
namespace ORM\DataSource;

require_once 'ORM/DataSource/DataSource.php';
require_once 'ORM/DataSource/Modifiable.php';
require_once 'ORM/DataSource/Transactional.php';
require_once 'Zend/Db.php';

/**
 * DataSource that uses Zend_Db as gateway and supports both read and write
 * operations optionally wrapped inside a transaction.
 */
class Db implements DataSource, Modifiable, Transactional
{
    /**
     * Database instance.
     * 
     * @var \Zend_Db_Adapter_Abstract
     */
    private $_db;
    
    /**
     * Constructs a new Db instance which uses the given Zend_Db adapter.
     * 
     * @param \Zend_Db_Adapter_Abstract $db database instance
     */
    public function __construct(\Zend_Db_Adapter_Abstract $db)
    {
        $this->_db = $db;
    }
    
    /**
     * Returns the database instance.
     * 
     * @return \Zend_Db_Adapter_Abstract database instance
     */
    private function _getDb()
    {
        return $this->_db;
    }

    /**
     * Creates a where clause array with bind parameters for the given 
     * criteria.
     * 
     * @param array $criteria key/value criteria
     * 
     * @return array where clauses / bind parameters 
     */
    private function _getWhere($criteria)
    {
        $result = array();
        
        foreach ($criteria as $column => $value) {
            if (strpos($value, '*') !== false) {
                $result["{$column} LIKE ?"] = str_replace('*', '%', $value);
            } else {
                $result["{$column} = ?"] = $value;
            }
        }
        
        return $result;
    }

    /**
     * Returns the primary key column name for the given table.
     * 
     * NOTE: this method could use some caching.
     * 
     * @param string $object table name
     * 
     * @return string primary key column name
     */
    private function _getPrimaryKeyColumn($object)
    {
        $columns = $this->_getDb()->describeTable($object);
        
        foreach ($columns as $column) {
            if ($column['PRIMARY']) {
                return $column['COLUMN_NAME'];
            }
        }
        
        return null;
    }
    
    /**
     * Find rows of the given object (most likely a table) using the given 
     * criteria, optional order and limit the results using the given limit 
     * starting at the given offset.
     * 
     * @param string $object   object/table name
     * @param array  $criteria criteria (key/value array, values can use wildcards "*")
     * @param string $order    order by the given property
     * @param int    $limit    limit to the given number of rows
     * @param int    $offset   starting at the given offset
     * 
     * @return array list of rows (row data is represented as an array)
     */    
    public function find($object, array $criteria = array(), $order = null, $limit = null, $offset = 0)
    {
        $select = $this->_getDb()->select()->from($object);
        
        foreach ($this->_getWhere($criteria) as $where => $value) {
            $select->where($where, $value);
        }
        
        if ($order != null) {
            $select->order($order);
        }
        
        if ($limit !== null) {
            $select->limit($limit, $offset);
        }
        
        $stmt = $this->_getDb()->query($select);
        $stmt->execute();
        $result = $stmt->fetchAll();
        
        return $result;
    }
    
    /**
     * Count how many rows exists for the given object using the given criteria.
     * 
     * @param string $object   object/table name
     * @param array  $criteria criteria (key/value array, values can use wildcards "*")
     *
     * @return int row count
     */    
    public function count($object, array $criteria = array())
    {
        $select = $this->_getDb()->select()->from($object, array('value' => 'COUNT(*)'));
        
        foreach ($this->_getWhere($criteria) as $where => $value) {
            $select->where($where, $value);
        }
        
        $stmt = $this->_getDb()->query($select);
        $stmt->execute();
        $result = $stmt->fetch();
        
        return (int)$result['value'];
    }
    
    /**
     * Adds a new row to the given object (table). The data can be updated to
     * return, for example, the value of an auto incremented key.
     * 
     * @param string $object object/table name
     * @param array  $data   row data
     */    
    public function add($object, array &$data)
    {
        $primaryKeyColumn = $this->_getPrimaryKeyColumn($object);
        
        $this->_getDb()->insert($object, $data);
        
        $data[$primaryKeyColumn] = $this->_getDb()->lastInsertId();
    }
    
    /**
     * Update a row of the given object (table). The data array contains the
     * new values and is also used to find the existing row that needs to
     * be updated. The data array can be updated to return values set inside
     * the database by, for example, triggers.
     * 
     * @param string $object object/table name
     * @param array  $data   row data
     */
    public function update($object, array &$data)
    {
        $primaryKeyColumn = $this->_getPrimaryKeyColumn($object);
        
        $updateData = $data;
        unset($updateData[$primaryKeyColumn]);
        
        $criteria = array($primaryKeyColumn => $data[$primaryKeyColumn]);
        $where = $this->_getWhere($criteria);
        
        $this->_getDb()->update($object, $updateData, $where);
        
        $data = array_merge($data, $updateData);
    }
    
    /**
     * Removes a row of the given object (table). The data array is used to
     * find the existing row that needs to be removed.
     * 
     * @param string $object object/table name
     * @param array  $data   row data
     */    
    public function remove($object, array $data)
    {
        $primaryKeyColumn = $this->_getPrimaryKeyColumn($object);

        $criteria = array($primaryKeyColumn => $data[$primaryKeyColumn]);
        $where = $this->_getWhere($criteria);
        
        $this->_getDb()->delete($object, $where);
    }
    
    /**
     * Starts a new transaction.
     */    
    public function beginTransaction()
    {
        $this->_getDb()->beginTransaction();
    }
    
    /**
     * Commits the current transaction.
     */
    public function commit()
    {
        $this->_getDb()->commit();
    }
    
    /**
     * Rollback the current transaction.
     */    
    public function rollBack()
    {
        $this->_getDb()->rollBack();
    }
}