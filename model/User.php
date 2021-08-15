<?php

namespace mvc\model;

use mvc\model\Model;
use mvc\model\traits\Login;
use mvc\model\traits\Register;
use mvc\model\traits\Total;

/**
 * User model is the user schema in our database.
 * 
 */
class User extends Model 
{
    use Login;
    use Register;
    use Total;

    public string $name;
    public string $password;
    public int $status;
    public int $isadmin;
    public int $canconfirm;

    protected $table_name = "user";

    public function lockByName($name, $status = 0)
    {
        return $this->update($this->table_name, ['status' => $status], ['name' => $name]);
    }

    public function changeConfirm($name, $status = 0)
    {
        return $this->update($this->table_name, ['canconfirm' => $status], ['name' => $name]);
    }
}

?>