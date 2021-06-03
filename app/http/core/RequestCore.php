<?php


namespace app\http\core;


class RequestCore
{

    /**
     * Get GET params on actual REQUEST
     * 
     * @param $index
     * @return string|array
    */
    public function get($index = '')
    {
        return (isset($_REQUEST["GET"][$index])) ? $_REQUEST["GET"][$index] : $_REQUEST["GET"];
    }

    /**
     * Get POST params on actual REQUEST
     * 
     * @param $index
     * @return string|array
    */
    public function post($index = '')
    {
        return (isset($_POST[$index])) ? $_POST[$index] : $_POST;
    }
}