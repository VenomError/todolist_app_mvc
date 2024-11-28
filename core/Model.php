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
        return $this->where($this->primaryKey, "=", $id)->get();
    }

    public function create(array $data)
    {
        return $this->insert($data);
    }


}
