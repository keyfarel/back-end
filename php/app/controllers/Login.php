<?php

class Login extends Controller{
    public function index(){
        $this->view("login");
    }

    public function login(){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = $this->model('User_Model')->getUserByUsername($username);

        if($user && password_verify($password, $user['password'])){
            session_start();
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['usernmae'];

            header('Location: ' . BASEURL . '/dashboard');
            exit;
        }else{
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    }

    public function logout(){
        session_start();
        session_unset();
        session_destroy();

        header('Location: ' . BASEURL . '/login');
        exit;
    }
}

























// use app\services\LoginService;
// use app\models\User;
// use app\config\Connection;

// require_once __DIR__ . '/../services/LoginService.php';

// class Login extends Controller{

//     private $loginService;

//     public function __construct() {
//         // Inisialisasi koneksi database
//         $database = new Connection();
//         $db = $database->getConnection();
        
//         // Inisialisasi model User dan loginService dengan koneksi database
//         $userModel = new User($db);
//         $this->loginService = new LoginService($userModel);
//     }

//     public function index() {
//         $this->view('login');
//     }

//     public function login() {
//         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//             $username = $_POST['username'];
//             $password = $_POST['password'];

//             $user = $this->loginService->login($username, $password);
//             if ($user) {
//                 session_start();
//                 $_SESSION['user_id'] = $user['user_id'];
//                 $_SESSION['username'] = $user['username'];

//                 if ($user['role_id'] == 1) {
//                     header('Location: /isFor-website/public/index.php?page=admin_dashboard');
//                 } else {
//                     header('Location: /isFor-website/public/index.php?page=user_dashboard');
//                 }
//                 exit();
//             } else {
//                 require_once __DIR__ . '/../views/error.php';
//             }
//         } else {
//             require_once __DIR__ . '/../views/login.php';
//         }
//     }
// }
