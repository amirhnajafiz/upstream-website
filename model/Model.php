<?php

namespace mvc\model;

/**
 * Model class is the superclass of all our models,
 * which has a connector and table_name. 
 * 
 */
abstract class Model 
{
    // Private fields
    protected PDO $connector;
    protected string $table_name;

    public abstract function Do();

    public abstract function insert();

    public abstract function update();

    public abstract function delete();

    public abstract function select();
}

?>