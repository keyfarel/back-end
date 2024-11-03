<?php

namespace app\controllers;

use app\services\RegisterService;

require_once __DIR__ . '/../services/RegisterService.php';
require_once __DIR__ . '/../configs/Connection.php';

class RegisterController
{
    private ?\mysqli $db;
    private RegisterService $registerService;

    public function __construct()
    {
        $database = new \app\configs\Connection();
        $this->db = $database->getConnection();
        $this->registerService = new \app\services\RegisterService($this->db);
    }

    public function register(): void
    {
        define("app\controllers\BASE_URL", '/isFor-website/php/public/index.php');

        if ($_SESSION['role_id'] != 1) {
            header("Location: " . BASE_URL . "?page=login");
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];
            $role_id = 1;  // Langsung menetapkan role ID admin

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Format email tidak valid!";
                return;
            }

            $register_success = $this->registerService->register($username, $email, $password, $role_id);
            if ($register_success) {
                header('Location: /isFor-website/public/index.php?page=admin_dashboard');
                exit();
            } else {
                require_once __DIR__ . '/../views/error_register.php';
            }

        } else {
            require_once __DIR__ . '/../views/register.php';
        }
    }
}
