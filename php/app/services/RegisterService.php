<?php


namespace app\services;

class RegisterService
{
    private \mysqli $connection;
    private string $table;

    public function __construct($db)
    {
        $this->connection = $db;
        $this->table = 'users';
    }

    // RegisterService.php
    public function register(string $username, string $email, string $password): bool
    {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Check if username or email already exists
        $query_check = "SELECT * FROM " . $this->table . " WHERE username = ? OR email = ?";
        $stmt_check = $this->connection->prepare($query_check);

        try {
            if (!$stmt_check) {
                throw new \Exception("Query preparation failed: " . $this->connection->error);
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
            return false;
        }

        $stmt_check->bind_param("ss", $username, $email);
        $stmt_check->execute();
        $result = $stmt_check->get_result();

        if ($result->num_rows > 0) {
            return false; // User with the same username or email already exists
        }

        // Insert new user with default role_id = 2
        $query = "INSERT INTO " . $this->table . " (username, email, password, role_id) VALUES (?, ?, ?, 2)";
        $stmt = $this->connection->prepare($query);

        try {
            if (!$stmt) {
                throw new \Exception("Query preparation failed: " . $this->connection->error);
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
            return false;
        }

        $stmt->bind_param("sss", $username, $email, $hashed_password);

        return $stmt->execute();
    }
}
