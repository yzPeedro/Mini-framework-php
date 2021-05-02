<?php
use app\http\core\ControllerCore as DB;
use app\http\core\RequestCore as Request;

class HomeController extends DB
{
    public function index()
    {
        $request = new Request();
        $request->get();
       // $this->render("HomeView", ['create_by' => "https://pedropessoa.000webhostapp.com/"]);
    }
}