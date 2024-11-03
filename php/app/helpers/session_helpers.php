<?php

const BASE_URL = '/isFor-website/public/index.php';

function initSession(): void
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}

function redirectIfNotLoggedIn(): void
{
    if (!isset($_SESSION['user_id'])) {
        header("Location: " . BASE_URL . "?page=login");
        exit();
    }
}

function redirectIfNotAdmin(): void
{
    if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
        header("Location: " . BASE_URL . "?page=login");
        exit();
    }
}
