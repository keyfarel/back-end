<?php

namespace app\config;
use PDO;
use PDOException;

class Connection{
    private string $host = "localhost";
    private string $db_name = "isfor";
    private string $username = "root";
    private string $password = "";
    private $db;

    public function getConnection() {
        $this->db = null;

        try {
            $this->db = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->db;
    }
}
