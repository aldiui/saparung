<?php

function is_logged_in() {
    $ci = get_instance();
    if(!$ci->session->userdata("email")){
        redirect("auth");
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);
        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu["id_menu"];
        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id, 
            'menu_id' => $menu_id
        ]);
        
        if($userAccess->num_rows() < 1){
            redirect("auth/blocked");
        }
    }
}

function security_assets() {
    $ci = get_instance();
    if(!$ci->session->userdata("email")){
        redirect("auth");
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);
        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu["id_menu"];
        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id, 
            'menu_id' => $menu_id
        ]);
        
        if($userAccess->num_rows() < 1){
            redirect("auth/blocked");
        }
    }
}

function check_access($role_id, $menu_id) {
    $ci = get_instance();
    $result = $ci->db->get_where("user_access_menu", [
        "role_id" => $role_id,
        "menu_id" => $menu_id
    ]);

    if($result->num_rows() > 0){
        return "checked='chechked'";
    }
}

function getRomawi($bln){
    switch ($bln) {
        case 1:
            return "I";
            break;
        case 2:
            return "II";
            break;
        case 3:
            return "III";
            break;
        case 4:
            return "IV";
            break;
        case 5:
            return "V";
            break;
        case 6:
            return "VI";
            break;
        case 7:
            return "VII";
            break;
        case 8:
            return "VIII";
            break;
        case 9:
            return "IX";
            break;
        case 10:
            return "X";
            break;
        case 11:
            return "XI";
            break;
        case 12:
            return "XII";
            break;
    }
} 

function convertDateDBtoIndo($string){
    $bulanIndo = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September' , 'Oktober', 'November', 'Desember'];

    $tanggal = explode("-", $string)[2];
    $bulan = explode("-", $string)[1];
    $tahun = explode("-", $string)[0];
    return $tanggal . " " . $bulanIndo[abs($bulan)] . " " . $tahun;
}

function manipulasiBulan($bln,$jumlah,$format){
    $currentBulan = $bln;
    return date('Y-m-d', strtotime($jumlah.' '.$format, strtotime($currentBulan)));
}

function getDayIndonesia($date){
    if($date != '0000-00-00'){
        $data = hari(date('D', strtotime($date)));
    } else {
        $data = '-';
    }
    return $data;
}

function hari($day) {
    $hari = $day;

    switch ($hari) {
        case "Sun":
            $hari = "Minggu";
            break;
        case "Mon":
            $hari = "Senin";
            break;
        case "Tue":
            $hari = "Selasa";
            break;
        case "Wed":
            $hari = "Rabu";
            break;
        case "Thu":
            $hari = "Kamis";
            break;
        case "Fri":
            $hari = "Jum'at";
            break;
        case "Sat":
            $hari = "Sabtu";
            break;
    }
    return $hari;
}

function kades() {
    return "H. Karsono";
}

function linkqr() {
    return "C://laragon/www/saparung/";
}

if(!function_exists("get_csrf")){
    function get_csrf() {
        $ci = get_instance();
        if(!$ci->session->csrf_token){
            $ci->session->csrf_token = hash('sha1', time());
        }
        return $ci->session->csrf_token;
    }
}

if (!function_exists("get_name_csrf")) {
    function get_name_csrf(){
        return "token";
    }
}

if (!function_exists("check_csrf")) {
    function check_csrf(){
        $ci = get_instance();
        if ($ci->input->post("token") != $ci->session->csrf_token or !$ci->input->post("token") or !$ci->session->csrf_token) {
            $ci->session->unset_userdata("csrf_token");
            redirect("notfound");
            return false;
        } 
    }
}

function csrf(){
    return '<input type="hidden" name="'.get_name_csrf().'" value="'.get_csrf().'">';
}