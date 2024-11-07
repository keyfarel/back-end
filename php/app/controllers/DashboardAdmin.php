<?php

class DashboardAdmin extends Controller{
    public function index(){
        $this->checkLogin();
        $this->view('admin/admin_dashboard');
    }
}