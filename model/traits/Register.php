<?php

namespace mvc\model\traits;

trait Register
{
    public function register($username, $password)
    {
        return $this->insert($this->table_name, [
            "name" => $username, 
            "password" => $password,
            "status" => 1]) ?? false;
    }
}

?>