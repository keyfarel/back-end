<?php

class Home extends Controller{

    // Fungsi untuk menginisialisasi user default
    private function initializeDefaultUser() {
        $userModel = $this->model('UsersModel');
        
        // Cek apakah user sudah ada
        if (!$userModel->checkUserExists()) {
            // Jika belum ada, tambahkan user default
            $userModel->addDefaultUser();
        }
    }

    public function index(){
        $this->initializeDefaultUser();
        $this->view('main/home');
    }

    public function agenda(){
        $data['agenda'] = $this->model('AgendaModel')->getAllAgenda();
        $data['no'] = 1;
        $this->view('main/agenda', $data);
    }

    public function galeri(){
        $this->view('main/galeriweb');
    }

    public function hasilPenelitian(){
        $this->view('main/hasilpenelitian');
    }

}