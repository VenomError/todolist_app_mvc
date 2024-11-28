<?php

namespace Core;

use Core\Database;


class Model extends Database
{
    public $table;
    public $primaryKey = 'id';

    public function __construct()
    {
        parent::__construct(); // Memastikan koneksi database diinisialisasi
        $this->table($this->table);
    }



    public function find($id)
    {
        $this->where($this->primaryKey, "=", $id);
        return $this->get()->fetch_object();
    }

    public function create(array $data)
    {
        return $this->insert($data);
    }


    public static function __callStatic($method, $arguments)
    {
        $instance = new static();  // Buat instance dari kelas yang memanggil
        if (method_exists($instance, $method)) {
            return $instance->$method(...$arguments);  // Panggil metode pada instance
        }

        throw new \BadMethodCallException("Method $method does not exist in " . static::class);
    }

}
