<?php

namespace App\Controllers;
use Core\Controller;

class AdminController extends Controller
{

    public $layout = 'app';
    public $title = 'title';

    public function __construct()
    {
        $this->authorize(true);
    }
    public function index()
    {
        echo auth()->user()->role;
    }

}