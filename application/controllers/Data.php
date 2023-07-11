<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

    public function __construct(){
        parent::__construct();
        is_logged_in();
        $this->load->model("Saparung_model");
    }

    public function index() {
        $data["title"] = "Data Penduduk";
        $data["judul"] = "Data Penduduk";
        $email = $this->session->userdata("email");
        $data["user"] = $this->Saparung_model->getDataSesuai("user", "email", $email);
        $data["data_penduduk"] = $this->Saparung_model->getData("data_penduduk");

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/index', $data);
        $this->load->view('templates/footer');
    }

    public function inputDataPenduduk() {
        $data["title"] = "Data Penduduk";
        $data["judul"] = "Input Data Penduduk";
        $email = $this->session->userdata("email");
        $data["user"] = $this->Saparung_model->getDataSesuai("user", "email", $email);
        $user = $this->Saparung_model->getDataSesuai("user", "email", $email);
        $data["jk"] = ["Laki - Laki", "Perempuan"];
        $data["status"] = ["Belum Menikah", "Menikah", "Bercerai"];
        $data["agama"] = ["Islam", "Kristen", "Katholik", "Budha", "Hindu", "Konghucu"];
        $data["pendidikan"] = ["TIDAK SEKOLAH","SD", "SMP", "SMA", "SMK", "MI", "MTS", "MA", "D1", "D2", "D3", "D4", "S1", "S2", "S3"];

        $this->form_validation->set_rules("nik", "NIK", "required|trim|numeric|min_length[16]|max_length[16]|is_unique[data_penduduk.nik]", [
            "is_unique" => "NIK ini sudah terdata!",
        ]);
        $this->form_validation->set_rules("nama", "Nama", "required|trim");
        $this->form_validation->set_rules("jk", "Jenis Kelamin", "required|trim");
        $this->form_validation->set_rules("tempat_lhr", "Tempat Lahir", "required|trim");
        $this->form_validation->set_rules("tgl_lhr", "Tanggal Lahir", "required|trim");
        $this->form_validation->set_rules("agama", "Agama", "required|trim");
        $this->form_validation->set_rules("pendidikan", "pendidikan", "required|trim");
        $this->form_validation->set_rules("alamat", "Alamat", "required|trim");
        $this->form_validation->set_rules("status", "Status", "required|trim");
        $this->form_validation->set_rules("pekerjaan", "Pekerjaan", "required|trim");
        $this->form_validation->set_rules("ortu", "Orang Tua", "required|trim");
        
        if ($this->form_validation->run() == false){
        $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('data/input', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "nik" => htmlspecialchars($this->input->post("nik", true)),
                "nama" => htmlspecialchars($this->input->post("nama", true)),
                "jk" => $this->input->post("jk"),
                "tempat_lhr" => htmlspecialchars($this->input->post("tempat_lhr", true)),
                "tgl_lhr" => $this->input->post("tgl_lhr", true),
                "agama" => $this->input->post("agama"),
                "pendidikan" => $this->input->post("pendidikan"),
                "alamat" => htmlspecialchars($this->input->post("alamat",true)),
                "status" => $this->input->post("status"),
                "pekerjaan" => htmlspecialchars($this->input->post("pekerjaan",true)),
                "ortu" => htmlspecialchars($this->input->post("ortu",true)),
                "user_id" => $user["id_user"],
            ];
            $this->Saparung_model->tambah('data_penduduk', $data);
            $this->session->set_flashdata("success", 'Data Penduduk baru ditambahkan.');
            redirect("data");  
        }
    }
    
    public function deleteDataPenduduk($id){
        $this->Saparung_model->hapus("data_penduduk", "id_data", $id);
        $this->session->set_flashdata("success", 'Data Penduduk berhasil terhapus.');
        redirect("data");  
    }

    public function editDataPenduduk($id) {
        $data["title"] = "Data Penduduk";
        $data["judul"] = "Edit Data Penduduk";
        $email = $this->session->userdata("email");
        $data["user"] = $this->Saparung_model->getDataSesuai("user", "email", $email);
        $data["data_penduduk"] = $this->Saparung_model->getDataSesuai("data_penduduk", "id_data", $id);
        $data["jk"] = ["Laki - Laki", "Perempuan"];
        $data["status"] = ["Belum Menikah", "Menikah", "Bercerai"];
        $data["agama"] = ["Islam", "Kristen", "Katholik", "Budha", "Hindu", "Konghucu"];
        $data["pendidikan"] = ["SD", "SMP", "SMA", "SMK", "MI", "MTS", "MA", "D1", "D2", "D3", "D4", "S1", "S2", "S3"];
        
        $this->form_validation->set_rules("nik", "NIK", "required|trim|numeric|min_length[16]|max_length[16]");
        $this->form_validation->set_rules("nama", "Nama", "required");
        $this->form_validation->set_rules("jk", "Jenis Kelamin", "required|trim");
        $this->form_validation->set_rules("tempat_lhr", "Tempat Lahir", "required|trim");
        $this->form_validation->set_rules("tgl_lhr", "Tanggal Lahir", "required|trim");
        $this->form_validation->set_rules("agama", "Agama", "required|trim");
        $this->form_validation->set_rules("pendidikan", "pendidikan", "required|trim");
        $this->form_validation->set_rules("alamat", "Alamat", "required|trim");
        $this->form_validation->set_rules("status", "Status", "required|trim");
        $this->form_validation->set_rules("pekerjaan", "Pekerjaan", "required|trim");
        $this->form_validation->set_rules("ortu", "Orang Tua", "required|trim");

        
        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('data/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "nik" => htmlspecialchars($this->input->post("nik", true)),
                "nama" => htmlspecialchars($this->input->post("nama", true)),
                "jk" => $this->input->post("jk"),
                "tempat_lhr" => htmlspecialchars($this->input->post("tempat_lhr", true)),
                "tgl_lhr" => $this->input->post("tgl_lhr", true),
                "agama" => $this->input->post("agama"),
                "pendidikan" => $this->input->post("pendidikan"),
                "alamat" => htmlspecialchars($this->input->post("alamat",true)),
                "status" => $this->input->post("status"),
                "pekerjaan" => $this->input->post("pekerjaan",true),
                "ortu" => htmlspecialchars($this->input->post("ortu",true)),
            ];
            $id = $this->input->post("id");
            $this->Saparung_model->ubah("id_data", $id, "data_penduduk", $data);
            $this->session->set_flashdata("success", 'Data Penduduk  telah diperbaharui!');
            redirect("data");  
        }
    }
    
}
