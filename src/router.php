<?php

class Router {

    public static $routes = array();

    public static function add(string $route, callable $callback) {
        self::$routes[$route] = $callback;
    }

    public static function handleRequest(string $path): Option {
        if (array_key_exists($path, self::$routes)) {
            self::$routes[$path]();
            return Option::none();
        } else {
            return Option::some("404 not found");
        }
    }

    public static function notFound() {
        echo "404 Not Found";
    }

}

?>