<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {

    public function __construct(){
        parent::__construct();
        is_logged_in();
        $this->load->model("Saparung_model");
    }
    
    public function suratMasuk() {
        $data["title"] = "Surat Masuk";
        $data["judul"] = "Surat Masuk";
        $email = $this->session->userdata("email");
        $data["user"] = $this->Saparung_model->getDataSesuai("user", "email", $email);
        $tahun = date("Y");
        $this->db->order_by('id_sm', 'DESC');
        $this->db->where('YEAR(tgl_terima)', $tahun);
        $data["surat_masuk"] = $this->Saparung_model->getData("surat_masuk");
        $data["bulan"] = [ 
            [ "no" => 1, "nama" => "Januari"],
            [ "no" => 2, "nama" => "Februari"],
            [ "no" => 3, "nama" => "Maret"],
            [ "no" => 4, "nama" => "April"],
            [ "no" => 5, "nama" => "Mei"],
            [ "no" => 6, "nama" => "Juni"],
            [ "no" => 7, "nama" => "Juli"],
            [ "no" => 8, "nama" => "Agustus"],
            [ "no" => 9, "nama" => "September"],
            [ "no" => 10, "nama" => "Oktober"],
            [ "no" => 11, "nama" => "November"],
            [ "no" => 12, "nama" => "Desember"],
        ];
        $data["tahun"] = [ date("Y")-4, date("Y")-3, date("Y")-2, date("Y")-1, date("Y")];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('suratmasuk/index', $data);
        $this->load->view('templates/footer');
    }

    public function inputSuratMasuk() {
        $data["title"] = "Surat Masuk";
        $data["judul"] = "Input Surat Masuk";
        $email = $this->session->userdata("email");
        $data["user"] = $this->Saparung_model->getDataSesuai("user", "email", $email);

        $this->form_validation->set_rules("tgl_surat", "Tanggal Surat", "required");
        $this->form_validation->set_rules("no_surat", "Nomor Surat", "required|trim");
        $this->form_validation->set_rules("isi_surat", "Isi Surat", "required|trim");
        $this->form_validation->set_rules("tujuan", "Ditujukan Kepada", "required|trim");

        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('suratmasuk/input', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "tgl_terima" => date("y-m-d"),
                "tgl_surat" => $this->input->post("tgl_surat", true),
                "no_surat" => htmlspecialchars($this->input->post("no_surat",true)),
                "isi_surat" => htmlspecialchars($this->input->post("isi_surat",true)),
                "tujuan" => htmlspecialchars($this->input->post("tujuan",true)),
            ];
            $this->Saparung_model->tambah('surat_masuk', $data);
            $this->session->set_flashdata("success", 'Surat Masuk baru ditambahkan.');
            redirect("surat/suratmasuk");  
        }
    }

    public function deleteSuratMasuk($id){
        $this->Saparung_model->hapus("surat_masuk", "id_sm", $id);
        $this->session->set_flashdata("success", 'Surat Masuk berhasil terhapus.');
        redirect("surat/suratmasuk");
    }

    public function editSuratMasuk($id){
        $data["title"] = "Surat Masuk";
        $data["judul"] = "Edit Surat Masuk";
        $email = $this->session->userdata("email");
        $data["user"] = $this->Saparung_model->getDataSesuai("user", "email", $email);
        $data["surat_masuk"] = $this->Saparung_model->getDataSesuai("surat_masuk", "id_sm", $id);

        $this->form_validation->set_rules("tgl_surat", "Tanggal Surat", "required");
        $this->form_validation->set_rules("no_surat", "Nomor Surat", "required|trim");
        $this->form_validation->set_rules("isi_surat", "Isi Surat", "required|trim");
        $this->form_validation->set_rules("tujuan", "Ditujukan Kepada", "required|trim");
        if($this->form_validation->run() ==  false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('suratmasuk/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "tgl_surat" => $this->input->post("tgl_surat", true),
                "no_surat" => htmlspecialchars($this->input->post("no_surat",true)),
                "isi_surat" => htmlspecialchars($this->input->post("isi_surat",true)),
                "tujuan" => htmlspecialchars($this->input->post("tujuan",true)),
            ];
            $id = $this->input->post("id");
            $this->Saparung_model->ubah("id_sm", $id, "surat_masuk", $data);
            $this->session->set_flashdata("success", 'Surat Masuk telah diperbaharui!');            
            redirect("surat/suratmasuk");
        }
    }

    
    public function cetakSuratMasuk(){
        $data["judul"] = "Laporan Surat Masuk";
        $this->form_validation->set_rules("bulan", "Bulan", "required");
        
        if(empty($this->input->post("bulan"))){
            $tahun = $this->input->post("tahun",true);
            $data["cetak"] = $this->Saparung_model->getDataGanda("surat_masuk", [ "YEAR(tgl_terima)" => $tahun])->result_array();
            $data["perbulan"] = $tahun."-0-";
            $data["waktu"] = "TAHUN ";
        } else {
            $tahun = $this->input->post("tahun",true);
            $bulan = $this->input->post("bulan",true); 
            $data["cetak"] = $this->Saparung_model->getDataGanda("surat_masuk", [ "YEAR(tgl_terima)" => $tahun, "MONTH(tgl_terima)" => $bulan])->result_array();
            $data["perbulan"] = $tahun."-".$bulan."-";
            $data["waktu"] = "BULAN ";
        }
        $this->load->library("pdf");
        $this->pdf->setFileName("Laporan_surat_masuk.pdf");
        $this->pdf->setPaper("Legal", "Landscape");
        $this->pdf->loadView('suratmasuk/cetak', $data);
    }

    
    public function suratKeluar() {
        $data["title"] = "Surat Keluar";
        $data["judul"] = "Surat Keluar";
        $email = $this->session->userdata("email");
        $data["user"] = $this->Saparung_model->getDataSesuai("user", "email", $email);
        $data["bulan"] = [ 
            [ "no" => 1, "nama" => "Januari"],
            [ "no" => 2, "nama" => "Februari"],
            [ "no" => 3, "nama" => "Maret"],
            [ "no" => 4, "nama" => "April"],
            [ "no" => 5, "nama" => "Mei"],
            [ "no" => 6, "nama" => "Juni"],
            [ "no" => 7, "nama" => "Juli"],
            [ "no" => 8, "nama" => "Agustus"],
            [ "no" => 9, "nama" => "September"],
            [ "no" => 10, "nama" => "Oktober"],
            [ "no" => 11, "nama" => "November"],
            [ "no" => 12, "nama" => "Desember"],
        ];
        $data["tahun"] = [ date("Y")-4, date("Y")-3, date("Y")-2, date("Y")-1, date("Y")];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('suratkeluar/index', $data);
        $this->load->view('templates/footer');
    }

    public function cetakSuratKeluar(){
        $data["judul"] = "Laporan Surat Keluar";
        if(empty($this->input->post("bulan"))){
            $tahun = $this->input->post("tahun",true);
            $data["km"] = $this->Saparung_model->joinSuratKeluarTahun("kematian", $tahun);
            $data["tt"] = $this->Saparung_model->joinSuratKeluarTahun("taksiran_tanah", $tahun);
            $data["us"] = $this->Saparung_model->joinSuratKeluarTahun("usaha", $tahun);
            $data["ck"] = $this->Saparung_model->joinSuratKeluarTahun("kepolisian", $tahun);
            $data["dm"] = $this->Saparung_model->joinSuratKeluarTahun("domisili", $tahun);
            $data["kr"] = $this->Saparung_model->joinSuratKeluarTahun("keramaian", $tahun);
            $data["perbulan"] = $tahun."-0-";
            $data["waktu"] = "TAHUN ";
        } else {
            $tahun = $this->input->post("tahun",true);
            $bulan = $this->input->post("bulan",true); 
            $data["km"] = $this->Saparung_model->joinSuratKeluarBulan("kematian", $tahun, $bulan);
            $data["tt"] = $this->Saparung_model->joinSuratKeluarBulan("taksiran_tanah", $tahun, $bulan);
            $data["us"] = $this->Saparung_model->joinSuratKeluarBulan("usaha", $tahun, $bulan);
            $data["ck"] = $this->Saparung_model->joinSuratKeluarBulan("kepolisian", $tahun, $bulan);
            $data["dm"] = $this->Saparung_model->joinSuratKeluarBulan("domisili", $tahun, $bulan);
            $data["kr"] = $this->Saparung_model->joinSuratKeluarBulan("keramaian", $tahun, $bulan);
            $data["perbulan"] = $tahun."-".$bulan."-";
            $data["waktu"] = "BULAN ";
        }
        $this->load->library("pdf");
        $this->pdf->setFileName("Laporan_surat_keluar.pdf");
        $this->pdf->setPaper("Legal", "Landscape");
        $this->pdf->loadView('suratkeluar/cetak', $data);
    }

    // surat keterangan Kematian
    public function kematian() {
        $data["title"] = "Surat Keluar";
        $data["judul"] = "Surat Keterangan Kematian";
        $email = $this->session->userdata("email");
        $data["user"] = $this->Saparung_model->getDataSesuai("user", "email", $email);
        $data["kematian"] = $this->Saparung_model->joinSurat("kematian", "id_kematian");

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('suratkeluar/kematian/index', $data);
        $this->load->view('templates/footer');
    }

    public function inputkematian() {
        $data["title"] = "Surat Keluar";
        $data["judul"] = "Input Surat Keterangan kematian";
        $email = $this->session->userdata("email");
        $data["user"] = $this->Saparung_model->getDataSesuai("user", "email", $email);
        $data["data_penduduk"] = $this->Saparung_model->getData("data_penduduk");
        $data["kode"] = $this->Saparung_model->getKodeSurat("kematian", "kode");

        $this->form_validation->set_rules("kode", "Kode Surat", "required|trim");
        $this->form_validation->set_rules("dp", "Data Penduduk", "required");
        $this->form_validation->set_rules("tgl_mati", "Tanggal Meninggal", "required");
        $this->form_validation->set_rules("jam_mati", "Jam Meninggal", "required");
        $this->form_validation->set_rules("sebab", "Sebab Meninggal", "required");
        $this->form_validation->set_rules("meninggal_di", "Tempat Meninggal", "required");
        $this->form_validation->set_rules("jam_kubur", "Jam Di Kuburkan", "required");
        $this->form_validation->set_rules("dikuburkan_di", "Tempat Di Kuburkan", "required");
        
        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('suratkeluar/kematian/input', $data);
            $this->load->view('templates/footer');
        } else {
            $path = "assets/img/qr/kematian/";
            $image = $path.date("Ymd").$this->input->post("kode").".png";
            $tanggal = date('Y-m-d');
            $content = base_url("verifikasi/index/kematian/{$tanggal}/{$this->input->post('kode')}");
            QRcode::png($content,$image,QR_ECLEVEL_L,3);
            $data = [
                "tanggal"=> $tanggal,
                "kode" =>  $this->input->post("kode"),
                "data_id" =>  $this->input->post("dp"),
                "nomor" =>  $this->input->post("nomor"),
                "tgl_mati" => $this->input->post("tgl_mati",true),
                "jam_mati" => htmlspecialchars($this->input->post("jam_mati",true)),
                "sebab" => htmlspecialchars($this->input->post("sebab",true)),
                "meninggal_di" => htmlspecialchars($this->input->post("meninggal_di",true)),
                "jam_kubur" => htmlspecialchars($this->input->post("jam_kubur",true)),
                "dikuburkan_di" => htmlspecialchars($this->input->post("dikuburkan_di",true)),
                "qr" => $image
            ];
            $this->Saparung_model->tambah('kematian', $data);
            $this->session->set_flashdata("success", 'Surat Keterangan Kematian baru ditambahkan.');
            redirect("surat/kematian");  
        }
    }
    
    public function deletekematian($id){
        $delete = $this->Saparung_model->getDataSesuai("kematian", "id_kematian", $id);
        unlink($delete["qr"]);
        $this->Saparung_model->hapus("kematian", "id_kematian", $id);
        $this->session->set_flashdata("success", 'Surat Keterangan Kematian berhasil terhapus.');
        redirect("surat/kematian");  
    }

    public function editkematian($id) {
        $data["title"] = "Surat Keluar";
        $data["judul"] = "Edit Surat Keterangan Kematian";
        $email = $this->session->userdata("email");
        $data["user"] = $this->Saparung_model->getDataSesuai("user", "email", $email);
        $data["kematian"] = $this->Saparung_model->getDataSesuai("kematian", "id_kematian", $id);
        $data["data_penduduk"] = $this->Saparung_model->getData("data_penduduk");

        $this->form_validation->set_rules("dp", "Data Penduduk", "required");
        $this->form_validation->set_rules("tgl_mati", "Tanggal Meninggal", "required");
        $this->form_validation->set_rules("jam_mati", "Jam Meninggal", "required");
        $this->form_validation->set_rules("sebab", "Sebab Meninggal", "required");
        $this->form_validation->set_rules("meninggal_di", "Tempat Meninggal", "required");
        $this->form_validation->set_rules("jam_kubur", "Jam Di Kuburkan", "required");
        $this->form_validation->set_rules("dikuburkan_di", "Tempat Di Kuburkan", "required");

        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('suratkeluar/kematian/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "data_id" =>  $this->input->post("dp"),
                "tgl_mati" => $this->input->post("tgl_mati",true),
                "jam_mati" => htmlspecialchars($this->input->post("jam_mati",true)),
                "sebab" => htmlspecialchars($this->input->post("sebab",true)),
                "meninggal_di" => htmlspecialchars($this->input->post("meninggal_di",true)),
                "jam_kubur" => htmlspecialchars($this->input->post("jam_kubur",true)),
                "dikuburkan_di" => htmlspecialchars($this->input->post("dikuburkan_di",true)),
            ];
            $id = $this->input->post("id");
            $this->Saparung_model->ubah('id_kematian', $id, "kematian", $data);
            $this->session->set_flashdata("success", 'Surat Keterangan Kematian telah diperbaharui.');
            redirect("surat/kematian");  
        }
    }
    
    public function cetakkematian($id){
        $data["judul"] = "Cetak Surat Keterangan kematian";
        $data["kematian"] = $this->Saparung_model->joinSuratById("kematian", "id_kematian", $id);
        $this->load->library("pdf");
        $this->pdf->setFileName("kematian.pdf");
        $this->pdf->setPaper("A4", "potrait");
        $this->pdf->loadView('suratkeluar/kematian/cetak', $data);
    }
    // surat keterangan Kematian
        
    //Surat Keterangan Taksiran Tanah
    public function taksiranTanah() {
        $data["title"] = "Surat Keluar";
        $data["judul"] = "Surat Keterangan Taksiran Tanah";
        $email = $this->session->userdata("email");
        $data["user"] = $this->Saparung_model->getDataSesuai("user", "email", $email);
        $data["taksiran_tanah"] = $this->Saparung_model->joinSurat("taksiran_tanah", "id_tt");

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('suratkeluar/taksirantanah/index', $data);
        $this->load->view('templates/footer');
    }

    public function inputTaksiranTanah() {
        $data["title"] = "Surat Keluar";
        $data["judul"] = "Input Surat Keterangan Taksiran Tanah";
        $email = $this->session->userdata("email");
        $data["user"] = $this->Saparung_model->getDataSesuai("user", "email", $email);
        $data["data_penduduk"] = $this->Saparung_model->getData("data_penduduk");
        $data["kode"] = $this->Saparung_model->getKodeSurat("taksiran_tanah", "kode");

        $this->form_validation->set_rules("kode", "Kode Surat", "required|trim");
        $this->form_validation->set_rules("dp", "Data Penduduk", "required");
        $this->form_validation->set_rules("nop", "NOP", "required|trim");
        $this->form_validation->set_rules("kelas", "Kelas", "required|trim");
        $this->form_validation->set_rules("luas", "Luas", "required|trim|numeric");
        $this->form_validation->set_rules("harga", "Harga", "required|trim|numeric");
        $this->form_validation->set_rules("utara", "Batas Utara", "required|trim");
        $this->form_validation->set_rules("timur", "Batas Timur", "required|trim");
        $this->form_validation->set_rules("selatan", "Batas Selatan", "required|trim");
        $this->form_validation->set_rules("barat", "Batas Barat", "required|trim");
        $this->form_validation->set_rules("keperluan", "Keperluan", "required|trim");

        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('suratkeluar/taksirantanah/input', $data);
            $this->load->view('templates/footer');
        } else {
            $path = "assets/img/qr/taksirantanah/";
            $image = $path.date("Ymd").$this->input->post("kode").".png";
            $tanggal = date('Y-m-d');
            $content = base_url("verifikasi/index/taksiran_tanah/{$tanggal}/{$this->input->post('kode')}");
            QRcode::png($content,$image,QR_ECLEVEL_L,3);
            $data = [
                "tanggal"=> $tanggal,
                "kode" =>  $this->input->post("kode"),
                "data_id" => $this->input->post("dp"),
                "nomor" =>  $this->input->post("nomor"),
                "nop" => htmlspecialchars($this->input->post("nop",true)),
                "kelas" => htmlspecialchars($this->input->post("kelas",true)),
                "luas" => htmlspecialchars($this->input->post("luas",true)),
                "harga" => htmlspecialchars($this->input->post("harga",true)),
                "utara" => htmlspecialchars($this->input->post("utara",true)),
                "timur" => htmlspecialchars($this->input->post("timur",true)),
                "selatan" => htmlspecialchars($this->input->post("selatan",true)),
                "barat" => htmlspecialchars($this->input->post("barat",true)),
                "keperluan" => htmlspecialchars($this->input->post("keperluan",true)),
                "qr" => $image
            ];
            $this->Saparung_model->tambah('taksiran_tanah', $data);
            $this->session->set_flashdata("success", 'Surat Keterangan Taksiran Tanah baru ditambahkan.');
            redirect("surat/taksirantanah");  
        }
    }

    public function deleteTaksiranTanah($id){
        $delete = $this->Saparung_model->getDataSesuai("taksiran_tanah", "id_tt", $id);
        unlink($delete["qr"]);
        $this->Saparung_model->hapus("taksiran_tanah", "id_tt", $id);
        $this->session->set_flashdata("success", 'Surat Keterangan Taksiran Tanah berhasil terhapus.');
        redirect("surat/taksirantanah");  
    }

    public function editTaksiranTanah($id) {
        $data["title"] = "Surat Keluar";
        $data["judul"] = "Edit Surat Keterangan Taksiran Tanah";
        $email = $this->session->userdata("email");
        $data["user"] = $this->Saparung_model->getDataSesuai("user", "email", $email);
        $data["taksiran_tanah"] = $this->Saparung_model->getDataSesuai("taksiran_tanah", "id_tt", $id);
        $data["data_penduduk"] = $this->Saparung_model->getData("data_penduduk");

        $this->form_validation->set_rules("dp", "Data Penduduk", "required");
        $this->form_validation->set_rules("nop", "NOP", "required|trim");
        $this->form_validation->set_rules("kelas", "Kelas", "required|trim");
        $this->form_validation->set_rules("luas", "Luas", "required|trim|numeric");
        $this->form_validation->set_rules("harga", "Harga", "required|trim|numeric");
        $this->form_validation->set_rules("utara", "Batas Utara", "required|trim");
        $this->form_validation->set_rules("timur", "Batas Timur", "required|trim");
        $this->form_validation->set_rules("selatan", "Batas Selatan", "required|trim");
        $this->form_validation->set_rules("barat", "Batas Barat", "required|trim");
        $this->form_validation->set_rules("keperluan", "Keperluan", "required|trim");

        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('suratkeluar/taksirantanah/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "data_id" =>  $this->input->post("dp"),
                "nop" => htmlspecialchars($this->input->post("nop",true)),
                "kelas" => htmlspecialchars($this->input->post("kelas",true)),
                "luas" => htmlspecialchars($this->input->post("luas",true)),
                "harga" => htmlspecialchars($this->input->post("harga",true)),
                "utara" => htmlspecialchars($this->input->post("utara",true)),
                "timur" => htmlspecialchars($this->input->post("timur",true)),
                "selatan" => htmlspecialchars($this->input->post("selatan",true)),
                "barat" => htmlspecialchars($this->input->post("barat",true)),
                "keperluan" => htmlspecialchars($this->input->post("keperluan",true)),
            ];
            $id = $this->input->post("id");
            $this->Saparung_model->ubah("id_tt", $id, 'taksiran_tanah', $data);
            $this->session->set_flashdata("success", 'Surat Keterangan Taksiran telah diperbaharui.');
            redirect("surat/taksirantanah");  
        }
    }

    public function cetakTaksiranTanah($id){
        $data["judul"] = "Cetak Surat Keterangan Taksiran Tanah";
        $data["taksiran_tanah"] =$this->db->get_where('taksiran_tanah', [
            'id_tt' => $id
        ])->row_array();

        $this->load->library("pdf");
        $this->pdf->setFileName("taksirantanah.pdf");
        $this->pdf->setPaper("A4", "potrait");
        $this->pdf->loadView('suratkeluar/taksirantanah/cetak', $data);
    }
    //Surat Keterangan Taksiran Tanah

    //Surat Keterangan Usaha
    public function usaha() {
        $data["title"] = "Surat Keluar";
        $data["judul"] = "Surat Keterangan Usaha";
        $email = $this->session->userdata("email");
        $data["user"] = $this->Saparung_model->getDataSesuai("user", "email", $email);
        $data["usaha"] = $this->Saparung_model->joinSurat("usaha", "id_usaha");

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('suratkeluar/usaha/index', $data);
        $this->load->view('templates/footer');
    }

    public function inputUsaha() {
        $data["title"] = "Surat Keluar";
        $data["judul"] = "Input Surat Keterangan Usaha";
        $email = $this->session->userdata("email");
        $data["user"] = $this->Saparung_model->getDataSesuai("user", "email", $email);
        $data["data_penduduk"] = $this->Saparung_model->getData("data_penduduk");
        $data["kode"] = $this->Saparung_model->getKodeSurat("usaha", "kode");

        $this->form_validation->set_rules("dp", "Data Penduduk", "required");
        $this->form_validation->set_rules("jenis_usaha", "Jenis Usaha", "required|trim");
        $this->form_validation->set_rules("alamat", "Alamat Usaha", "required|trim");
        $this->form_validation->set_rules("keperluan", "Keperluan", "required|trim");

        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('suratkeluar/usaha/input', $data);
            $this->load->view('templates/footer');
        } else {
            $path = "assets/img/qr/usaha/";
            $image = $path.date("Ymd").$this->input->post("kode").".png";
            $tanggal = date('Y-m-d');
            $content = base_url("verifikasi/index/usaha/{$tanggal}/{$this->input->post('kode')}");
            QRcode::png($content,$image,QR_ECLEVEL_L,3);
            $data = [
                "tanggal"=> $tanggal,
                "kode" =>  $this->input->post("kode"),
                "data_id" =>  $this->input->post("dp"),
                "nomor" =>  $this->input->post("nomor"),
                "jenis_usaha" => htmlspecialchars($this->input->post("jenis_usaha",true)),
                "alamat_usaha" => htmlspecialchars($this->input->post("alamat",true)),
                "keperluan" => htmlspecialchars($this->input->post("keperluan",true)),
                "qr" => $image
            ];
            $this->Saparung_model->tambah('usaha', $data);
            $this->session->set_flashdata("success", 'Surat Keterangan Usaha baru ditambahkan.');
            redirect("surat/usaha");  
        }
    }

    public function deleteUsaha($id){
        $delete = $this->Saparung_model->getDataSesuai("usaha", "id_usaha", $id);
        unlink($delete["qr"]);
        $this->Saparung_model->hapus("usaha", "id_usaha", $id);
        $this->session->set_flashdata("success", 'Surat Keterangan Usaha berhasil terhapus.');
        redirect("surat/usaha");  
    }

    public function editUsaha($id) {
        $data["title"] = "Surat Keluar";
        $data["judul"] = "Edit Surat Keterangan Usaha";
        $email = $this->session->userdata("email");
        $data["user"] = $this->Saparung_model->getDataSesuai("user", "email", $email);
        $data["usaha"] = $this->Saparung_model->getDataSesuai("usaha", "id_usaha", $id);
        $data["data_penduduk"] = $this->Saparung_model->getData("data_penduduk");

        $this->form_validation->set_rules("dp", "Data Penduduk", "required");
        $this->form_validation->set_rules("jenis_usaha", "Jenis Usaha", "required|trim");
        $this->form_validation->set_rules("alamat", "Alamat Usaha", "required|trim");
        $this->form_validation->set_rules("keperluan", "Keperluan", "required|trim");

        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('suratkeluar/usaha/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "data_id" =>  $this->input->post("dp"),
                "jenis_usaha" => htmlspecialchars($this->input->post("jenis_usaha",true)),
                "alamat_usaha" => htmlspecialchars($this->input->post("alamat",true)),
                "keperluan" => htmlspecialchars($this->input->post("keperluan",true)),
            ];
            $id = $this->input->post("id");
            $this->Saparung_model->ubah("id_usaha", $id, 'usaha', $data);
            $this->session->set_flashdata("success", 'Surat Keterangan Usaha telah diperbaharui.');
            redirect("surat/usaha");  
        }
    }

    public function cetakUsaha($id){
        $data["judul"] = "Cetak Surat Keterangan Usaha";
        $data["usaha"] = $this->Saparung_model->joinSuratById("usaha", "id_usaha", $id);
        $this->load->library("pdf");
        $this->pdf->setFileName("usaha.pdf");
        $this->pdf->setPaper("A4", "potrait");
        $this->pdf->loadView('suratkeluar/usaha/cetak', $data);
    }
    //Surat Keterangan Usaha

    //Surat Keterangan Catatan Kepolisian
    public function kepolisian() {
        $data["title"] = "Surat Keluar";
        $data["judul"] = "Surat Keterangan Catatan Kepolisian";
        $email = $this->session->userdata("email");
        $data["user"] = $this->Saparung_model->getDataSesuai("user", "email", $email);
        $data["kepolisian"] = $this->Saparung_model->joinSurat("kepolisian", "id_kepolisian");

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('suratkeluar/kepolisian/index', $data);
        $this->load->view('templates/footer');
    }

    public function inputKepolisian() {
        $data["title"] = "Surat Keluar";
        $data["judul"] = "Input Surat Keterangan Catatan Kepolisian";
        $email = $this->session->userdata("email");
        $data["user"] = $this->Saparung_model->getDataSesuai("user", "email", $email);
        $data["data_penduduk"] = $this->Saparung_model->getData("data_penduduk");
        $data["kode"] = $this->Saparung_model->getKodeSurat("kepolisian", "kode");

        $this->form_validation->set_rules("kode", "Kode Surat", "required|trim");
        $this->form_validation->set_rules("dp", "Data Penduduk", "required");
        $this->form_validation->set_rules("keperluan", "Keperluan", "required|trim");

        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('suratkeluar/kepolisian/input', $data);
            $this->load->view('templates/footer');
        } else {
            $path = "assets/img/qr/kepolisian/";
            $image = $path.date("Ymd").$this->input->post("kode").".png";
            $tanggal = date('Y-m-d');
            $content = base_url("verifikasi/index/kepolisian/{$tanggal}/{$this->input->post('kode')}");
            QRcode::png($content,$image,QR_ECLEVEL_L,3);
            $data = [
                "tanggal"=> $tanggal,
                "kode" =>  $this->input->post("kode"),
                "nomor" =>  $this->input->post("nomor"),
                "data_id" =>  $this->input->post("dp"),
                "keperluan" => htmlspecialchars($this->input->post("keperluan",true)),
                "qr" => $image
            ];
            $this->Saparung_model->tambah('kepolisian', $data);
            $this->session->set_flashdata("success", 'Surat Keterangan Catatan Kepolisian baru ditambahkan.');
            redirect("surat/kepolisian");  
        }
    }
    
    public function deleteKepolisian($id){
        $delete = $this->Saparung_model->getDataSesuai("kepolisian", "id_kepolisian", $id);
        unlink($delete["qr"]);
        $this->Saparung_model->hapus("kepolisian", "id_kepolisian", $id);
        $this->session->set_flashdata("success", 'Surat Keterangan Catatan Kepolisian berhasil terhapus.');
        redirect("surat/kepolisian");  
    }

    public function editKepolisian($id) {
        $data["title"] = "Surat Keluar";
        $data["judul"] = "Edit Surat Keterangan Catatan Kepolisian";
        $email = $this->session->userdata("email");
        $data["user"] = $this->Saparung_model->getDataSesuai("user", "email", $email);
        $data["kepolisian"] = $this->Saparung_model->getDataSesuai("kepolisian", "id_kepolisian", $id);
        $data["data_penduduk"] = $this->Saparung_model->getData("data_penduduk");

        $this->form_validation->set_rules("dp", "Data Penduduk", "required");
        $this->form_validation->set_rules("keperluan", "Keperluan", "required|trim");

        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('suratkeluar/kepolisian/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "data_id" =>  $this->input->post("dp"),
                "keperluan" => htmlspecialchars($this->input->post("keperluan",true)),
            ];
            $id = $this->input->post("id");
            $this->Saparung_model->ubah("id_kepolisian", $id, 'kepolisian', $data);
            $this->session->set_flashdata("success", 'Surat Keterangan Catatan Kepolisian telah diperbaharui.');
            redirect("surat/kepolisian");  
        }
    }
    
    public function cetakKepolisian($id){
        $data["judul"] = "Cetak Surat Keterangan Catatan Kepolisian";
        $data["kepolisian"] = $this->Saparung_model->joinSuratById("kepolisian", "id_kepolisian", $id);
        $this->load->library("pdf");
        $this->pdf->setFileName("kepolisian.pdf");
        $this->pdf->setPaper("A4", "potrait");
        $this->pdf->loadView('suratkeluar/kepolisian/cetak', $data);
    }
    //Surat Keterangan Catatan Kepolisian
    
    //Surat Keterangan Domisili
    public function domisili() {
        $data["title"] = "Surat Keluar";
        $data["judul"] = "Surat Keterangan Domisili";
        $email = $this->session->userdata("email");
        $data["user"] = $this->Saparung_model->getDataSesuai("user", "email", $email);
        $data["domisili"] = $this->Saparung_model->joinSurat("domisili", "id_domisili");

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('suratkeluar/domisili/index', $data);
        $this->load->view('templates/footer');
    }

    public function inputDomisili() {
        $data["title"] = "Surat Keluar";
        $data["judul"] = "Input Surat Keterangan Domisili";
        $email = $this->session->userdata("email");
        $data["user"] = $this->Saparung_model->getDataSesuai("user", "email", $email);
        $data["data_penduduk"] = $this->Saparung_model->getData("data_penduduk");
        $data["kode"] = $this->Saparung_model->getKodeSurat("domisili", "kode");

        $this->form_validation->set_rules("dp", "Data Penduduk", "required");
        $this->form_validation->set_rules("keperluan", "Keperluan", "required|trim");

        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('suratkeluar/domisili/input', $data);
            $this->load->view('templates/footer');
        } else {
            $path = "assets/img/qr/domisili/";
            $image = $path.date("Ymd").$this->input->post("kode").".png";
            $tanggal = date('Y-m-d');
            $content = base_url("verifikasi/index/domisili/{$tanggal}/{$this->input->post('kode')}");
            QRcode::png($content,$image,QR_ECLEVEL_L,3);
            $data = [
                "tanggal"=> $tanggal,
                "kode" =>  $this->input->post("kode"),
                "nomor" =>  $this->input->post("nomor"),
                "data_id" =>  $this->input->post("dp"),
                "keperluan" => htmlspecialchars($this->input->post("keperluan",true)),
                "qr" => $image,
            ];
            $this->Saparung_model->tambah('domisili', $data);
            $this->session->set_flashdata("success", 'Surat Keterangan Domisili baru ditambahkan.');
            redirect("surat/domisili");  
        }
    }
    
    public function deleteDomisili($id){
        $delete = $this->Saparung_model->getDataSesuai("domisili","id_domisili", $id);
        unlink($delete["qr"]);
        $this->Saparung_model->hapus("domisili","id_domisili", $id);
        $this->session->set_flashdata("success", 'Surat Keterangan Domisili berhasil terhapus.');
        redirect("surat/domisili");  
    }

    public function editDomisili($id) {
        $data["title"] = "Surat Keluar";
        $data["judul"] = "Edit Surat Keterangan Domisili";
        $email = $this->session->userdata("email");
        $data["user"] = $this->Saparung_model->getDataSesuai("user", "email", $email);
        $data["domisili"] = $this->Saparung_model->getDataSesuai("domisili", "id_domisili", $id);
        $data["data_penduduk"] = $this->Saparung_model->getData("data_penduduk");

        $this->form_validation->set_rules("dp", "Data Penduduk", "required");
        $this->form_validation->set_rules("keperluan", "Keperluan", "required|trim");

        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('suratkeluar/domisili/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "data_id" =>  $this->input->post("dp"),
                "keperluan" => htmlspecialchars($this->input->post("keperluan",true)),
            ];
            $id = $this->input->post("id");
            $this->Saparung_model->ubah("id_domisili", $id, 'domisili', $data);
            $this->session->set_flashdata("success", 'Surat Keterangan Domisili telah diperbaharui.');
            redirect("surat/domisili");  
        }
    }
    
    public function cetakDomisili($id){
        $data["judul"] = "Cetak Surat Keterangan Domisili";
        $data["domisili"] = $this->Saparung_model->joinSuratById("domisili", "id_domisili", $id);
        $this->load->library("pdf");
        $this->pdf->setFileName("domisili.pdf");
        $this->pdf->setPaper("A4", "potrait");
        $this->pdf->loadView('suratkeluar/domisili/cetak', $data);
    }
    //Surat Keterangan Domisili

    
    // Surat Izin Keramaian

    public function keramaian() {
        $data["title"] = "Surat Keluar";
        $data["judul"] = "Surat Izin Acara Keramaian";
        $email = $this->session->userdata("email");
        $data["user"] = $this->Saparung_model->getDataSesuai("user", "email", $email);
        $data["keramaian"] = $this->Saparung_model->joinSurat("keramaian", "id_keramaian");

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('suratkeluar/keramaian/index', $data);
        $this->load->view('templates/footer');
    }

    public function inputkeramaian() {
        $data["title"] = "Surat Keluar";
        $data["judul"] = "Input Surat Izin Acara Keramaian";
        $email = $this->session->userdata("email");
        $data["user"] = $this->Saparung_model->getDataSesuai("user", "email", $email);
        $data["data_penduduk"] = $this->Saparung_model->getData("data_penduduk");
        $data["kode"] = $this->Saparung_model->getKodeSurat("keramaian", "kode");

        $this->form_validation->set_rules("kode", "Kode Surat", "required|trim");
        $this->form_validation->set_rules("dp", "Data Penduduk", "required");
        $this->form_validation->set_rules("jenis_kegiatan", "Jenis Kegiatan", "required|trim");
        $this->form_validation->set_rules("acara", "Untuk Acara", "required|trim");
        $this->form_validation->set_rules("tgl_acara", "Tanggal Acara", "required|trim");
        $this->form_validation->set_rules("jam", "Jam Acara", "required|trim");
        $this->form_validation->set_rules("tempat", "Tempat Acara", "required|trim");

        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('suratkeluar/keramaian/input', $data);
            $this->load->view('templates/footer');
        } else {
            $path = "assets/img/qr/keramaian/";
            $image = $path.date("Ymd").$this->input->post("kode").".png";
            $tanggal = date('Y-m-d');
            $content = base_url("verifikasi/index/keramaian/{$tanggal}/{$this->input->post('kode')}");
            QRcode::png($content,$image,QR_ECLEVEL_L,2);
            $data = [
                "tanggal"=> $tanggal,
                "kode" =>  $this->input->post("kode"),
                "data_id" =>  $this->input->post("dp"),
                "nomor" =>  $this->input->post("nomor"),
                "jenis_kegiatan" => htmlspecialchars($this->input->post("jenis_kegiatan",true)),
                "acara" => htmlspecialchars($this->input->post("acara",true)),
                "tgl_acara" => $this->input->post("tgl_acara",true),
                "jam" => htmlspecialchars($this->input->post("jam",true)),
                "tempat" => htmlspecialchars($this->input->post("tempat",true)),
                "qr" => $image
            ];
            $this->Saparung_model->tambah('keramaian', $data);
            $this->session->set_flashdata("success", 'Surat Izin Acara Keramaian baru ditambahkan.');
            redirect("surat/keramaian");  
        }
    }
    
    public function deletekeramaian($id){
        $delete = $this->Saparung_model->getDataSesuai("keramaian","id_keramaian", $id);
        unlink($delete["qr"]);
        $this->Saparung_model->hapus("keramaian","id_keramaian", $id);
        $this->session->set_flashdata("success", 'Surat Izin Acara Keramaian berhasil terhapus.');
        redirect("surat/keramaian");  
    }
    
    public function editkeramaian($id) {
        $data["title"] = "Surat Keluar";
        $data["judul"] = "Edit Surat Izin Acara Keramaian";
        $email = $this->session->userdata("email");
        $data["user"] = $this->Saparung_model->getDataSesuai("user", "email", $email);
        $data["keramaian"] = $this->Saparung_model->getDataSesuai("keramaian", "id_keramaian", $id);
        $data["data_penduduk"] = $this->Saparung_model->getData("data_penduduk");
        
        $this->form_validation->set_rules("dp", "Data Penduduk", "required");
        $this->form_validation->set_rules("jenis_kegiatan", "Jenis Kegiatan", "required|trim");
        $this->form_validation->set_rules("acara", "Untuk Acara", "required|trim");
        $this->form_validation->set_rules("tgl_acara", "Tanggal Acara", "required|trim");
        $this->form_validation->set_rules("jam", "Jam Acara", "required|trim");
        $this->form_validation->set_rules("tempat", "Tempat Acara", "required|trim");
        
        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('suratkeluar/keramaian/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "data_id" =>  $this->input->post("dp"),
                "jenis_kegiatan" => htmlspecialchars($this->input->post("jenis_kegiatan",true)),
                "acara" => htmlspecialchars($this->input->post("acara",true)),
                "tgl_acara" => $this->input->post("tgl_acara",true),
                "jam" => htmlspecialchars($this->input->post("jam",true)),
                "tempat" => htmlspecialchars($this->input->post("tempat",true)),
            ];
            $id = $this->input->post("id");
            $this->Saparung_model->ubah("id_keramaian", $id, "keramaian", $data);
            $this->session->set_flashdata("success", 'Surat Izin Acara Keramaian telah diperbaharui.');
            redirect("surat/keramaian");  
        }
    }
    
    public function cetakkeramaian($id){
        $data["judul"] = "Cetak Surat Izin Acara Keramaian";
        $data["keramaian"] = $this->Saparung_model->joinSuratById("keramaian", "id_keramaian", $id);
        $this->load->library("pdf");
        $this->pdf->setFileName("keramaian.pdf");
        $this->pdf->setPaper("Legal", "potrait");
        $this->pdf->loadView('suratkeluar/keramaian/cetak', $data);
    }
    // Surat Izin Keramaian

}
