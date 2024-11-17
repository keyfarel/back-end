<?php 

var_dump($data['user']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome to dashboard admin <?= $data['user']['username'] ?></h1>
    <img src="../app/img/profile/<?= $data['user']['profile_picture'] ?>" alt="testing" width="500px">
    <button><a href="<?= BASEURL; ?>/login/logout">keluar</a></button><br><br>

    <ul>
        <li><a href="<?= BASEURL ?>/User">addUser</a></li>
    </ul>
    
    <table border="1" style="border-collapse: collapse; width: 100%;">
        <tr >
            <th>no</th>
            <th>username</th>
            <th>email</th>
            <th>profile</th>
            <th>role</th>
            <th>action</th>
        </tr>
        <?php foreach ($data['allUser'] as $allUser) :?>
        <tr>
            <td><?= $data['no']++ ?></td>
            <td><?= $allUser['username'] ?></td>
            <td><?= $allUser['email'] ?></td>
            <td><img src="../app/img/profile/<?= $allUser['profile_picture'] ?>" alt="foto profil" width="100px"></td>
            <td>
                <?php if ($allUser['role_id'] == 1) { ?>
                    <p>Admin</p>
                <?php } elseif ($allUser['role_id'] == 2) { ?>
                    <p>User</p>
                <?php } else { ?>
                    <p>Role tidak ada</p>
                <?php } ?>
            </td>
            <td>
                <button><a href="<?= BASEURL; ?>/User/editView/<?= $allUser['user_id'] ?>">Edit</a></button>
                <?php if ($allUser['user_id'] != $_SESSION['user_id']) { ?>
                    | <button><a href="<?= BASEURL; ?>/User/Delete/<?= $allUser['user_id'] ?>">Delete</a></button>
                <?php }?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>