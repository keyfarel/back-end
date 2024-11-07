<?php

namespace app\controllers;

use app\core\Controller;

class Home extends Controller
{
    public function index(): void
    {
        $this->view('main/home');
    }


}