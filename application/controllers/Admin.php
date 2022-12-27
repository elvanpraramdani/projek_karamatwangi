<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('HomeModel');
        is_loggin();
    }

    public function index()
    {

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Dashboard';

        $jumlah_warga = $this->db->query("SELECT COUNT(nama_warga) as jmlWarga FROM warga ");
        $jumlah_bansos = $this->db->query("SELECT COUNT(id_bansos) as jmlBansos FROM bansos ");
        $jumlah_laki = $this->db->query("SELECT COUNT(nama_warga) as jmlLaki FROM warga WHERE jk='L' ");
        $jumlah_pr = $this->db->query("SELECT COUNT(nama_warga) as jmlPr FROM warga WHERE jk='P' ");
        $jumlah_group = $this->db->query("SELECT COUNT(nama_warga) as jmlWarga1 FROM warga GROUP BY (jk) ");
        $jumlah_penerima = $this->db->query("SELECT COUNT(nik_warga) as jmlBansos FROM penerima_bansos GROUP BY(id_bansos)");
        $group_bansos = $this->db->query("SELECT * FROM penerima_bansos INNER JOIN bansos ON penerima_bansos.id_bansos=bansos.id_bansos GROUP BY(penerima_bansos.id_bansos)");

        $data['agama'] = $this->HomeModel->select_agama();
        $data['dusun'] = $this->HomeModel->select_dusun();
        $data['pekerjaan'] = $this->HomeModel->select_pekerjaan();
        $data['pendidikan'] = $this->HomeModel->select_pendidikan();
        $data['shdk'] = $this->HomeModel->select_shdk();
        $data['status'] = $this->HomeModel->select_status();

        $data['jml_warga']    = $jumlah_warga->result_array();
        $data['jml_laki']     = $jumlah_laki->result_array();
        $data['jml_pr']       = $jumlah_pr->result_array();
        $data['jml_warga1']   = $jumlah_group->result_array();
        $data['jml_penerima'] = $jumlah_penerima->result_array();
        $data['group_bansos'] = $group_bansos->result_array();
        $data['jml_bansos']   = $jumlah_bansos->result_array();

        $this->load->view('templates/header_admin', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/footer_admin', $data);
    }

    public function add()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = "Tambah Admin Baru";

        $this->load->view('templates/header_admin', $data);
        $this->load->view('admin/add_user', $data);
        $this->load->view('templates/footer_admin', $data);
    }

    public function create()
    {
        $this->HomeModel->create_admin();
        redirect('Admin/add');
    }

    public function profile()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = "Profile Admin";

        $this->load->view('templates/header_admin', $data);
        $this->load->view('admin/profile_admin', $data);
        $this->load->view('templates/footer_admin', $data);
    }

    public function update_user($id)
    {
        $this->HomeModel->update_user($id);
        redirect('Admin/profile');
    }

    public function create_data_warga()
    {
        $this->HomeModel->create_data_warga();
        redirect('Admin');
    }

    public function deletetambahanwarga($id)
    {
        $this->HomeModel->deletetambahanwarga($id);
        redirect('Admin');
    }
}
