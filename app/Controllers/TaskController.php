<?php

namespace App\Controllers;
use Core\Controller;

class TaskController extends Controller
{

    public $layout = 'app';
    public $title = 'task';

    public function __construct()
    {
        $this->authorize(true, ['user']);
    }
    public function index()
    {
        return $this->view('dashboard/task/listTask');
    }
    public function create()
    {
        return $this->view('dashboard/task/createTask');
    }

}