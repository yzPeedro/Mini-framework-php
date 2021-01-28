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
        }     
    }

    private function post( $route, $execute )
    {
        if ( $this->method == 'POST' ) {
            $this->routes[] = [
                "route" => $route,
                "execute" => $execute,
                "params" => $_POST
            ];
        }     
    }

    private function execPost()
    {
        foreach ( $this->routes as $r ) {
            if ( $r['route'] == $this->uri ) {
                if ( is_callable($r['execute']) ) {
                    $r['execute']( $r['params'] );
                    break;
                }
                $params = $r['params'];
                $r = explode('@', $r['execute']);

                $controller = $r[0];
                $method = $r[1];

                if ( file_exists("../app/http/controller/$controller.php") ) {
                        require_once("../app/http/controller/$controller.php");
                        if ( method_exists($controller, $method) ) {
                            $app = new $controller();
                            $app->$method( $params );
                            break;
                        } else {
                            dd("Classe ou método não encontrado");
                            break;
                        }
                    } else {
                        dd("Arquivo de controller não encontrado");
                        break;
                    }
                
            }elseif( $r == end($this->routes) ) {
                http_response_code(404);
                die;
            }
        }
    }

    private function execGet()
    {
        foreach ( $this->routes as $r ) {
            if ( $r['route'] == $this->uri ) {
                if ( is_callable($r['execute']) ) {
                    $r['execute']();
                    break;
                } else {
                    $r = explode("@", $r['execute']);
                    $controller = $r[0];
                    $method = $r[1];                    
                    if ( file_exists("../app/http/controller/$controller.php") ) {
                        require_once("../app/http/controller/$controller.php");
                        if ( method_exists($controller, $method) ) {
                            $app = new $controller();
                            $app->$method();
                            break;
                        } else {
                            dd("Classe ou método não encontrado");
                            break;
                        }
                    } else {
                        dd("Arquivo de controller não encontrado");
                        break;
                    }
                }
            }elseif( $r == end($this->routes) ) {
                http_response_code(404);
                die;
            }
        }
    }

    private function exec()
    {
        switch( $this->method ) {
            case 'GET':
                $this->execGet();
                break;

            case 'POST':
                $this->execPost();
                break;
        }
    }
}