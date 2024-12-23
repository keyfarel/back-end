<?php

class User extends Controller
{
    public function index()
    {
        $this->checkLogin();
        $role = $this->checkRole();
        $this->checkSessionTimeOut();
        if ($role == 1) {
            $data['allUser'] = $this->model('UsersModel')->getUser();
            // var_dump($users);
            // die;
            $this->saveLastVisitedPage();
            $this->view('admin/users', $data);
        } else {
            header('Location: ' . $this->getLastVisitedPage());
        }
    }

    public function create()
    {

        $photo = $this->upload();

        if (!$photo) {
            return false;
        }

        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

        if ($this->model('UsersModel')->addUser($email, $_POST, $photo) > 0) {

            header('Location: ' . BASEURL . '/User');
            echo "tambah data berhasil";
        } else {
            echo
            '<script/>
                    alert("tambah data gagal");
                </script>';
        }
    }

    public function upload()
    {
        if (!isset($_FILES['profile_picture'])) {
            echo "Tidak ada files yang diunggah.";
            return false;
        }
        var_dump($_FILES);

        $nameFile = $_FILES['profile_picture']['name'];
        $sizeFile = $_FILES['profile_picture']['size'];
        $error = $_FILES['profile_picture']['error'];
        $tmpName = $_FILES['profile_picture']['tmp_name'];

        //cek apakah tidak ada gambar yang diupload
        if ($error == 4) {
            echo "pilih gambar terlebih dahulu";
            return false;
        }

        //cek yang diupload adalah gambar
        $extensionImageValid = ['jpg', 'jpeg', 'png'];
        $extensionImage = explode('.', $nameFile);
        $extensionImage = strtolower(end($extensionImage));

        if (!in_array($extensionImage, $extensionImageValid)) {
            echo "yang anda upload bukan gambar";
            return false;
        }

        //cek jika ukurannya terlalu besar
        if ($sizeFile > 5000000) {
            echo "ukuran gambar terlalu besar";
            return false;
        }

        //lolos pengecekan, gambar siap diupload
        // generate nama files baru
        $newFileName = uniqid();
        $newFileName .= '.';
        $newFileName .= $extensionImage;

        move_uploaded_file($tmpName, '../app/img/profile/' . $newFileName);

        return $newFileName;
    }

    public function editView($id)
    {
        $this->checkLogin();
        $role = $this->checkRole();
        $this->checkSessionTimeOut();
        if ($role == 1) {
            $this->saveLastVisitedPage();
            $data['user'] = $this->model('UsersModel')->getUserById($id);
            $this->view('admin/editUser', $data);
        } else {
            header('Location: ' . $this->getLastVisitedPage());
        }
    }

    public function edit()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $id = $_POST['user_id'];
        $oldPhoto = $_POST["oldImage"];
        $oldPass = $_POST["oldPass"];
        $newPass = $_POST["password"];

        if (!empty($newPass)) {
            // Jika password baru diinputkan, hash password baru dan simpan
            $password = password_hash($newPass, PASSWORD_DEFAULT);
        } else {
            // Jika password baru kosong, gunakan password lama
            $password = $oldPass;
        }

        if ($_FILES["profile_picture"]["error"] === 4) {
            $photo = $oldPhoto;
        } else {
            $photo = $this->upload();

            $image_name = $this->model('UsersModel')->deleteImage($id);

            if ($image_name['profile_picture'] && file_exists('../app/img/profile/' . $image_name['profile_picture'])) {
                unlink('../app/img/profile/' . $image_name['profile_picture']);
            }
        }

        if ($this->model('UsersModel')->editUser($email, $id, $_POST, $photo, $password) > 0) {
            header('Location: ' . BASEURL . '/User');
            echo "data berhasil diupdate";
        }else{
            echo "data tidak berhasil diupdate";
        }
    }

    public function delete($id)
    {
        $image_name = $this->model('UsersModel')->deleteImage($id);

        if ($image_name['profile_picture'] && file_exists('../app/img/profile/' . $image_name['profile_picture'])) {
            unlink('../app/img/profile/' . $image_name['profile_picture']);
        }

        if ($this->model('UsersModel')->deleteUser($id) > 0) {
            header('Location: ' . BASEURL . '/dashboardAdmin');
            echo "tambah data berhasil";
        } else {
            echo "delete user gagal";
        }
    }
}