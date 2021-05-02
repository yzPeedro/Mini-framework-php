<?php

namespace app\http\core;
use app\http\core\ModelCore;
use app\http\core\RequestCore as Request;
use app\http\core\ResponseCore as Response;

class ControllerCore extends ModelCore
{
    public function render($view, $params = [], $ext = '.php')
    {
        $view_param = $params;
        include_once("../app/view/$view"."$ext");
        die;
    }
}