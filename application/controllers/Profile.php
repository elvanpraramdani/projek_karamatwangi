<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_loggin();
    }
    public function index()
    {
        $this->load->model('HomeModel');
        $data['title'] = 'Profile Desa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['profile'] = $this->HomeModel->select_profile();
        $this->load->view('templates/header_admin', $data);
        $this->load->view('profile/index', $data);
        $this->load->view('templates/footer_admin', $data);
    }

    public function edit($id)
    {
        $this->load->model('HomeModel');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Edit Profile';
        $data['profile'] = $this->HomeModel->select_profile_id($id);

        if (!isset($_POST['update'])) {
            $this->load->view('templates/header_admin', $data);
            $this->load->view('profile/edit_profile', $data);
            $this->load->view('templates/footer_admin', $data);
        } else {
            $sub = htmlspecialchars($this->input->post('sub_kategori_profile'));
            $deskripsi = htmlspecialchars($this->input->post("deskripsi_profile"));
            $data = [
                'deskripsi_profile' => $deskripsi
            ];
            $this->db->where('id_profile', $id);
            $update = $this->db->update('profile_desa', $data);
            if ($update) {
                $this->session->set_flashdata('profile', 'Data berhasil diperbaharui');
                redirect('Profile/edit/' . $id);
            }
        }
    }

    public function berita()
    {
        $this->load->model('HomeModel');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Berita Desa';
        $data['berita'] = $this->HomeModel->select_berita();

        $this->load->view('templates/header_admin', $data);
        $this->load->view('profile/daftar_berita', $data);
        $this->load->view('templates/footer_admin', $data);
    }

    public function add_berita()
    {
        $this->load->model('HomeModel');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Tambah Berita';

        if (!isset($_POST['simpan_berita'])) {
            $this->load->view('templates/header_admin', $data);
            $this->load->view('profile/add_berita', $data);
            $this->load->view('templates/footer_admin', $data);
        } else {
            $this->HomeModel->create_berita();
            redirect('Profile/berita');
        }
    }

    public function edit_berita($id)
    {
        $this->load->model('HomeModel');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Edit Berita';
        $data['berita'] = $this->HomeModel->select_berita_id($id);

        if (!isset($_POST['update_berita'])) {
            $this->load->view('templates/header_admin', $data);
            $this->load->view('profile/edit_berita', $data);
            $this->load->view('templates/footer_admin', $data);
        } else {
            $this->HomeModel->update_berita($id);
            redirect('Auth/berita/' . $id);
        }
    }

    public function delete_berita($id)
    {
        $this->db->where('id_profile', $id);
        $delete = $this->db->delete('profile_desa');
        if ($delete) {
            $this->session->set_flashdata('berita', 'Berita berhasil dihapus');
            redirect('Profile/berita');
        }
    }
}
