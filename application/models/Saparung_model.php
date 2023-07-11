<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saparung_model extends CI_Model {

    public function getSubMenu() {
        $this->db->select('*');
        $this->db->from("user_sub_menu");
        $this->db->join("user_menu", "user_menu.id_menu = user_sub_menu.menu_id");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getKodeSurat($table, $kosut){
        $this->db->select('RIGHT('.$table.'.'.$kosut.',3) as '.$kosut, FALSE);
        $tahun = date("Y");
        $this->db->where('YEAR(tanggal)', $tahun);
        $this->db->order_by($kosut,'DESC');    
        $this->db->limit(1);    
        $query = $this->db->get($table);
            if($query->num_rows() <> 0){      
                $data = $query->row();
                $kosut = intval($data->$kosut) + 1; 
            }
            else{      
                $kosut = 1;  
            }
        $batas = str_pad($kosut, 3, "0", STR_PAD_LEFT);    
        $kodetampil = $batas;
        return $kodetampil;  
    }

    public function getData($table){
        return $this->db->get($table)->result_array();
    }

    public function getDataNot($id, $table){
        $this->db->where("{$id} !=", 1);
        return $this->db->get($table)->result_array();
    }

    public function getDataSesuai($table, $cari, $data){
        return $this->db->get_where($table, [$cari => $data])->row_array();
    }

    public function getDataGanda($table, $data){
        return $this->db->get_where($table, $data);
    }

    public function getTotal($table){
        return $this->db->get($table)->num_rows();
    }

    public function getTotalSesuai($table, $data){
        return $this->db->get_where($table, $data)->num_rows();
    }

    public function getTotalSurat($table, $bulan){
        $tahun = date('Y');
        return $this->db->get_where($table, [
            "MONTH(tgl_terima)" => $bulan, 
            "YEAR(tgl_terima)" => $tahun 
        ])->num_rows();
    }

    public function getTotalSuratKeluar($table, $bulan){
        $tahun = date('Y');
        return $this->db->get_where($table, [
            "MONTH(tanggal)" => $bulan, 
            "YEAR(tanggal)" => $tahun 
        ])->num_rows();
    }

    public function tambah($table, $data){
        $this->db->insert($table, $data);
    }
    
    public function tambahAkses($data){
        $this->db->insert("user_access_menu", $data);
    }
    
    public function hapus($table, $cari, $id){
        $this->db->delete($table, [$cari => $id]);
    }

    public function hapusAkses($data){
        $this->db->delete("user_access_menu", $data);
    }

    public function ubah($cari, $id, $table, $data){
        $this->db->where($cari, $id);
        $this->db->update($table, $data);
    }

    public function verifikasi($table, $tanggal, $kosut){
        $this->db->where("tanggal", $tanggal);
        $this->db->where("kode", $kosut);
        return $this->db->get($table)->row_array();
    }

    public function joinSurat($table, $order){
        $this->db->select('*');
        $this->db->from("data_penduduk");
        $this->db->join($table, "$table.data_id = data_penduduk.id_data");
        $tahun = date("Y");
        $this->db->order_by($order, 'DESC');
        $this->db->where('YEAR(tanggal)', $tahun);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function joinSuratById($table, $cari, $value){
        $this->db->select('*');
        $this->db->from("data_penduduk");
        $this->db->join($table, "$table.data_id = data_penduduk.id_data");
        $this->db->where("$table.$cari", $value);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function joinSuratKeluarTahun($table, $tahun){
        $this->db->select('*');
        $this->db->from("data_penduduk");
        $this->db->join($table, "$table.data_id = data_penduduk.id_data");
        $this->db->where('YEAR(tanggal)', $tahun);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function joinSuratKeluarBulan($table, $tahun, $bulan){
        $this->db->select('*');
        $this->db->from("data_penduduk");
        $this->db->join($table, "$table.data_id = data_penduduk.id_data");
        $this->db->where('YEAR(tanggal)', $tahun);
        $this->db->where('MONTH(tanggal)', $bulan);
        $query = $this->db->get();
        return $query->result_array();
    }
}
