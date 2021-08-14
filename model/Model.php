<?php

namespace mvc\model;

use mvc\database\Database;

/**
 * Model class is the superclass of all our models,
 * which has a connector and table_name. 
 * 
 */
abstract class Model 
{
    // Private fields
    protected PDO $connector;

    public function __construct() 
    {
        $this->connector = Database::getInstance()->getPDO();
    }

    public function select($table_name, array $where = [])
    {
        // TODO: Select query
    }

    public function insert($table_name, array $data = [])
    {
        // TODO: Insert query
    }

    public function update($table_name, array $data = [])
    {
        // TODO: Update query
    }

    public function delete($table_name, array $where = [])
    {
        // TODO: Delete query
    }
}

?>