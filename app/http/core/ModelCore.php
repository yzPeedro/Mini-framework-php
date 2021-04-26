<?php

namespace app\http\core;
use PDO;
use PDOException;

class ModelCore
{
    private $con;

    public function connect()
    {
        try {
            $this->con = new PDO( DB_DSN . ':dbname=' . DB_NAME . ';host=' . DB_HOST, DB_USER, DB_PASS );
        } catch( PDOException $e) {
            responseJson(["error" => true, "Message" => $e->getMessage()]);
        }
    }

    private function testConnection() : bool
    {
        if(!empty($this->con) && $this->con instanceof PDO) {
            return true;
        } else {
            return false;
        }
    }

    protected function insertInto(array $tables = [], array $to_values = [])
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
            responseJson(["error" => true, "Message" => "Please, connect your Database before insert"]);
        }
    }

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
}