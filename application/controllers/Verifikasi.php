<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifikasi extends CI_Controller {

    public function index($table, $tanggal, $kosut) {
        $data["judul"] = "Verifikasi Surat"; 
        $this->load->model("Saparung_model");
        $data["data"] = $this->Saparung_model->verifikasi($table, $tanggal, $kosut);
        if($table == "kematian"){
            $data["surat"] = "Surat Keterangan Kematian";
        } elseif ($table == "taksiran_tanah"){
            $data["surat"] = "Surat Keterangan Taksiran Tanah";
        } elseif ($table == "usaha"){
            $data["surat"] = "Surat Keterangan Usaha";
        } elseif ($table == "kepolisian"){
            $data["surat"] = "Surat Keterangan Catatan Kepolisian";
        } elseif ($table == "domisili"){
            $data["surat"] = "Surat Keterangan Domisili";
        } elseif ($table == "keramaian"){
            $data["surat"] = "Surat Izin Acara Keramaian";
        }
        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/verifikasi', $data);
        $this->load->view('templates/auth_footer', $data);
    }

    public function laporan($laporan) {
        if($laporan == "masuk"){
            $data["judul"] = "Laporan Surat Masuk"; 
        } elseif ($laporan == "keluar"){
            $data["judul"] = "Laporan Surat Keluar"; 
        }
        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/laporan', $data);
        $this->load->view('templates/auth_footer', $data);
    }
}
