<?php

use app\http\core\ControllerCore;

class HomeController extends ControllerCore
{
    public function index()
    {
        /*
        #   To render an view you can use:
        #
        #   $this->render( view_name, parameters, extension(default = php) )
        #
        */
        $this->render("HomeView", ['create_by' => 'https://github.com/yzPeedro'], '.php');
    }
}