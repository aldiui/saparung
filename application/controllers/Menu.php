<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

    public function __construct(){
        parent::__construct();
        is_logged_in();
        $this->load->model("Saparung_model");
    }

    public function index() {
        $data["title"] = "Manajemen Menu";
        $data["judul"] = "Manajemen Menu";
        $email = $this->session->userdata("email");
        $data["user"] = $this->Saparung_model->getDataSesuai("user", "email", $email);
        $data["menu"] = $this->Saparung_model->getData("user_menu");
        $this->form_validation->set_rules("menu", "Menu", "required|trim");
        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = ['menu' => htmlspecialchars($this->input->post('menu',true))];
            $this->Saparung_model->tambah('user_menu', $data);
            $this->session->set_flashdata("success", 'Menu baru ditambahkan.');
            redirect("menu");  
        }
    }

    public function deleteMenu($id){
        $this->Saparung_model->hapus("user_menu","id_menu", $id);
        $this->session->set_flashdata("success", 'Menu berhasil terhapus.');
        redirect("menu");
    }

    public function editMenu($id){
        $data["title"] = "Manajemen Menu";
        $data["judul"] = "Edit Menu";
        $email = $this->session->userdata("email");
        $data["user"] = $this->Saparung_model->getDataSesuai("user", "email", $email);
        $data["menu"] =$this->Saparung_model->getDataSesuai('user_menu','id_menu', $id);

        $this->form_validation->set_rules("menu", "Menu", "required|trim");
        if($this->form_validation->run() ==  false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/edit-menu', $data);
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post("id");
            $data = ['menu' => htmlspecialchars($this->input->post('menu',true))];
            $this->Saparung_model->ubah("id_menu", $id, "user_menu", $data);
            $this->session->set_flashdata("success", 'Menu telah diperbaharui!');            
            redirect("menu");
        }
    }
    
    public function submenu() {
        $data["title"] = "Manajemen Submenu";
        $data["judul"] = "Manajemen Submenu";
        $email = $this->session->userdata("email");
        $data["user"] = $this->Saparung_model->getDataSesuai("user", "email", $email);
        $data["subMenu"] = $this->Saparung_model->getSubMenu();
        $data["menu"] = $this->Saparung_model->getData("user_menu");

        $this->form_validation->set_rules("title", "Title", "required|trim");
        $this->form_validation->set_rules("menu_id", "Menu_id", "required");
        $this->form_validation->set_rules("url", "URL", "required|trim");
        $this->form_validation->set_rules("icon", "Icon", "required|trim");

        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "title" => htmlspecialchars($this->input->post("title", true)),
                "menu_id" => $this->input->post("menu_id"),
                "url" => htmlspecialchars($this->input->post("url",true)),
                "icon" => htmlspecialchars($this->input->post("icon",true)),
                "is_active" => $this->input->post("is_active")
            ];
            $this->Saparung_model->tambah('user_sub_menu', $data);
            $this->session->set_flashdata("success", 'Submenu baru ditambahkan.');
            redirect("menu/submenu");  
        }
    }

    public function deleteSubMenu($id){
        $this->Saparung_model->hapus("user_sub_menu","id_submenu", $id);
        $this->session->set_flashdata("success", 'Submenu berhasil terhapus.');
        redirect("menu/submenu");
    }

    public function editSubMenu($id){
        $data["title"] = "Manajemen Submenu";
        $data["judul"] = "Edit Submenu";
        $email = $this->session->userdata("email");
        $data["user"] = $this->Saparung_model->getDataSesuai("user", "email", $email);
        $data["submenu"] = $this->Saparung_model->getDataSesuai("user_sub_menu", "id_submenu", $id);
        $data["subMenu"] = $this->Saparung_model->getSubMenu();
        $data["menu"] = $this->Saparung_model->getData("user_menu");

        $this->form_validation->set_rules("title", "Title", "required|trim");
        $this->form_validation->set_rules("url", "Url", "required|trim");
        $this->form_validation->set_rules("icon", "Icon", "required|trim");
        if($this->form_validation->run() ==  false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/edit-submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "title" => htmlspecialchars($this->input->post("title", true)),
                "menu_id" => $this->input->post("menu_id"),
                "url" => htmlspecialchars($this->input->post("url",true)),
                "icon" => htmlspecialchars($this->input->post("icon",true)),
                "is_active" => $this->input->post("is_active")
            ];
            $id = $this->input->post("id");
            $this->Saparung_model->ubah("id_submenu", $id, "user_sub_menu", $data);
            $this->session->set_flashdata("success", 'Submenu telah diperbaharui!');            
            redirect("menu/submenu");
        }
    }
}
