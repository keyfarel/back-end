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

<!-- Tambahkan tombol Add User -->
<p><a href="/isFor-website/public/index.php?page=add_user">Add User</a></p>

<table>
    <tr>
        <th>Username</th>
        <th>Email</th>
        <th>Role</th>
        <th>Actions</th>
    </tr>
    <?php if (isset($users) && !empty($users)): ?>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo htmlspecialchars($user['username']); ?></td>
                <td><?php echo htmlspecialchars($user['email']); ?></td>
                <td><?php echo $user['role_id'] == 1 ? 'Admin' : 'User'; ?></td>
                <td>
                    <a href="/isFor-website/public/index.php?page=edit_user&user_id=<?php echo $user['user_id']; ?>">Edit</a>
                    |
                    <a href="/isFor-website/public/index.php?page=delete_user&user_id=<?php echo $user['user_id']; ?>"
                       onclick="return confirm('Yakin ingin menghapus user ini?');">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="4">No users found.</td>
        </tr>
    <?php endif; ?>
</table>
<br>
<br>
<br> <a href="/isFor-website/php/public/index.php?page=logout">Logout</a>
