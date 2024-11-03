<?php

use app\controllers\RegisterController;
use app\controllers\LoginController;

require_once __DIR__ . '/controllers/RegisterController.php';
require_once __DIR__ . '/controllers/LoginController.php';
require_once __DIR__ . '/helpers/session_helpers.php';

function route($page): void
{
    initSession();

    switch ($page) {
        case 'register':
            redirectIfNotAdmin(); // Hanya admin yang dapat mengakses
            $controller = new RegisterController();
            $controller->register();
            break;

        case 'login':
            $controller = new LoginController();
            $controller->login();
            break;

        case 'admin_dashboard':
            redirectIfNotAdmin();
            require_once __DIR__ . '/views/admin_dashboard.php';
            break;

        case 'user_dashboard':
            redirectIfNotLoggedIn();
            require_once __DIR__ . '/views/user_dashboard.php';
            break;

        default:
            header('HTTP/1.0 404 Not Found');
            require_once __DIR__ . '/views/error.php';
            break;
    }
}
