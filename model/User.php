<?php

namespace mvc\model;

use mvc\model\Model;

/**
 * User model is the user schema in our database.
 * 
 */
class User extends Model 
{
    // Singleton instance
    private static User $user;

    private function __construct(PDO $pdo, string $table_name)
    {
        $this->connector = $pdo;
        $this->table_name = $table_name;
    }

    /**
     * This method initialize the User model.
     * 
     * @param pdo is the database connector
     * @param table_name is the name of this model table in our database
     */
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