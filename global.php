<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


use Core\Controller;
use Core\Service\Auth;
use Core\Service\Flash;

function param($key)
{
    return isset($_GET[$key]) ? $_GET[$key] : null;
}

function enc($value)
{
    return base64_encode($value);
}

function dec($value)
{
    return base64_decode($value);
}


function view($view, $data = [], $layout = '')
{
    $controller = new Controller();

    if (!empty($layout)) {
        $controller->layout = $layout;
    }

    return $controller->view($view, $data);
}

function asset($asset)
{
    $protocol = isset($_SERVER[ 'HTTPS' ]) && $_SERVER[ 'HTTPS' ] == 'on' ? 'https://' : 'http://';

    $url = $_SERVER[ 'HTTP_HOST' ];

    return $protocol . $url . "/$asset";
}

function redirect($url, $code = '302')
{
    http_response_code($code);

    header("Location: $url");
    exit;
}


function back()
{
    if (isset($_SERVER[ 'HTTP_REFERER' ])) {
        header("Location: " . $_SERVER[ 'HTTP_REFERER' ]);
        exit;
    } else {
        redirect('/');
    }
}

function flash($key = '', $message = '')
{
    if (!empty($key) && !empty($message)) {
        $flash = new Flash();
        $flash->set($key, $message);
    }

    return new Flash();
}

if (!function_exists('error')) {
    function addError($error, $message)
    {
        flash()->addError($error, $message);
    }
    function error($name)
    {
        if (flash()->hasError($name)) {
            return true;
        }
        return false;
    }

    function errorMessage($name)
    {
        if (flash()->hasError($name)) {
            return flash()->get("error_$name");
        }
        return null;
    }
}

if (!function_exists('success')) {
    function addSuccess($success, $message)
    {
        flash()->addSuccess($success, $message);
    }
    function success($name = '')
    {
        if (flash()->hasSuccess($name)) {
            return true;
        }
        return false;
    }

    function successMessage($name)
    {
        if (flash()->hasSuccess($name)) {
            return flash()->get("success_$name");
        }
        return null;
    }
}

function auth()
{
    return new Auth();
}

function session($key)
{
    return $_SESSION[$key];
}