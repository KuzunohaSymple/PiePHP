<?php
namespace Core;
class Core {
    public function run() {
        include 'routes.php';
        echo __CLASS__ . " [OK]" . PHP_EOL;

        $url = str_replace(BASE_URI, '', $_SERVER['REQUEST_URI']);
        // var_dump($url);
        $controller = \Router::get($url);
//        var_dump($url);
        if (method_exists(ucfirst($controller['controller']) . 'Controller', $controller['action'] . 'Action')) {
            $controllerName = ucfirst($controller['controller']) . 'Controller';
                // var_dump($controllerName);
            $new_controller = new $controllerName;
            $new_controller->{$controller['action'] . 'Action'}();
        }
        else {
            echo "error 404 method not found";
        }
    }
}

include "ORM.php";

