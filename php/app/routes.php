<?php

use app\controllers\RegisterController;
use app\controllers\LoginController;

require_once __DIR__ . '/controllers/RegisterController.php';
require_once __DIR__ . '/controllers/LoginController.php';

function route($page): void
{
    switch ($page) {
        case 'register':
            $controller = new RegisterController();
            $controller->register();
            break;

        case 'login':
            $controller = new LoginController();
            $controller->login();
            break;

        case 'admin_dashboard':
            // Membatasi akses ke halaman admin
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
                header('Location: ../public/index.php?page=login');
                exit();
            }
            require_once __DIR__ . '/views/admin_dashboard.php';
            break;

        case 'user_dashboard':
            // Membatasi akses ke dashboard user
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            if (!isset($_SESSION['user_id'])) {
                header('Location: ../public/index.php?page=login');
                exit();
            }
            require_once __DIR__ . '/views/user_dashboard.php';
            break;

        default:
            // Menampilkan halaman error jika route tidak ditemukan
            require_once __DIR__ . '/views/error.php';
            break;
    }
}
