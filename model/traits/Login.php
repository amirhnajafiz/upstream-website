<?php

namespace mvc\model\traits;

trait Login
{
    public function login($username, $password)
    {
        return $this->select($this->table_name, ["username" => $username, "password" => $password]) ?? false;
    }
}

?>