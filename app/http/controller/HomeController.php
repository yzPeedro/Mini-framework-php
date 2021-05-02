<?php


use app\http\core\ControllerCore as DB;
use app\http\core\RequestCore as Request;
use app\http\core\ResponseCore as Response;

class HomeController extends DB
{
    public function index()
    {
        $this->render("HomeView", ['create_by' => "https://pedropessoa.000webhostapp.com/"]);
    }
}