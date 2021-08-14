<?php

namespace mvc\model;

use mvc\model\Model;

/**
 * Guest model is the file schema in our database.
 * 
 */
class Guest extends Model 
{
    public int $id;
    public date $joinDate;
    public int $currentUse;

    protected $table_name = "guest";
}

?>