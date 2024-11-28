<?php

namespace App\Controllers;
use Core\Controller;

class ErrorController extends Controller
{

    public $layout = 'error';

    public function error($code)
    {
        $this->title = "Error Unauthorize $code";
        $message = "Unauthorize Action";
        $this->view('errors/default', [
            'code' => $code,
            'message' => $message
        ]);
    }

}