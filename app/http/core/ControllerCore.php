<?php

namespace app\http\core;

class ControllerCore
{
    public function render($view, $params = [], $ext = '.php')
    {
        $view_param = $params;
        include_once("../app/view/$view"."$ext");
        die;
    }
}