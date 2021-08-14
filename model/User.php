<?php

namespace mvc\model;

use mvc\model\Model;
use mvc\model\traits\Login;

/**
 * User model is the user schema in our database.
 * 
 */
class User extends Model 
{
    use Login;

    public string $name;
    public string $password;
    public int $status;
    public int $isAdmin;
    public int $canConfirm;

    protected $table_name = "user";
}

?>