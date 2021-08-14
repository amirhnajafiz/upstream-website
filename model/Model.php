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

    public function __construct() {

    }
    
}

?>