<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Halo👋 selamat datang <?= $_SESSION['username'] ?> di isFor</h1>

    <button type="submit"><a href="<?= BASEURL; ?>/login/logout">logout</a></button>
</body>
</html>