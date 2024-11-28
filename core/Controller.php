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
            echo "View Not not Found";
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

    protected function authorize($isAuthorize = true, $roles = ['admin'])
    {
        if ($isAuthorize) {
            if (auth()->isLoggedIn()) {
                $user = auth()->user();
                if (in_array($user->role, $roles)) {
                    return true;
                } else {
                    header('HTTP/1.0 401 Unauthorized');
                    echo "Unauthorized\n";
                    exit;
                }
            } else {
                return redirect('login');
            }
        } else {
            return;
        }
    }

}