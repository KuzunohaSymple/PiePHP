<?php
namespace Core;
class Core {
    public function run() {
        include 'routes.php';
        echo __CLASS__ . " [OK]" . PHP_EOL;

        $url = str_replace(BASE_URI, '', $_SERVER['REQUEST_URI']);
        // var_dump($url);
        $controller = \Router::get($url);
        //controller == quelquechose
        $controllerName = ucfirst($controller['controller']) . 'Controller';
        // var_dump($controllerName);
        $new_controller = new $controllerName;
        $new_controller->{$controller['action'] . 'Action'}();
        //sinon
            //error 404
    }
}

include "Request.php";
include "ORM.php";
//$foo = new \Request();

//class Request {
//
//    public $nom;
//
//    public function __construct($nom = null) {
//        $this->nom = stripslashes(trim(htmlspecialchars($nom)));
//    }
//}

