<?php

namespace mvc\model;

use mvc\model\Model;

/**
 * File model is the file schema in our database.
 * 
 */
class File extends Model 
{
    // Singleton instance
    private static File $file;

    private function __construct(PDO $pdo, string $table_name)
    {
        $this->connector = $pdo;
        $this->table_name = $table_name;
    }

    /**
     * This method initialize the File model.
     * 
     * @param pdo is the database connector
     * @param table_name is the name of this model table in our database
     */
    public function Do(PDO $pdo, string $table_name) {
        if (!isset(self::$file)) {
            self::$file = new File($pdo, $table_name);
        }
        return self::$file;
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