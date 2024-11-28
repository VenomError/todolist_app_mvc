<?php

namespace Core;

class Route
{
    protected static $routes = [];

    // Store GET routes
    public static function get($uri, $action)
    {
        self::$routes[ 'GET' ][$uri] = $action;
    }

    // Store POST routes
    public static function post($uri, $action)
    {
        self::$routes[ 'POST' ][$uri] = $action;
    }

    public static function dispatch()
    {
        $uri = parse_url($_SERVER[ 'REQUEST_URI' ], PHP_URL_PATH);
        $method = $_SERVER[ 'REQUEST_METHOD' ];

        // Trim leading slash for comparison
        $uri = trim($uri, '/');

        if (isset(self::$routes[$method])) {
            foreach (self::$routes[$method] as $route => $action) {
                if (self::matchRoute($uri, $route, $params)) {
                    // If the action is a callable, invoke it with parameters
                    if (is_callable($action)) {
                        call_user_func_array($action, $params);
                    } elseif (is_string($action)) {
                        [$controller, $method] = explode('@', $action);
                        $controller = "App\\Controllers\\$controller";

                        if (class_exists($controller) && method_exists($controller, $method)) {
                            // Call the controller method with the parameters
                            call_user_func_array([new $controller, $method], $params);
                        } else {
                            http_response_code(404);
                            echo "Controller or method not found.";
                        }
                    }
                    return;
                }
            }
        }

        http_response_code(404);
        echo "404 Not Found";
    }
    private static function matchRoute($uri, $route, &$params)
    {
        // Convert route parameters (like {id}, {name}) to regex patterns
        $routePattern = preg_replace('/\{(\w+)\}/', '([^/]+)', $route);

        // Ensure that the pattern is anchored to match the entire string
        $routePattern = "~^$routePattern$~";

        // Match the route with the URI
        if (preg_match($routePattern, $uri, $matches)) {
            // Remove the full match (first element is the full URI, we only want the parameters)
            array_shift($matches);

            // Assign the matched parameters to the $params array
            $params = array_values($matches);
            return true;
        }

        return false;
    }



}