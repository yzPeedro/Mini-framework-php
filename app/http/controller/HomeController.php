<?php

use app\http\core\ControllerCore;

class HomeController extends ControllerCore
{
    public function index()
    {
        // $this->connection();
        $this->render("HomeView", ['nome' => 'Pedro'], '.html');
    }
}