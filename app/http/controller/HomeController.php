<?php
use app\http\core\ControllerCore as DB;

class HomeController extends DB
{
    public function index()
    {
        $this->render("HomeView", ['create_by' => "https://pedropessoa.000webhostapp.com/"]);
    }
}