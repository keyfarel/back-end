<?php

class Dashboard extends Controller{
    public function index(){
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }else{
            // $data['nama'] = $this->model('User_Model')->getUser();
            // var_dump($data)
            $this->view('dashboard');
        }
    }
}