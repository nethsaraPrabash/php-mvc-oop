<?php

class Database {
    private mysqli $connection;

    public function __construct() {
        $this->connection = new mysqli(
            $_ENV['DB_HOST'],
            $_ENV['DB_USERNAME'],
            $_ENV['DB_PASSWORD'],
            $_ENV['DB_DATABASE']
        );

        if ($this->connection->connect_error) {
            throw new Exception("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function query(string $sql) {
        return $this->connection->query($sql);
    }

    public function prepare(string $sql) {
        return $this->connection->prepare($sql);
    }

    public function fetchAll($result): array {
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function close(): void {
        $this->connection->close();
    }
}