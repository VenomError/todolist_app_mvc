<?php
namespace Core;

class Route
{
    protected static $routes = [];

    public static function get($uri, $action)
    {
        self::$routes[ 'GET' ][$uri] = $action;
    }

    public static function post($uri, $action)
    {
        self::$routes[ 'POST' ][$uri] = $action;
    }

    public static function dispatch()
    {
        $uri = parse_url($_SERVER[ 'REQUEST_URI' ], PHP_URL_PATH);
        $method = $_SERVER[ 'REQUEST_METHOD' ];

        if (isset(self::$routes[$method][$uri])) {
            $action = self::$routes[$method][$uri];

            if (is_callable($action)) {
                call_user_func($action);
            } elseif (is_string($action)) {
                // Jika ada controller@method diberikan
                [$controller, $method] = explode('@', $action);
                $controller = "App\\Controllers\\$controller";

                if (class_exists($controller) && method_exists($controller, $method)) {
                    call_user_func([new $controller, $method]);
                } else {
                    http_response_code(404);
                    echo "Controller or method not found.";
                }
            }
        } else {
            http_response_code(404);
            echo "404 Not Found";
        }
    }
}