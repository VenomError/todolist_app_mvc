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
            redirect('admin');
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
            return redirect('admin');
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