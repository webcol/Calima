<?php
namespace ORM\DataSource;

/**
 * The transactional interface can be implemented by datasources that support
 * transactions. This makes it possible to rollback changes saved to the 
 * datasource when an error of some kind occurs.
 */
interface Transactional
{
    /**
     * Starts a new transaction.
     */
    public function beginTransaction();
    
    /**
     * Commits the current transaction.
     */
    public function commit();
    
    /**
     * Rollback the current transaction.
     */
    public function rollBack();
}