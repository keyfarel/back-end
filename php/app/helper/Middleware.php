<?php

class Middleware{
    function isLoggedIn() {
        session_start();
        return isset($_SESSION['user_id']);
    }
}