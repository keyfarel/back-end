<?php

namespace app\controllers;

use app\core\Controller;
use JetBrains\PhpStorm\NoReturn;

class Login extends Controller{
    public function index(): void
    {
        $this->view("main/login");
    }

    public function authentication(): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
    
            //lebih baik ganti md5 ke password_bcrypt untuk keamanan
            $user = $this->model('User_Model')->getUserByUsername($username);
            if($user){
                if (md5($password) === $user['password']) {

                    session_start();
                    $_SESSION['user_id'] = $user['user_id'];
                    $_SESSION['username'] = $user['username'];

                    if($user['role_id'] == 1){
                        $_SESSION['role_id'] = $user['role_id'];
                        header('Location: ' . BASEURL . '/dashboardadmin');
                        die();
                    }else{
                        $_SESSION['role_id'] = $user['role_id'];
                        header('Location: ' . BASEURL . '/dashboarduser');
                        die();
                    }
                }else {
                    //kondisi jika password salah
                    echo "<script>
                            alert('password atau username salah coba lagi')
                            </script>";
                            header('Location: ' . BASEURL . '/login');
                    die();
                }
            }else {
                header('Location: ' . BASEURL . '/login');
                die();
            }
        }
    }

    #[NoReturn] public function logout(): void
    {
        session_start();
        session_unset();
        session_destroy();

        header('Location: ' . BASEURL . '/login');
        exit;
    }
}
