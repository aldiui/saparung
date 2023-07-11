<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct(){
        parent::__construct();
        is_logged_in();
        $this->load->model("Saparung_model");
    }

    public function index() {
        $data["judul"] = "Dashboard";
        $data["title"] = "Dashboard";
        $email = $this->session->userdata("email");
        $data["user"] = $this->Saparung_model->getDataSesuai("user", "email", $email);
        $tahun = date('Y');
        $data["staff_desa"] = $this->Saparung_model->getTotalSesuai("user", ["role_id" => 2]);
        $data["data_penduduk"] = $this->Saparung_model->getTotal("data_penduduk");
        $data["laki"] = $this->Saparung_model->getTotalSesuai("data_penduduk", ["jk" => "Laki - Laki"]);
        $data["perempuan"] = $this->Saparung_model->getTotalSesuai("data_penduduk", ["jk" => "Perempuan"]);
        $data["surat_masuk"] = $this->Saparung_model->getTotalSesuai("surat_masuk", ["YEAR(tgl_terima)" => $tahun]);
    
        for ($i = 1; $i <= 12; $i++) {
            $query = $this->Saparung_model->getTotalSurat("surat_masuk", $i);
            $data["sm_" . strtolower(date('M', strtotime("2000-$i-01")))] = $query;
        }

        $domisili = [];
        for ($bulan = 1; $bulan <= 12; $bulan++) {
            $query = $this->Saparung_model->getTotalSuratKeluar("domisili", $bulan);
            $domisili[$bulan] = $query;
        }
        
        $kematian = [];
        for ($bulan = 1; $bulan <= 12; $bulan++) {
            $query = $this->Saparung_model->getTotalSuratKeluar("kematian", $bulan);
            $kematian[$bulan] = $query;
        }

        $kepolisian = [];
        for ($bulan = 1; $bulan <= 12; $bulan++) {
            $query = $this->Saparung_model->getTotalSuratKeluar("kepolisian", $bulan);
            $kepolisian[$bulan] = $query;
        }

        $keramaian = [];
        for ($bulan = 1; $bulan <= 12; $bulan++) {
            $query = $this->Saparung_model->getTotalSuratKeluar("keramaian", $bulan);
            $keramaian[$bulan] = $query;
        }

        $usaha = [];
        for ($bulan = 1; $bulan <= 12; $bulan++) {
            $query = $this->Saparung_model->getTotalSuratKeluar("usaha", $bulan);
            $usaha[$bulan] = $query;
        }

        $taksirantanah = [];
        for ($bulan = 1; $bulan <= 12; $bulan++) {
            $query = $this->Saparung_model->getTotalSuratKeluar("taksiran_tanah", $i);
            $taksirantanah[$bulan] = $query;
        }

    
        $bulan = ["jan", "feb", "mar", "apr", "may", "jun", "jul", "aug", "sep", "oct", "nov", "dec"];
        for ($i = 0; $i < count($bulan); $i++) {
            $data["sk_" . $bulan[$i]] = $domisili[$i+1] + $kematian[$i+1] + $kepolisian[$i+1] + $keramaian[$i+1] + $taksirantanah[$i+1] + $usaha[$i+1];
        }
        
        $data["surat_keluar"] = array_sum($domisili) + array_sum($kematian) + array_sum($kepolisian) + array_sum($keramaian) + array_sum($taksirantanah) + array_sum($usaha);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/admin_footer', $data);
    }
    
    public function role() {
        $data["judul"] = "Role";
        $data["title"] = "Role";
        $email = $this->session->userdata("email");
        $data["user"] = $this->Saparung_model->getDataSesuai("user", "email", $email);
        $data["role"] = $this->Saparung_model->getData("user_role");
        $this->form_validation->set_rules("role", "Role", "required|trim");
        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer');
        } else {
            $data = ['role' => htmlspecialchars($this->input->post('role', true))];
            $this->Saparung_model->tambah('user_role', $data);
            $this->session->set_flashdata("success", 'Role baru ditambahkan.');
            redirect("admin/role");
        };
    }

    public function deleteRole($id){
        $this->Saparung_model->hapus("user_role", "id_role", $id);
        $this->session->set_flashdata("success", 'Role berhasil terhapus.');
        redirect("admin/role");
    }
    
    public function editRole($id){
        $data["title"] = "Role";
        $data["judul"] = "Edit Role";
        $email = $this->session->userdata("email");
        $data["user"] = $this->Saparung_model->getDataSesuai("user", "email", $email);
        $data["role"] = $this->Saparung_model->getDataSesuai("user_role", "id_role", $id);

        $this->form_validation->set_rules("role", "Role", "required|trim");
        if($this->form_validation->run() ==  false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edit-role', $data);
            $this->load->view('templates/footer');
        } else {
            $id =  $this->input->post("id");
            $data = ['role' => htmlspecialchars($this->input->post('role', true))];
            $this->Saparung_model->ubah("id_role" , $id, "user_role", $data);
            $this->session->set_flashdata("success", 'Role telah diperbaharui!');            
            redirect("admin/role");
        }
    }

    public function roleAccess($role_id) {
        $data["title"] = "Role";
        $data["judul"] = "Akses Role";
        $email = $this->session->userdata("email");
        $data["user"] = $this->Saparung_model->getDataSesuai("user", "email", $email);
        $data["role"] = $this->Saparung_model->getDataSesuai("user_role", "id_role", $role_id);
        $data["menu"] = $this->Saparung_model->getDataNot("id_menu", "user_menu");

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function changeAccess() {
        $menu_id = $this->input->post("menuId");
        $role_id = $this->input->post("roleId");
        $data = [
            "role_id" => $role_id,
            "menu_id" => $menu_id
        ];
        $result = $this->Saparung_model->getDataGanda("user_access_menu", $data);
    
        if($result->num_rows() < 1){
            $this->Saparung_model->tambahAkses($data);
        } else {
            $this->Saparung_model->hapusAkses($data);
        }

        $this->session->set_flashdata("success", 'Akses Diubah!'); 
    }

    
    public function staff() {
        $data["title"] = "Staff Desa";
        $data["judul"] = "Staff Desa";
        $email = $this->session->userdata("email");
        $data["user"] = $this->Saparung_model->getDataSesuai("user", "email", $email);
        $data["staff"] = $this->Saparung_model->getDataNot("role_id", "user");

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/staff', $data);
        $this->load->view('templates/footer');
    }

    public function inputStaff() {
        $data["title"] = "Staff Desa";
        $data["judul"] = "Input Staff Desa";
        $email = $this->session->userdata("email");
        $data["user"] = $this->Saparung_model->getDataSesuai("user", "email", $email);
        
        $this->form_validation->set_rules("name", "Name", "required|trim");
        $this->form_validation->set_rules("email", "Email", "required|trim|valid_email|is_unique[user.email]", [
            "is_unique" => "Email ini sudah terdaftar!",
        ]);
        $this->form_validation->set_rules("password1", "Password", "required|trim|min_length[8]|matches[password2]", [
            "matches" => "Password tidak cocok!",
            "min_length" => "Password terlalu pendek!"
        ]);
        $this->form_validation->set_rules("password2", "Konfirmasi Password", "required|trim|min_length[8]|matches[password1]");
        $this->form_validation->set_rules("jabatan", "Jabatan", "required|trim");
        
        if ($this->form_validation->run() == false){
        $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/inputstaff', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "name" => htmlspecialchars($this->input->post("name", true)),
                "email" =>  htmlspecialchars($this->input->post("email", true)),
                "image" => "default.jpg",
                "password" => password_hash($this->input->post("password1"), PASSWORD_DEFAULT),
                "role_id" => 2,
                "is_active" => 0,
                "date_created" => time(),
                "jabatan" => htmlspecialchars($this->input->post("jabatan", true))
            ];

            $token = base64_encode(random_bytes(32));
            $user_token = [
                "email" => $this->input->post("name", true),
                "token" => $token,
                "date_created" => time()
            ];

            $this->Saparung_model->tambah('user', $data);
            $this->Saparung_model->tambah('user_token', $user_token);

            $this->_sendEmail($token, "verify", $this->input->post("password1"));

            $this->session->set_flashdata("success", 'Akun Staff Desa telah dibuat.');
            redirect("admin/staff");  
        }
    }

    private function _sendEmail($token, $type, $password){
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'bismikaaldi@gmail.com',
            'smtp_pass' => 'rvxxezqyyqomtfni',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->email->initialize($config);

        $this->email->from("bismikaaldi@gmail.com", "Aldi Jaya Mulyana");
        $this->email->to($this->input->post("email"));

        if ($type == 'verify') {
            $this->email->subject('Verifikasi Akun');
            $this->email->message('Akun dengan email ' .$this->input->post('email').' dan Password '.$password.' <br> telah terdaftar di Sistem Administrasi Desa Parung (SAPARUNG): <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Klik Aktivasi Akun</a>');
        } 

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function deleteStaff($id){
        $this->Saparung_model->hapus("user", "id_user", $id);
        $this->session->set_flashdata("success", 'Akun Staff Desa berhasil terhapus.');
        redirect("admin/staff");  
    }

    public function editStaff($id){
        $data["title"] = "Staff Desa";
        $data["judul"] = "Edit Akun Staff Desa";
        $email = $this->session->userdata("email");
        $data["user"] = $this->Saparung_model->getDataSesuai("user", "email", $email);
        $data["staff"] = $this->Saparung_model->getDataSesuai("user", "id_user", $id);

        $this->form_validation->set_rules("name", "Name", "required|trim");
        $this->form_validation->set_rules("email", "Email", "required|trim|valid_email");
        $this->form_validation->set_rules("jabatan", "Jabatan", "required|trim");

        if($this->form_validation->run() ==  false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/editstaff', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "name" => htmlspecialchars($this->input->post("name", true)),
                "email" =>  htmlspecialchars($this->input->post("email", true)),
                "jabatan" => htmlspecialchars($this->input->post("jabatan", true)),
                "is_active" => $this->input->post("is_active")
            ];
            $id = $this->input->post("id");
            $this->Saparung_model->ubah("id_user", $id, "user", $data);
            $this->session->set_flashdata("success", 'Akun Staff telah diperbaharui!');            
            redirect("admin/staff");
        }
    }
}
