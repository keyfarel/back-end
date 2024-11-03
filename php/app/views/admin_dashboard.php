<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
    header('Location: /isFor-website/public/index.php?page=login');
    exit();
}
?>

<h1>Welcome to Admin Dashboard, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
