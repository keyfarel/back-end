<?php


class Galleries extends Controller
{
    public function index()
    {
        $this->view("main/galeri");
    }

    public function uploadImgView()
    {
        $this->checkLogin();
        $role = $this->checkRole();
        $this->checkSessionTimeOut();
        if ($role == 2) {
            $this->saveLastVisitedPage();
            $this->view('user/uploadImage');
        } else {
            header('Location: ' . $this->getLastVisitedPage());
        }
    }

    public function verifyImgview()
    {
        $this->checkLogin();
        $role = $this->checkRole();
        $this->checkSessionTimeOut();
        if ($role == 1) {
            $this->saveLastVisitedPage();
            $this->view('admin/verifyImages');
        } else {
            header('Location: ' . $this->getLastVisitedPage());
        }
    }

    public function imgHistoryView()
    {
        $this->checkLogin();
        $role = $this->checkRole();
        $this->checkSessionTimeOut();
        if ($role == 2) {
            $this->saveLastVisitedPage();
            $this->view('user/image-history');
        } else {
            header('Location: ' . $this->getLastVisitedPage());
        }
    }

    public function uploadImg()
    {
        $this->checkLogin();
        $role = $this->checkRole();
        $this->checkSessionTimeOut();

        if ($role == 2) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $title = htmlspecialchars(trim($_POST['imageTitle']));
                $category = htmlspecialchars(trim($_POST['category']));
                $description = htmlspecialchars(trim($_POST['description']));

                if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                    $targetDir = __DIR__ . "/../img/gallery/";
                    $fileName = basename($_FILES['image']['name']);
                    $uniqueName = uniqid() . "_" . $fileName;
                    $targetFilePath = $targetDir . $uniqueName;
                    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

                    $allowedTypes = ['jpg', 'png', 'gif', 'jpeg'];
                    if (in_array(strtolower($fileType), $allowedTypes)) {
                        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
                            $gallery = new Gallery($this->db);
                            $uploadSuccess = $gallery->create($uniqueName, $category, $title, 'pending', $_SESSION['user_id']);
                            if ($uploadSuccess) {
                                header("Location: /galleries/imgHistoryView");
                            } else {
                                error_log("Database insert failed for image upload.");
                                echo "Gagal menyimpan informasi gambar.";
                            }
                        } else {
                            error_log("Failed to move uploaded file.");
                            echo "Gagal mengunggah file.";
                        }
                    } else {
                        echo "Tipe file tidak diizinkan. Hanya JPG, PNG, dan GIF.";
                    }
                } else {
                    echo "Tidak ada file yang diunggah atau terjadi kesalahan.";
                }
            } else {
                $this->view('user/uploadImage');
            }
        } else {
            header('Location: ' . $this->getLastVisitedPage());
        }
    } 
}