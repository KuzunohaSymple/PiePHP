<?php
namespace Core;
class Core {

    public function __construct() {
        if ($_GET['c'] == "user") {
            echo 'lol';
            $instancier = new \UserController();
            
            if ($_GET['a'] == "add") {
                $instancier->addAction();
            }
        }

    }

    public function run() {
        echo __CLASS__ . " [OK]" . PHP_EOL;

        echo "<br />" . $_SERVER['REQUEST_URI'];

        echo "<pre>";
        var_dump($_SERVER['QUERY_STRING']);
        echo "</pre>";


    }



}