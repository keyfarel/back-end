<?php

namespace app\helpers;

class SessionHelper
{
    private const BASE_URL = '/isFor-website/php/public/index.php';
    private const SESSION_TIMEOUT = 1800;

    public static function initSession(): void
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function redirectIfNotLoggedInOrNotAdmin(int $requiredRoleId): void
    {
        self::initSession();
        if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] !== $requiredRoleId) {
            header("Location: " . self::BASE_URL . "?page=login");
            exit();
        }
    }

    public static function checkSessionTimeout(): void
    {
        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > self::SESSION_TIMEOUT)) {
            session_unset();
            session_destroy();
            header("Location: " . self::BASE_URL . "?page=login");
            exit();
        }
        $_SESSION['LAST_ACTIVITY'] = time();
    }
}