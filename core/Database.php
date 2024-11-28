<?php
namespace Core;
use mysqli;


class Database
{
    private mysqli $conn;
    public function __construct()
    {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    protected function getConnection()
    {
        return $this->conn;
    }

    public function __destruct()
    {
        $this->conn->close();
    }
}