<?php
namespace App\Middleware;

use Core\Service\Auth as AuthCheck;

class Guest
{
    public function handle($params, $next)
    {
        if (AuthCheck::isLoggedIn()) {
            return redirect('login');
        }

        $next($params);
    }
}
