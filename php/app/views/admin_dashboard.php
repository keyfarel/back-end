<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
    header('Location: login.php');
    exit();
}
?>

<h1>Welcome to Admin Dashboard</h1>
