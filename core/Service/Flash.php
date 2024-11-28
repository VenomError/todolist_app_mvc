<?php
namespace Core\Service;

class Flash
{
    public function set($key, $message)
    {
        $_SESSION[ 'flash' ][$key] = $message;
    }

    public function get($key)
    {
        if (isset($_SESSION[ 'flash' ][$key])) {
            $message = $_SESSION[ 'flash' ][$key];
            return $message;
        }
        return null;
    }

    public function has($key)
    {
        return isset($_SESSION[ 'flash' ][$key]);
    }

    public function clear()
    {
        unset($_SESSION[ 'flash' ]);
    }

    public function addError($name, $message)
    {
        $this->set("error_$name", $message);
    }
    public function addSuccess($name, $message)
    {
        $this->set("success_$name", $message);
    }

    public function hasError($name = '')
    {
        return $this->has("error_$name");
    }
    public function hasSuccess($name = '')
    {
        return $this->has("success_$name");
    }

}
