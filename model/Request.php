<?php

namespace mvc\model;

use mvc\model\Model;

/**
 * Request model is the request schema in our database.
 * 
 */
class Request extends Model 
{
    public int $id;

    protected $table_name = "request";
}

?>