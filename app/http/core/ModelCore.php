<?php

namespace app\http\core;
use PDO;

class ModelCore
{
    protected function connection()
    {
       try { 
            $pdo = new PDO( DB_DSN . ':dbname=' . DB_NAME . ';host=' . DB_HOST, DB_USER, DB_PASS );
            return $pdo;
       } catch ( PDOExecption $e ) {
            dd($e->getMessage());
       }
    }
}