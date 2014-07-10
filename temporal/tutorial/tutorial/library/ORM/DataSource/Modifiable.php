<?php
namespace ORM\DataSource;

/**
 * The Modifiable interface can be implemented by datasources the support
 * write operations next to the default read operations specified in the
 * DataSource interface.
 */
interface Modifiable
{
    /**
     * Adds a new row to the given object (table). The data can be updated to
     * return, for example, the value of an auto incremented key.
     * 
     * @param string $object object/table name
     * @param array  $data   row data
     */
    public function add($object, array &$data);
    
    /**
     * Update a row of the given object (table). The data array contains the
     * new values and is also used to find the existing row that needs to
     * be updated. The data array can be updated to return values set inside
     * the database by, for example, triggers.
     * 
     * @param string $object object/table name
     * @param array  $data   row data
     */
    public function update($object, array &$data);
    
    /**
     * Removes a row of the given object (table). The data array is used to
     * find the existing row that needs to be removed.
     * 
     * @param string $object object/table name
     * @param array  $data   row data
     */
    public function remove($object, array $data);
}