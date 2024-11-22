<?php

use Dompdf\Dompdf;
use Dompdf\Options;
class Papers extends Controller{
    public function index(){
        
    }

    public function addPaperView(){
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

    public function verifyPaperview(){
        $this->checkLogin();
        $role = $this->checkRole();
        $this->checkSessionTimeOut();
        if($role == 1){
            $this->saveLastVisitedPage();
            $this->view('admin/verifyLetters');
        }else{
            header('Location: ' . $this->getLastVisitedPage());
        }
    }

    public function createPaper(){
        
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


        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->add_info("Title", "An Example PDF");
        $dompdf->stream('surat_pengajuan.pdf');
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
}