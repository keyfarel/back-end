<?php

class DashboardUser extends Controller{
    public function index(){
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }else{
            $this->view('user/user_dashboard');
        }
    }
}