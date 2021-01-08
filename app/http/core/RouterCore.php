<?php

namespace app\http\core;

class RouterCore
{
    private $routes = [];
    private $method;
    private $uri;

    public function __construct()
    {
        $this->prepare();
        require_once("../app/http/web.php");
        $this->exec();
    }

    private function prepare()
    {
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];        
    }

    private function get( $route, $execute )
    {
        if ( $this->method == 'GET' ) {
            $this->routes[] = [
                "route" => $route,
                "execute" => $execute
            ];
        } else {
            http_response_code(503);
            die;
        }     
    }

    private function exec()
    {
        // dd($this->routes);
        foreach ( $this->routes as $r ) {
            if ( $r['route'] == $this->uri ) {
                if ( is_callable($r['execute']) ) {
                    $r['execute']();
                    break;
                }
            }elseif( $r == end($this->routes) ) {
                http_response_code(404);
                die;
            }
        }
    }
}