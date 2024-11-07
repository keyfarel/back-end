<?php

class DashboardUser extends Controller{
    public function index(){
        $this->checkLogin();
        $this->view('user/user_dashboard');
    }
}