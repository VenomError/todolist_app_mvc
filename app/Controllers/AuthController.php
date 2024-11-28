<?php

namespace App\Controllers;
use App\Models\User;
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

    public function register()
    {
        if (Auth::isLoggedIn()) {
            $role = Auth::user()->role;

            if ($role == 'admin') {
                return redirect('admin');
            } else if ($role == 'user') {
                return redirect('dashboard');
            }
        }
        $this->title = 'Register';
        return $this->view("auth/register");
    }

    public function authRegister()
    {
        $name = $_POST[ 'name' ];
        $email = $_POST[ 'email' ];
        $password = $_POST[ 'password' ];

        // validate
        if (empty($name) || empty($email) || empty($password)) {
            addError('name', 'nama tidak boleh kosong');
            addError('email', 'email tidak boleh kosong');
            addError('password', 'password tidak boleh kosong');

            return back();
        }

        $user = new User();

        $data = [
            'name' => $name,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ];

        try {

            $user->create($data);

            addSuccess('register', 'Register Success');

            return back();
        } catch (\mysqli_sql_exception $th) {
            addError('register', $th->getMessage());
            return back();
        }

    }

    public function logout()
    {
        auth()->logout();
        return redirect('login');
    }

}