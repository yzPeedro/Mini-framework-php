<?php /** @noinspection ALL */

namespace app\http\core;
use app\http\core\ModelCore;
use app\http\core\RequestCore as Request;
use app\http\core\ResponseCore as Response;


class ControllerCore extends ModelCore
{
    /**
     *
     * @param $view
     * @param array $params
     * @param string $ext
     */
    public function simpleRender($view, $params = [], $ext = '.php')
    {
        $view_param = $params;
        include_once("../app/view/$view"."$ext");
        die;
    }

    /**
     *
     * Render View using PHP-TWIG
     *
     * @param $paths
     * @param array $params
     * @param string $file_name
     * @param array $loader_options
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function render($paths, string $file_name, array $params = [], array $loader_options = []): void
    {
        $loader = new \Twig\Loader\FilesystemLoader($paths);
        $twig = new \Twig\Environment($loader, $loader_options);

        echo $twig->render($file_name, $params);
    }
}