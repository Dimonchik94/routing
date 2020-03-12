<?php

class Router {

    public static function run() {
        $uri = $_SERVER['REQUEST_URI'];

        if ($uri === '' || $uri === '/') {
            require 'Controllers/HomeController.php';
            $controller = new HomeController();
            $controller->index();
        } else {

            $url = explode('/', $uri);

            $controllerName = ucfirst($url[1]);

            if (!empty($url[2])) {

                if ( !strchr( $url[2], '?') ){

                    $controllerAction = lcfirst($url[2]);

                } else if ( strchr( $url[2], '?') ){

                    $args = explode('?', $url[2]);
                    $controllerAction = lcfirst($args[0]);
                    parse_str($args[1], $actionParams);

                }

            }

            $filename = 'Controllers/' . $controllerName . 'Controller.php';

            if (file_exists($filename)) {

                require $filename;

                $controllerName = $controllerName . 'Controller';

                $controller = new $controllerName();

                if (!empty($controllerAction)) {
                    if ( isset($actionParams) ) {
                        $controller->$controllerAction($actionParams);
                    } else {
                        $controller->$controllerAction();
                    }
                } else {
                    $controller->index();
                }
            } else if (!file_exists($filename)) {
                require_once 'Views/404.php';
            }
        }
    }

}
