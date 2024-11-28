<?php

namespace Core;

class Controller
{
    public $layout = 'app';
    public $title;

    public function view($view, $data = [])
    {

        $view = dirname(__DIR__) . "/views/$view.php";

        if (file_exists($view)) {
            $this->render($view, $data);
        } else {
            echo "$view Not not Found";
        }
    }

    private function render($view, $data = [])
    {
        $layoutPath = dirname(__DIR__) . "/layouts/$this->layout.php";
        if (file_exists($layoutPath)) {
            ob_start();
            $title = $this->title;
            extract($data);
            include "$view";
            $slot = ob_get_clean();
            include $layoutPath;
        } else {
            include $view;
        }
    }

}