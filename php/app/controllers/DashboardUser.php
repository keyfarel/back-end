<?php

namespace app\controllers;

use app\core\Controller;

class DashboardUser extends Controller{

    public function index(): void
    {
        $this->checkLogin();
        $this->view('user/user_dashboard');
    }
}