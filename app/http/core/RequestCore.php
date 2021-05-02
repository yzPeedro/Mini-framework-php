<?php


namespace app\http\core;


class RequestCore
{
    public function get($index = '')
    {
        return (isset($_GET[$index])) ? $_GET[$index] : $_GET;
    }

    public function post($index = '')
    {
        return (isset($_POST[$index])) ? $_POST[$index] : $_POST;
    }
}