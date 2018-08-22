<?php
// namespace Core;
Class Router {
    private static $routes;
    public static function connect ($url, $route) {
        self::$routes[$url] = $route;
    }
    public static function get ($url) {
        //require_once('routes.php');
        return self::$routes[$url];
        // echo "ZOUZOU" . $url;
    }
   
}