<?php

session_start();

require_once __DIR__ . '/../app/controllers/RegisterController.php';
require_once __DIR__ . '/../app/controllers/LoginController.php';

// Simple routing logic
$page = $_GET['page'] ?? 'register';  // Default page is 'register'

// Route the request to the appropriate controller
switch ($page) {
    case 'register':
        $controller = new \app\controllers\RegisterController();
        $controller->register();
        break;

    case 'login':
        $controller = new \app\controllers\LoginController();
        $controller->login();
        break;

    case 'admin_dashboard':
        require_once __DIR__ . '/../app/views/admin_dashboard.php';
        break;

    case 'user_dashboard':
        require_once __DIR__ . '/../app/views/user_dashboard.php';
        break;

    default:
        echo "404 Page Not Found";
        break;

}
