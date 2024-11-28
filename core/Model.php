<?php

namespace Core;

use PDO;

class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=mvc_project', 'root', '');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
