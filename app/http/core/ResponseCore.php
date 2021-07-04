<?php


namespace app\http\core;
use Exception;

class ResponseCore
{
    /**
     * Return a json response
     *
     * @param $var
     */
    public function json($var)
    {
        try {
            return dd(json_encode($var));
        } catch(Exception $e) {
            return dd(json_encode($e->getMessage()));
        }
    }
}