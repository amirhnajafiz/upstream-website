<?php

namespace mvc\model;

use mvc\model\Model;

/**
 * Setting model is the setting schema in our database.
 * 
 */
class Setting extends Model 
{
    // Singleton instance
    private static Setting $setting;

    private function __construct(PDO $pdo, string $table_name)
    {
        $this->connector = $pdo;
        $this->table_name = $table_name;
    }

    /**
     * This method initialize the Setting model.
     * 
     * @param pdo is the database connector
     * @param table_name is the name of this model table in our database
     */
    public function Do(PDO $pdo, string $table_name) {
        if (!isset(self::$setting)) {
            self::$setting = new Setting($pdo, $table_name);
        }
        return self::$setting;
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