<?php

namespace App\Controllers;
use Core\Controller;

class DashboardController extends Controller
{

    public $layout = 'app';
    public $title = 'dashboard';

    public function __construct()
    {
        $this->authorize(true, ['user']);
    }
    public function index()
    {
        echo auth()->user()->role;
    }

}