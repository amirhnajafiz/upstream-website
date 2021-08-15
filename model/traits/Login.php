<?php

namespace mvc\model\traits;

trait Login
{
    public function login($username, $password)
    {
        return $this->select($this->table_name, ["name" => $username, "password" => $password]) ?? false;
    }
}

?>