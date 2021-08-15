<?php

namespace mvc\model;

use mvc\model\Model;
use mvc\model\traits\Login;
use mvc\model\traits\Register;

/**
 * User model is the user schema in our database.
 * 
 */
class User extends Model 
{
    use Login;
    use Register;

    public string $name;
    public string $password;
    public int $status;
    public int $isadmin;
    public int $canconfirm;

    protected $table_name = "user";
}

?>