<?php

namespace app\core;

//membuat method untuk memanggil view dan model
use app\helpers\Middleware;

class Controller
{
    public function view($view, $data = []): void
    {
        require_once '../app/views/' . $view . '.php';
    }

    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }

    public function checkLogin(): void
    {
        require_once '../app/helpers/Middleware.php';
        $middleware = new Middleware();
        if (!$middleware->isLoggedIn()) {
            header('Location: ' . BASEURL . '/login');
        }
    }
}