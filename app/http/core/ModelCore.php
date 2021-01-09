<?php

namespace app\http\core;
use PDO;

class ModelCore
{
    protected function connection()
    {
       try { 
            global $pdo;
            $pdo = new PDO( DB_DSN . ':dbname=' . DB_NAME . ';host=' . DB_HOST, DB_USER, DB_PASS );
       } catch ( PDOExecption $e ) {
            dd($e->getMessage());
       }
    }
}