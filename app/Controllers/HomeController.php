<?php

namespace App\Controllers;

use Core\Database;
use App\Models\User;
use Core\Controller;
use Core\Service\Auth;

class HomeController extends Controller
{

    public $title = "tes";
    public function index()
    {
        $email = 'user@ssgmail.com';
        $password = 'passwssord';

        $login = Auth::login($email, $password);

        // var_dump($id, $name);
    }

}