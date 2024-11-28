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
        $user = (new User())->where('email', '=', $email)->get();

        if (empty($user)) {
            return false;
        }
        $user = $user[ 0 ];

        if ($user[ 'password' ] != $password) {
            return false;
        }

        $_SESSION[ 'is_logged_in' ] = true;
        $_SESSION[ 'auth_id' ] = $user[ 'id' ];
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

        return isset($_SESSION[ 'is_logged_in' ]) && $_SESSION[ 'is_logged_in' ] === true;
    }

}