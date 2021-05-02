<?php


namespace app\http\core;
use Exception;

class ResponseCore
{
    public static function json($var): string
    {
        try {
            return print_r(json_encode($var));
        } catch(Exception $e) {
            return print_r(json_encode($e->getMessage()));
        }
    }
}