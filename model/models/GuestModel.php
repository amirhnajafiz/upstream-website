<?php

namespace mvc\model\models;

/**
 * Guest model is for get the data
 * from database and store it init.
 * 
 */
class GuestModel
{
    // Private fields
    private int $ID;
    private string $name;
    private int $currentUse;

    /**
     * 
     * @return ID get guest ID
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * 
     * @return name get guest Name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * 
     * @return currentUse get guest current use
     */
    public function getCurrentUse()
    {
        return $this->currentUse;
    }
}

?>