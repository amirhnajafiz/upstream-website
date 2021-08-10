<?php

namespace mvc\model;

use mvc\model\Model;

/**
 * Guest model is the file schema in our database.
 * 
 */
class Guest extends Model 
{
    // Singleton instance
    private static Guest $guest;

    private function __construct(PDO $pdo, string $table_name)
    {
        $this->connector = $pdo;
        $this->table_name = $table_name;
    }

    /**
     * This method initialize the Guest model.
     * 
     * @param pdo is the database connector
     * @param table_name is the name of this model table in our database
     */
    public function Do(PDO $pdo, string $table_name) {
        if (!isset(self::$guest)) {
            self::$guest = new Guest($pdo, $table_name);
        }
        return self::$guest;
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