<?php
namespace ORM\DataSource;

/**
 * The DataSource base class. Classes who implement this interface can be used
 * as datasource for ORM objects. In it's basics a datasource only supports
 * retrieving data using the find and count methods, but by implementing the
 * Modifiable and Transactional interfaces data modification can also be 
 * supported.
 */
interface DataSource
{
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
    public function find($object, array $criteria = array(), $order = null, $limit = null, $offset = 0);
    
    /**
     * Count how many rows exists for the given object using the given criteria.
     * 
     * @param string $object   object/table name
     * @param array  $criteria criteria (key/value array, values can use wildcards "*")
     *
     * @return int row count
     */
    public function count($object, array $criteria = array());
}