<?php

class Papers extends Controller{
    public function index(){
        $this->checkLogin();
        $role = $this->checkRole();
        $this->checkSessionTimeOut();
        if($role == 2){
            $this->saveLastVisitedPage();
            $this->view('user/submitLetter');
        }else{
            header('Location: ' . $this->getLastVisitedPage());
        }
    }
}