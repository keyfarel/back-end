<?php

namespace app;

use app\controllers\RegisterController;
use app\controllers\LoginController;
use app\helpers\SessionHelper;

class Router
{
    public function route(string $page): void
    {
        SessionHelper::initSession();
        SessionHelper::checkSessionTimeout();

        switch ($page) {
            case 'register':
                SessionHelper::redirectIfNotLoggedInOrNotAdmin(1);
                $controller = new RegisterController();
                $controller->register();
                break;

            case 'login':
                SessionHelper::redirectIfLoggedIn();
                $controller = new LoginController();
                $controller->login();
                break;

            case 'logout':
                SessionHelper::logout();
                break;

            case 'admin_dashboard':
                SessionHelper::redirectIfNotLoggedInOrNotAdmin(1);
                require_once __DIR__ . '/views/admin_dashboard.php';
                break;

            case 'user_dashboard':
                SessionHelper::redirectIfNotLoggedInOrNotAdmin(2);
                require_once __DIR__ . '/views/user_dashboard.php';
                break;

            default:
                header('HTTP/1.0 404 Not Found');
                require_once __DIR__ . '/views/error.php';
                break;
        }
    }
}