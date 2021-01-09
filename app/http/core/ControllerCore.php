<?php

namespace app\http\core;
use app\http\core\ModelCore;

class ControllerCore extends ModelCore
{
    public function render($view, $params = [], $ext = '.php')
    {
        $view_param = $params;
        include_once("../app/view/$view"."$ext");
        die;
    }
}