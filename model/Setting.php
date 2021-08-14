<?php

namespace mvc\model;

use mvc\model\Model;

/**
 * Setting model is the setting schema in our database.
 * 
 */
class Setting extends Model 
{
    public int $maxFileUpload;

    protected $table_name = "setting";
}

?>