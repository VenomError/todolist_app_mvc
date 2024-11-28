<?php

namespace App\Controllers;
use Core\Controller;
use Core\Service\Auth;

class AuthController extends Controller
{
    public $layout = 'auth';

    public function login()
    {
        if (Auth::isLoggedIn()) {
            $role = Auth::user()->role;

            if ($role == 'admin') {
                return redirect('admin');
            } else if ($role == 'user') {
                return redirect('dashboard');
            }
        }
        $this->title = 'Login';
        return $this->view("auth/login");
    }

    public function authLogin()
    {
        $email = $_POST[ 'email' ];
        $password = $_POST[ 'password' ];

        if (Auth::login($email, $password)) {
            addSuccess('login', 'Login Success');

            $role = Auth::user()->role;

            if ($role == 'admin') {
                return redirect('admin');
            } else if ($role == 'user') {
                return redirect('dashboard');
            }

        }

        addError('login', 'Failed to Login , Invalid Email or Password');

        return back();
    }

    public function logout()
    {
        auth()->logout();
        return redirect('login');
    }

}