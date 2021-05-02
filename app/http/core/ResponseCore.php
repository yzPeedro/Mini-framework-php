<?php


namespace app\http\core;


class ResponseCore
{
    public static function json($var): string
    {
        return print_r(json_encode($var));
    }
}