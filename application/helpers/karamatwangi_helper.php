<?php

function check_access($nik, $id_bansos)
{
    $ci = get_instance();

    //ambil nilainya dari check_access
    $ci->db->where('nik_warga', $nik);
    $ci->db->where('id_bansos', $id_bansos);
    $result = $ci->db->get('penerima_bansos');

    //cek didatabase jika ada maka di check
    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}

function is_loggin()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect("Auth/login");
    }
}
