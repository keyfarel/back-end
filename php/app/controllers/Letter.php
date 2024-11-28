<?php

use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Component\VarDumper\VarDumper;

class Letter extends Controller{
    public function index(){
        
    }

    public function addLetterView(){
        $this->checkLogin();
        $role = $this->checkRole();
        $this->checkSessionTimeOut();
        if($role == 2){
            $this->saveLastVisitedPage();
            $this->view('user/submitLetter');
        }else{
            header('Location: ' . $this->getLastVisitedPage());
        }
    }

    public function verifyLetterview(){
        $this->checkLogin();
        $role = $this->checkRole();
        $this->checkSessionTimeOut();
        if($role == 1){
            $this->saveLastVisitedPage();
            $data['allLetters'] = $this->model('LettersModel')->getAllLetter();
            // var_dump($letter);
            // exit;
            $this->view('admin/verifyLetters', $data);
        }else{
            header('Location: ' . $this->getLastVisitedPage());
        }
    }

    public function getLetterById() {
        $id = $_GET['id']; // Ambil ID dari request
        $letter = $this->model('LettersModel')->getLetterById($id);
        var_dump($letter);
        exit;
    
        if ($letter) {
            echo json_encode(['filePath' => $letter['file_path']]);
        } else {
            http_response_code(404);
            echo json_encode(['message' => 'Surat tidak ditemukan']);
        }
    }

    public function createLetter($preview = false){
        
        $researchTitle = $_POST["researchTitle"];
        $leadResearcher = $_POST["leadResearcher"];
        $researchScheme = $_POST["researchScheme"];
        $researchCenter = $_POST["researchCenter"];
        $researchTopic = $_POST["researchTopic"];
        $date = $this->tgl_indo(date('Y-m-d'));

        $options = new Options();
        $options->setIsRemoteEnabled(true);
        $options->setChroot(__DIR__);
        $dompdf = new Dompdf($options);

        $html = file_get_contents( ASSETS . "/components/Doc/styleSurat.html");
        $html = str_replace("{{ researchTitle }}", $researchTitle, $html);
        $html = str_replace("{{ leadResearcher }}", $leadResearcher, $html);
        $html = str_replace("{{ researchScheme }}", $researchScheme, $html);
        $html = str_replace("{{ researchCenter }}", $researchCenter, $html);
        $html = str_replace("{{ researchTopic }}", $researchTopic, $html);
        $html = str_replace("{{ tanggal }}", $date, $html);

        $title = "pengajuan_surat_" . $researchTitle . ".pdf";

        $dompdf->loadHtml($html);
        $dompdf->set_paper('A4', 'portrait');
        $dompdf->render();
        $dompdf->add_info("Title", $title);

        if ($preview) {
            // Stream untuk preview di browser
            $dompdf->stream($title);
            exit; // Stop eksekusi setelah stream
        } else {
            // Kembalikan konten PDF untuk keperluan lain
            return $dompdf->output();
        }
        $dompdf->stream($title);
    }

    public function tgl_indo($tanggal){
        $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);

        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }

    public function previewLetter(){
        $this->createLetter(true);
    }

    public function sendLetter(){
        $researchTitle = $_POST["researchTitle"];
        $pdf = $this->createLetter(false);

        // target direktori penyimpanan
        $targetDirectory = __DIR__ . '/../letters/pending/';

        if (!is_dir($targetDirectory)) {
            mkdir($targetDirectory, 0777, true); // Buat folder jika belum ada
        }

        $fileName = 'surat_pengajuan_' . $researchTitle . '.pdf';
        $filePath = $targetDirectory . $fileName;

        file_put_contents($filePath, $pdf);

        if ($this->model('LettersModel')->addLetter($_POST, $fileName) > 0) {
            header('Location: ' . BASEURL . '/dashboardUser');
            echo "tambah data berhasil";
        } else {
            echo "tambah data gagal";
        }
    }
}