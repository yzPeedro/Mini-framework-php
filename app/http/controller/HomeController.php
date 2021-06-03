<?php


use app\http\core\ControllerCore as DB;
use app\http\core\RequestCore as Request;
use app\http\core\ResponseCore as Response;

class HomeController extends DB
{
    public function index()
    {
        $this->render("../app/view", "HomeView.php", ["created_by" => "https://github.com/yzPeedro"]);
    }
}