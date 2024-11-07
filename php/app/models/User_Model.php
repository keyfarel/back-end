<?php

namespace app\models;

use app\core\Database;

class User_Model
{
    private string $table = 'users';
    private Database $db;


    public function __construct()
    {
        $this->db = new Database;
    }


    public function getUser()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function addUser($data)
    {
        $query = "INSERT INTO users (username, password, email)
                    VALUES
                    (:username, :password, :email)";

        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', password_hash($data['password'], PASSWORD_BCRYPT));
        $this->db->bind('email', $data['email']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getUserByUsername($username)
    {
        $this->db->query("SELECT * FROM users WHERE username = :username");
        $this->db->bind(':username', $username);
        return $this->db->single();

        // $nilai = $this->db->single();
        // var_dump($nilai);
        // exit();
    }
}