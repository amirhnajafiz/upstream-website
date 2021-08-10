<?php

namespace mvc\model;

use mvc\model\Model;

/**
 * Request model is the request schema in our database.
 * 
 */
class Request extends Model 
{
    // Singleton instance
    private static Request $request;

    private function __construct(PDO $pdo, string $table_name)
    {
        $this->connector = $pdo;
        $this->table_name = $table_name;
    }

    /**
     * This method initialize the Request model.
     * 
     * @param pdo is the database connector
     * @param table_name is the name of this model table in our database
     */
    public function Do(PDO $pdo, string $table_name) {
        if (!isset(self::$request)) {
            self::$request = new Request($pdo, $table_name);
        }
        return self::$request;
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