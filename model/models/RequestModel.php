<?php

namespace mvc\model\models;

/**
 * Request model allows us to store
 * request into a class from database.
 * 
 */
class RequestModel
{
    // Private fields
    private int $ID;
    
    /**
     * 
     * @return ID the file ID
     */
    public function get()
    {
        return $this->ID;
    }
}

?>