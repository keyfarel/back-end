<?php

//membuat method untuk memanggil view dan model
class Controller{
    public function view($view, $data = []){
        require_once '../app/views/' . $view . '.php';
    }

    public function model($model){
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }

    public function checkLogin(){
        require_once '../app/helpers/Middleware.php';
        $middleware = new Middleware();
        if(!$middleware->isLoggedIn()){
            header('Location: ' . BASEURL . '/login');
        }
    }

    public function checkRole(){
        require_once '../app/helpers/Middleware.php';
        $middleware = new Middleware();
        return $middleware->checkRole();
    }

    public function saveLastVisitedPage(){
        require_once '../app/helpers/Middleware.php';
        $middleware = new Middleware();
        return $middleware->saveLastVisitedPage();
    }
    
    public function getLastVisitedPage(){
        require_once '../app/helpers/Middleware.php';
        $middleware = new Middleware();
        return $middleware->getLastVisitedPage();
    }
}