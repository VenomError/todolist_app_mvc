<?php

namespace App\Controllers;

use Core\Controller;

class HomeController extends Controller
{

    public $title = "tes";

    public function index()
    {
        $data = [
            'name' => 'wawan'
        ];
        $this->view("home", $data);
    }

}