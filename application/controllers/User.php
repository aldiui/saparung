<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct(){
        parent::__construct();
        is_logged_in();
        $this->load->model("Saparung_model");
    }

    public function index() {
        $data["title"] = "Profil";
        $data["judul"] = "Profil";
        $email = $this->session->userdata("email");
        $data["user"] = $this->Saparung_model->getDataSesuai("user", "email", $email);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit() {
        $data["title"] = "Profil";
        $data["judul"] = "Profil";
        $email = $this->session->userdata("email");
        $data["user"] = $this->Saparung_model->getDataSesuai("user", "email", $email);

        $this->form_validation->set_rules("name", "Nama Lengkap", "required|trim");
        $this->form_validation->set_rules("jabatan", "Jabatan", "required|trim");
        
        if($this->form_validation->run() ==  false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/index', $data);
            $this->load->view('templates/footer');
        } else {
            $name = htmlspecialchars($this->input->post("name"));
            $email = htmlspecialchars($this->input->post("email"));
            $jabatan = htmlspecialchars($this->input->post("jabatan"));
            
            $upload_image = $_FILES["image"]["name"];
            if($upload_image) {
                $config["allowed_types"] = "gif|jpg|png|jpeg";
                $config["max_size"] = "2048";
                $config["upload_path"] = "./assets/img/profile/";
                
                $this->load->library("upload", $config);
                
                if($this->upload->do_upload("image")) {
                    $old_image = $data["user"]["image"];
                    if($old_image != "default.jpg"){
                        unlink(FCPATH."assets/img/profile/".$old_image);
                    }
                    $new_image = ["image" => $this->upload->data("file_name")];
                    $this->Saparung_model->ubah("email", $email, "user", $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $data = [ 
                "name" => $name,
                "jabatan" => $jabatan,
            ];
            $this->Saparung_model->ubah("email", $email, "user", $data);
            $this->session->set_flashdata("success", 'Profil telah diperbaharui!');            
            redirect("user");
        }
    }
    
    public function changePassword() {
        $data["title"] = "Profil";
        $data["judul"] = "Profil";
        $email = $this->session->userdata("email");
        $data["user"] = $this->Saparung_model->getDataSesuai("user", "email", $email);

        $this->form_validation->set_rules("current_password", "Password Lama", "required|trim");
        $this->form_validation->set_rules("new_password1", "Password Baru", "required|trim|min_length[8]|matches[new_password2]");
        $this->form_validation->set_rules("new_password2", "Konfirmasi Password", "required|trim|min_length[8]|matches[new_password1]");
        
        if($this->form_validation->run() ==  false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/index', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = htmlspecialchars($this->input->post("current_password"));
            $new_password = htmlspecialchars($this->input->post("new_password1"));
        
            if(!password_verify($current_password, $data["user"]["password"])){
                $this->session->set_flashdata("error", 'Password salah!');            
                redirect("user/index") ;
            } else {
                if ($current_password == $new_password){
                    $this->session->set_flashdata("error", 'Password baru tidak sama!');            
                    redirect("user/index") ;
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $data = ["password" => $password_hash];
                    $this->Saparung_model->ubah("email", $email, "user", $data);
                    $this->session->set_flashdata("success", 'Password telah diubah!');            
                    redirect("user/index");
                }
            }
        }    
    }
}
