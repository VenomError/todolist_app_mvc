<?php

namespace App\Controllers;
use Core\Controller;

class HomeController extends Controller
{
    public $layout = 'home';



    public function index()
    {

        $this->title = 'Home';
        return $this->view("home");
    }

}