<?php
namespace App\Middleware;

use Core\Service\Auth as AuthCheck;

class Auth
{
    public function handle($params, $next)
    {
        if (!AuthCheck::isLoggedIn()) {
            http_response_code(403);
            echo "Access denied. You are not authenticated.";
            return;
        }

        $next($params);
    }
}
