<?php

namespace Core;

class Route
{
    protected static $routes = [];
    protected static $middlewares = [];

    // Store GET routes
    public static function get($uri, $action, $middlewares = [])
    {
        self::$routes[ 'GET' ][$uri] = ['action' => $action, 'middlewares' => $middlewares];
    }

    // Store POST routes
    public static function post($uri, $action, $middlewares = [])
    {
        self::$routes[ 'POST' ][$uri] = ['action' => $action, 'middlewares' => $middlewares];
    }

    // Dispatch the route based on the current URI and method
    public static function dispatch()
    {
        $uri = parse_url($_SERVER[ 'REQUEST_URI' ], PHP_URL_PATH);
        $method = $_SERVER[ 'REQUEST_METHOD' ];

        // Trim leading slash for comparison
        $uri = trim($uri, '/');

        // Check if we have any routes for this HTTP method
        if (isset(self::$routes[$method])) {
            // Loop through each route to match
            foreach (self::$routes[$method] as $route => $data) {
                // Check if the route matches
                if (self::matchRoute($uri, $route, $params)) {
                    // Apply middlewares
                    if (isset($data[ 'middlewares' ])) {
                        foreach ($data[ 'middlewares' ] as $middleware) {
                            // Check if the middleware class exists and is callable
                            $middlewareClass = "App\\Middleware\\$middleware";
                            if (class_exists($middlewareClass)) {
                                $middlewareInstance = new $middlewareClass();
                                // Run the middleware handle method with a closure for continuation
                                $middlewareInstance->handle($params, function ($params) use ($data) {
                                    self::executeAction($data[ 'action' ], $params);
                                });
                                return;
                            } else {
                                http_response_code(404);
                                echo "Middleware not found.";
                                return;
                            }
                        }
                    }

                    // If no middlewares or middlewares passed, just execute the action
                    self::executeAction($data[ 'action' ], $params);
                    return;
                }
            }
        }

        // If no matching route is found, return 404
        http_response_code(404);
        echo "404 Not Found";
    }

    // Execute the action (controller method) after middleware
    private static function executeAction($action, $params)
    {
        // If the action is callable, invoke it with parameters
        if (is_callable($action)) {
            call_user_func_array($action, $params);
        } elseif (is_string($action)) {
            // Explode the controller and method name
            [$controller, $method] = explode('@', $action);
            $controller = "App\\Controllers\\$controller";

            // Check if the controller and method exist
            if (class_exists($controller) && method_exists($controller, $method)) {
                // Call the controller method with the parameters
                call_user_func_array([new $controller, $method], $params);
            } else {
                // If the controller or method is not found
                http_response_code(404);
                echo "Controller or method not found.";
            }
        }
    }

    // Match the route with the URI and extract parameters
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
