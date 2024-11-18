<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome to dashboard user<?= $data['user']['username'] ?></h1>
    <img src="../app/img/profile/<?= $data['user']['profile_picture'] ?>" alt="testing" width="500px">

    <ul>
        <li><a href=""></a></li>
    </ul>

    <button><a href="<?= BASEURL; ?>/login/logout">keluar</a></button>
</body>
</html>
