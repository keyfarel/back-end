<?php

session_start();
require_once __DIR__ . '/../app/routes.php';

$page = $_GET['page'] ?? 'login';  // Halaman default adalah 'register'

// Memanggil fungsi route dengan parameter page
route($page);
