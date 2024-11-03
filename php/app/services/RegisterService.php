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

    public function register(string $username, string $email, string $password, int $role_id = 2): bool
    {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $query_check = "SELECT * FROM " . $this->table . " WHERE username = ? OR email = ?";
        $stmt_check = $this->connection->prepare($query_check);

        try {
            if (!$stmt_check) {
                throw new \Exception("Persiapan query gagal: " . $this->connection->error);
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
            return false;
        }

        $stmt_check->bind_param("ss", $username, $email);
        $stmt_check->execute();
        $result = $stmt_check->get_result();

        if ($result->num_rows > 0) {
            return false;
        }

        $query = "INSERT INTO " . $this->table . " (username, email, password, role_id) VALUES (?, ?, ?, ?)";
        $stmt = $this->connection->prepare($query);

        try {
            if (!$stmt) {
                throw new \Exception("Persiapan query gagal: " . $this->connection->error);
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
            return false;
        }

        $stmt->bind_param("sssi", $username, $email, $hashed_password, $role_id);

        return $stmt->execute();
    }
}
