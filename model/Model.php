<?php

namespace mvc\model;

use mvc\database\Database;

/**
 * Model class is the superclass of all our models,
 * which has a connector and table_name. 
 * 
 */
abstract class Model 
{
    // Private fields
    protected PDO $connector;

    /**
     * The constructor gets a new connection from database.
     * 
     */
    public function __construct() 
    {
        $this->connector = Database::getInstance()->getPDO();
    }

    /**
     * Select query, will get a data from our database based on the
     * where conditions.
     * 
     * @param table_name each model has its own table
     * @param where our conditions for select query
     * @return Object the model of the select result
     */
    public function select($table_name, array $where = [])
    {
        $condition = [];

        foreach ($where as $key => $val) {
            $condition[] = $key . "=" . "'" . $val . "'";
        }

        $condition = implode(" AND ", $condition);

        $sth = $this->pdo->prepare("SELECT * FROM $table_name WHERE $condition");
        $sth->execute();

        return $sth->fetchObject(get_called_class());
    }

    /**
     * Insert query, will set a data to our database based on the
     * data.
     * 
     * @param table_name each model has its own table
     * @param data our data for insert query
     * @return ID last model insert id to check the results
     */
    public function insert($table_name, array $data = [])
    {
        $format_data = [];

        foreach($data as $single) {
            $format_data[] = "'" . $single . "'";
        }

        $format_data = "(" . implode(",", $format_data) . ")";

        $sth = $this->pdo->prepare("INSERT INTO $table_name VALUES $format_data");
        
        try {
            $sth->execute();
            return $this->pdo->lastInsertId();
        } catch (\PDOExecption $e) {
            echo $e->getMessage();
            return -1;
        }
    }

    /**
     * Update query, will modify a data in our database based on the
     * where conditions.
     * 
     * @param table_name each model has its own table
     * @param data our data for update query
     * @param where our conditions for update query
     * @return int to check if the operation was successfull or not
     */
    public function update($table_name, array $data = [], array $where = [])
    {
        $condition = [];

        foreach ($where as $key => $val) {
            $condition[] = $key . "=" . "'" . $val . "'";
        }

        $condition = implode(" AND ", $condition);

        $format_data = [];

        foreach ($data as $key => $val) {
            $format_data[] = $key . "=" . "'" . $val . "'";
        }

        $format_data = implode(", ", $condition);

        $sth = $this->pdo->prepare("UPDATE $table_name SET $format_data WHERE $condition");
        try {
            $sth->execute();
            return 1;
        } catch (\PDOExecption $e) {
            echo $e->getMessage();
            return -1;
        }
    }

    /**
     * Delete query, will remove a data from our database based on the
     * where conditions.
     * 
     * @param table_name each model has its own table
     * @param where our conditions for delete query
     * @return int to check if the operation was successfull or not
     */
    public function delete($table_name, array $where = [])
    {
        $condition = [];

        foreach ($where as $key => $val) {
            $condition[] = $key . "=" . "'" . $val . "'";
        }

        $condition = implode(" AND ", $condition);
        $sth = $this->pdo->prepare("DELETE FROM $table_name WHERE $condition");
        try {
            $sth->execute();
            return 1;
        } catch (\PDOExecption $e) {
            echo $e->getMessage();
            return -1;
        }
    }
}

?>