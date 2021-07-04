<?php

namespace app\http\core;
use app\http\core\ResponseCore as Response;
use PDO;
use PDOException;

class ModelCore
{
    /**
     * @var Object
     */
    private Object $con;

    /**
     * Create a new database connection
     */
    public function connect()
    {
        try {
            $this->con = new PDO( DB_DSN . ':dbname=' . DB_NAME . ';host=' . DB_HOST, DB_USER, DB_PASS );
        } catch( PDOException $e) {
            (new Response)->json(["error" => true, "Message" => $e->getMessage()]);
        }
    }

    /**
     * Test the database connection
     *
     * @return bool
     */
    private function testConnection() : bool
    {
        if(!empty($this->con) && $this->con instanceof PDO) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Insert new data in database using model
     *
     * @param array $tables
     * @param array $to_values
     * @return bool
     */
    protected function insertInto(array $tables = [], array $to_values = []): bool
    {
        if($this->testConnection()) {
            foreach($tables as $table){
                $query = [];
                $fields = [];
                $resulted_params = [];
                foreach( $to_values as $key => $value ) {
                    array_push($fields, $key. ", ");
                    array_push($query, $key);
                    array_push($resulted_params, $value);
                }

                $str_fields = substr(implode(array_filter($fields)), 0, -2);
                $str_bindReference = '';
                $count = count($query);

                for($i = 0; $i < $count; $i++) {
                    $str_bindReference = $str_bindReference . "?, ";
                }

                $str_bindReference = substr($str_bindReference, 0, -2);

                $str_sql = "INSERT INTO $table ($str_fields) VALUES ($str_bindReference)";

                $return = $this->con->prepare($str_sql);

                if(!$return->execute($resulted_params)){
                    return false;
                }
            }

            return true;
        } else {
            (new Response)->json(["error" => true, "Message" => "Please, connect your Database before insert"]);
            return false;
        }
    }

    /**
     * Delete data from database using model
     *
     * @param string $table
     * @param string $condition
     * @return bool
     */
    protected function deleteFrom(string $table, string $condition): bool
    {
        $sql = "DELETE FROM $table WHERE $condition";
        $return = $this->con->prepare($sql);
        if($return->execute()){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Update data from database using model
     *
     * @param string $table
     * @param string $set
     * @param string $condition
     * @return bool
     */
    protected function update(string $table, string $set, string $condition): bool
    {
        $sql = "UPDATE $table SET $set WHERE $condition";
        $return = $this->con->prepare($sql);

        if($return->execute()){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Select unique or multiple data from database using Model
     *
     * @param string $table
     * @param string $condition
     * @return array
     */
    protected function select(string $table, string $condition = "*"): array
    {
        $sql = "SELECT $condition FROM $table";
        $return = $this->con->query($sql);

        return $return->fetchAll();
    }
}