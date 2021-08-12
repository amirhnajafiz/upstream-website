<?php

namespace mvc\model\models;

/**
 * Setting class lets us to store
 * data from database init.
 * 
 */
class SettingModel
{
    // Private fields
    private int $maxFileSize;

    /**
     * 
     * @return maxFileSize get the max file size
     */
    public function get()
    {
        return $this->maxFileSize;
    }
}

?>