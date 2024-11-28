<?php
namespace Core;

use mysqli;

class Database
{
    private mysqli $mysqli;
    private $table;
    private $fields = '*';
    private $conditions = [];
    private $bindings = [];
    private $limit;
    private $orderBy;

    public function __construct()
    {
        $this->mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
        if ($this->mysqli->connect_error) {
            throw new \Exception("Database connection failed: " . $this->mysqli->connect_error);
        }
    }

    public function table(string $table): self
    {
        $this->table = $table;
        return $this;
    }

    public function select(...$fields): self
    {
        $this->fields = empty($fields) ? '*' : implode(', ', $fields);
        return $this;
    }

    public function where(string $field, string $operator, $value): self
    {
        $placeholder = $field . count($this->conditions);
        $this->conditions[] = "$field $operator ?";
        $this->bindings[] = $value;
        return $this;
    }

    public function limit(int $limit): self
    {
        $this->limit = $limit;
        return $this;
    }

    public function orderBy(string $field, string $direction = 'ASC'): self
    {
        $this->orderBy = "$field $direction";
        return $this;
    }

    public function get()
    {
        $sql = "SELECT $this->fields FROM $this->table";

        if (!empty($this->conditions)) {
            $sql .= ' WHERE ' . implode(' AND ', $this->conditions);
        }

        if ($this->orderBy) {
            $sql .= " ORDER BY $this->orderBy";
        }

        if ($this->limit) {
            $sql .= " LIMIT $this->limit";
        }

        $stmt = $this->mysqli->prepare($sql);
        $this->bindParams($stmt);

        $stmt->execute();
        return $stmt->get_result();
    }

    public function toArray(): array
    {
        $result = $this->get();
        return $result->fetch_all(MYSQLI_ASSOC); // Mengembalikan array asosiatif
    }

    public function toObject(): array
    {
        $result = $this->get();
        while ($row = $result->fetch_object()) {
            $objects[] = $row; // Menyimpan setiap baris sebagai objek
        }
        return $objects;
    }

    public function insert(array $data): bool
    {
        $columns = implode(', ', array_keys($data));
        $placeholders = implode(', ', array_fill(0, count($data), '?'));
        $sql = "INSERT INTO $this->table ($columns) VALUES ($placeholders)";

        $stmt = $this->mysqli->prepare($sql);
        $this->bindings = array_values($data);
        $this->bindParams($stmt);

        return $stmt->execute();
    }

    public function update(array $data): bool
    {
        $fields = [];
        foreach ($data as $key => $value) {
            $fields[] = "$key = ?";
            $this->bindings[] = $value;
        }

        $sql = "UPDATE $this->table SET " . implode(', ', $fields);

        if (!empty($this->conditions)) {
            $sql .= ' WHERE ' . implode(' AND ', $this->conditions);
        }

        $stmt = $this->mysqli->prepare($sql);
        $this->bindParams($stmt);

        return $stmt->execute();
    }

    public function delete(): bool
    {
        $sql = "DELETE FROM $this->table";

        if (!empty($this->conditions)) {
            $sql .= ' WHERE ' . implode(' AND ', $this->conditions);
        }

        $stmt = $this->mysqli->prepare($sql);
        $this->bindParams($stmt);

        return $stmt->execute();
    }

    private function bindParams($stmt): void
    {
        if (!empty($this->bindings)) {
            $types = str_repeat('s', count($this->bindings)); // Semua binding diperlakukan sebagai string
            $stmt->bind_param($types, ...$this->bindings);
        }
    }
}
