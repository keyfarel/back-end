<?php

class Middleware{
    function isLoggedIn() {
        session_start();
        return isset($_SESSION['user_id']);
    }

    function checkRole() {
        if(isset($_SESSION['role_id'])){
            return $_SESSION['role_id'];
        }else{
            return 0;
        }
    }

    public function saveLastVisitedPage() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        return $_SESSION['last_visited'] = $_SERVER['REQUEST_URI'];
    }

    public function getLastVisitedPage() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        return isset($_SESSION['last_visited']) ? $_SESSION['last_visited'] : BASEURL . '/defaultPage';
    }
}