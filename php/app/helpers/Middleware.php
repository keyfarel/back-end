<?php

namespace app\helpers;

class Middleware
{
    function isLoggedIn(): bool
    {
        session_start();
        return isset($_SESSION['user_id']);
    }
}