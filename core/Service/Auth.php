<?php

namespace Core\Service;

use App\Models\User;

class Auth
{

    public static function login($email, $password)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $user = (new User())->where('email', '=', $email)->toArray();

        if (empty($user)) {
            return false;
        }
        $user = $user[ 0 ];

        if ($user[ 'password' ] != $password) {
            return false;
        }

        $_SESSION[ 'is_login' ] = true;
        $_SESSION[ 'auth_id' ] = $user[ 'id' ];
        $_SESSION[ 'auth_role' ] = $user[ 'role' ];
        return true;

    }

    public static function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Hapus semua data sesi
        session_unset();
        session_destroy();
    }

    public static function isLoggedIn(): bool
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        return isset($_SESSION[ 'is_login' ]) && $_SESSION[ 'is_login' ] === true;
    }

    public function user()
    {
        if ($this->isLoggedIn()) {
            $user = (new User())->find(session('auth_id'));
            return $user;
        }

        return null;
    }

    public function isAdmin(): bool
    {
        $user = $this->user();
        if ($user->role == 'admin') {
            return true;
        }
        return false;
    }

}