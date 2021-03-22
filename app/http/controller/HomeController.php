<?php
use app\http\core\ControllerCore;

class HomeController extends ControllerCore
{
    public function index()
    {
        $this->render("HomeView", ['create_by' => "https://pedropessoa.000webhostapp.com/"]);
    }
}