<?php

namespace mvc\model;

use mvc\model\Model;

class User extends Model 
{
    private static User $user;
    private string $name;
    private string $password;
    private int $isAdmin;
    private int $canConfirm; 

    private function __construct(PDO $pdo, string $table_name)
    {
        $this->connector = $pdo;
        $this->table_name = $table_name;
    }

    public function Do(PDO $pdo, string $table_name) {
        if (!isset(self::$user)) {
            self::$user = new User($pdo, $table_name);
        }
        return self::$user;
    }

    public function insert() {
        // Insert query
    }

    public function update() {
        // Update query
    }

    public function delete() {
        // Delete query
    }

    public function select() {
        // Select query
    }

}

?>