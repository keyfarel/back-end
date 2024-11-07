<?php

namespace app\controllers;

use app\core\Controller;

class DashboardAdmin extends Controller
{
    public function index(): void
    {
        $this->checkLogin();
        $this->view('admin/admin_dashboard');
    }
}