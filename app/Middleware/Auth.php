<?php
namespace App\Middleware;

use Core\Service\Auth as AuthCheck;

class Auth
{
    public function handle($params, $next)
    {
        // Simulate an authentication check (e.g., check session or token)
        if (!AuthCheck::isLoggedIn()) {
            http_response_code(403);
            echo "Access denied. You are not authenticated.";
            return;
        }

        // If authenticated, continue with the next middleware or route action
        $next($params);
    }
}
