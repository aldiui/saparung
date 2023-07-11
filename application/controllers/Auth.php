<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("Saparung_model");
    }
    
	public function index() {
        if($this->session->userdata("email")){
            redirect("user");
        }
        $this->form_validation->set_rules("email", "Email", "trim|required|valid_email");
        $this->form_validation->set_rules("password", "Password", "trim|required");

        if ($this->form_validation->run() == false) {
            $data["judul"] =  "Halaman Login";
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }
    
    private function _login(){
        if($this->session->userdata("email")){
            redirect("user");
        }
        $email = $this->input->post("email");
        $password = $this->input->post("password");
        $user = $this->Saparung_model->getDataSesuai('user', 'email', $email);
        
        if($user){
            if($user['is_active'] == 1){
                if(password_verify($password, $user['password'])){
                    $data = [
                        'email' => $user["email"],
                        'role_id' => $user["role_id"],
                    ];
                    $this->session->set_userdata($data);
                    if($user['role_id'] == 1){
                        $this->session->set_flashdata("success", 'Anda telah login');
                        redirect('admin');
                    } else {
                        $this->session->set_flashdata("success", 'Anda telah login');
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata("error", 'Password Salah!');
                    redirect("auth");
                }
            } else {
                $this->session->set_flashdata("error", 'Email Belum Terdaftar.');
                redirect("auth");
            }
        } else {
            $this->session->set_flashdata("error", 'Email Belum Terdaftar.');
            redirect("auth");
        }
    }
    

    private function _sendEmail($token, $type){
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'bismikaaldi@gmail.com',
            'smtp_pass' => 'ldldnypaaiqwoqiw',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->email->initialize($config);

        $this->email->from("bismikaaldi@gmail.com", "Aldi Jaya Mulyana");
        $this->email->to($this->input->post("email"));

        if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Klik tautan ini untuk reset password : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
    
    public function verify(){
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $user = $this->Saparung_model->getDataSesuai('user', 'email', $email);

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $data = [ "is_active" => 1 ];
                    $this->Saparung_model->ubah("email", $email, "user", $data);
                    $this->Saparung_model->hapus('user_token','email', $email);

                    $this->session->set_flashdata('success', ''.$email.' telah diaktifkan! Silahkan login');
                    redirect('auth');
                } else {
                    $this->Saparung_model->hapus('user','email', $email);
                    $this->Saparung_model->hapus('user_token','email', $email);

                    $this->session->set_flashdata('error', 'Aktivasi akun gagal! Token kedaluwarsa.');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('error', 'Aktivasi akun gagal! Token salah.');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('error', 'Aktivasi akun gagal! Email salah.');
            redirect('auth');
        }
    }

    public function logout() {
        $this->session->unset_userdata("email");
        $this->session->unset_userdata("role_id");
        $this->session->unset_userdata("csrf_token");
        $this->session->set_flashdata("success", 'Anda telah logout');
        redirect("auth");
    }

    public function blocked() {
        $data["judul"] =  "Akses di Blok!";
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/blocked');
        $this->load->view('templates/auth_footer');
    }

    public function forgotPassword(){
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Lupa Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/forgot-password');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->Saparung_model->getDataGanda("user", ['email' => $email, 'is_active' => 1] )->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->Saparung_model->tambah('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('success', 'Silakan periksa email Anda untuk reset password!');
                redirect('auth/forgotpassword');
            } else {
                $this->session->set_flashdata('error', 'Email tidak terdaftar atau tidak diaktifkan!');
                redirect('auth/forgotpassword');
            }
        }
    }

    public function resetPassword(){
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $user = $this->Saparung_model->getDataSesuai('user', 'email', $email);

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('error', 'Reset password gagal! token salah.');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('error', 'Reset password gagal! email salah.');
            redirect('auth');
        }
    }

    public function changePassword(){
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[8]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'trim|required|min_length[8]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Ubah Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/change-password');
            $this->load->view('templates/auth_footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');
            $data = ["password" => $password];
            $this->Saparung_model->ubah("email", $email, "user", $data);
            $this->session->unset_userdata('reset_email');
            $this->Saparung_model->hapus('user_token', 'email', $email);

            $this->session->set_flashdata('success', 'Password telah diubah! Silakan login.');
            redirect('auth');
        }
    }
}