<?php

namespace App\Controllers;
use Core\Controller;
use App\Models\Tasks;

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

        return $this->view('dashboard/index', [
            'tasks_count' => (new Tasks())->byAuth()->count(),
            'tasks_pending' => (new Tasks())->byAuth()->pending()->count(),
            'tasks_new' => (new Tasks())->byAuth()->new()->count(),
            'tasks_complete' => (new Tasks())->byAuth()->complete()->count(),
            'tasks_inprogress' => (new Tasks())->byAuth()->inprogress()->count(),
        ]);
    }

}