<?php

namespace app\http\core;

class RouterCore
{
    /**
     * Create the route information array
     *
     * @var array
     */
    private array $routes = [];

    /**
     * Create the Method information string
     *
     * @var string
     */
    private string $method;

    /**
     * Create the URI information string
     *
     * @var string
     */
    private string $uri;

    /**
     * RouterCore constructor.
     */
    public function __construct()
    {
        $this->prepare();
        require_once("../app/http/web.php");
        $this->exec();
    }

    /**
     * Prepare route before run
     */
    private function prepare()
    {
        $this->uri = explode("?", $_SERVER['REQUEST_URI'])[0];
        $this->method = $_SERVER['REQUEST_METHOD'];        
    }

    /**
     * Set the GET route and what it must execute
     *
     * @param $route
     * @param $execute
     */
    private function get($route, $execute )
    {
        if ( $this->method == 'GET' ) {
            $this->routes[] = [
                "route" => $route,
                "execute" => $execute
            ];
        }
    }

    /**
     * Set the POST route and what it must execute
     *
     * @param $route
     * @param $execute
     */
    private function post($route, $execute )
    {
        if ( $this->method == 'POST' ) {
            $this->routes[] = [
                "route" => $route,
                "execute" => $execute,
                "params" => $_POST
            ];
        }
    }

    /**
     * Execute the POST route
     */
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
                            require_once("../app/view/viewHTTP/404.html");
                            http_response_code(404);
                            break;
                        }
                    } else {
                        require_once("../app/view/viewHTTP/404.html");
                        http_response_code(404);
                        break;
                    }
                
            }elseif( $r == end($this->routes) ) {
                require_once("../app/view/viewHTTP/404.html");
                http_response_code(404);
                die;
            }
        }
    }

    /**
     * Execute the GET route
     */
    private function execGet()
    {
        foreach ( $this->routes as $r ) {
            if ( $r['route'] == $this->uri ) {
                if ( is_callable($r['execute']) ) {
                    $r['execute']();
                } else {
                    $r = explode("@", $r['execute']);
                    $controller = $r[0];
                    $method = $r[1];                    
                    if ( file_exists("../app/http/controller/$controller.php") ) {
                        require_once("../app/http/controller/$controller.php");
                        if ( method_exists($controller, $method) ) {
                            $app = new $controller();
                            $app->$method();
                        } else {
                            require_once("../app/view/viewHTTP/404.html");
                            http_response_code(404);
                        }
                    } else {
                        require_once("../app/view/viewHTTP/404.html");
                            http_response_code(404);
                    }
                }
                break;
            }elseif( $r == end($this->routes) ) {
                require_once("../app/view/viewHTTP/404.html");
                http_response_code(404);
                die;
            }
        }
    }

    /**
     * Run Application
     */
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