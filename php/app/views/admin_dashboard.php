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
<br><a href="/isFor-website/php/public/index.php?page=logout">Logout</a>

<!-- Tambahkan tautan ke halaman registrasi -->
<p><a href="/isFor-website/public/index.php?page=register">Tambah User</a></p>