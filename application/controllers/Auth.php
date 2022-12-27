<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('HomeModel');
		$this->load->model('BansosModel');
		$this->load->model('PenerimaModel');
		$this->load->model('WargaModel');
	}



	public function index()
	{
		$data['profile'] = $this->HomeModel->select_profile();
		$data['berita'] = $this->HomeModel->select_berita();
		$data['bansos'] = $this->BansosModel->select_bansos();
		$data['cari_penerima'] = $this->PenerimaModel->select_penerima();

		$this->load->view('homepage/index', $data);
	}

	public function login()
	{
		$data['title'] = 'Halaman Login';

		$data['profile'] = $this->HomeModel->select_profile();
		$data['berita'] = $this->HomeModel->select_berita();
		$data['bansos'] = $this->BansosModel->select_bansos();
		$data['cari_penerima'] = $this->PenerimaModel->select_penerima();

		$this->load->view('templates/header_homepage', $data);
		$this->load->view('homepage/login', $data);
		$this->load->view('templates/footer_homepage');
	}

	public function proses_login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			if (password_verify($password, $user['password'])) {
				$data =
					[
						'email' => $user['email'],
						'level' => $user['level']
					];
				$this->session->set_userdata($data);

				if ($user['level'] == "super_admin") {
					return redirect('Admin');
				} else {
					return redirect('Admin');
				}
			} else {
				$this->session->set_flashdata('login', 'Password Tidak Sesuai');
				redirect('Auth/login');
			}
		} else {
			$this->session->set_flashdata('login', 'Email Tidak ditemukan');
			redirect('Auth/login');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('level');
		$this->session->sess_destroy();
		redirect('Auth/login');
	}


	public function berita($id)
	{
		if ($id != null) {
			$profile = $this->db->get_where('profile_desa', ['id_profile' => $id])->row_array();

			if ($profile) {
				$data['title'] = "Berita Desa";
				// $this->load->model('HomeModel');
				$data['berita'] = $this->HomeModel->select_profile_id($id);

				if (!$this->session->userdata('email')) {
					$this->load->view('templates/header_homepage', $data);
					$this->load->view('berita/detail_berita', $data);
					$this->load->view('templates/footer_homepage', $data);
				} else {
					$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
					$this->load->view('templates/header_admin', $data);
					$this->load->view('berita/detail_berita', $data);
					$this->load->view('templates/footer_admin', $data);
				}
			} else {
				echo 'data tidak ditembukan';
			}
		} else {
			echo 'data tidak ditembukan';
		}
	}

	public function profile($id)
	{
		if ($id != null) {
			$profile = $this->db->get_where('profile_desa', ['id_profile' => $id])->row_array();
			if ($profile) {
				$data['title'] = $profile['sub_kategori_profile'];
				$data['profile_id'] = $this->HomeModel->select_profile_id($id);

				$data['profile'] = $this->HomeModel->select_profile();
				$data['berita'] = $this->HomeModel->select_berita();
				$data['bansos'] = $this->BansosModel->select_bansos();
				$data['cari_penerima'] = $this->PenerimaModel->select_penerima();

				if (!$this->session->userdata('email')) {
					$this->load->view('templates/header_homepage', $data);
					$this->load->view('profile/detail_profile', $data);
					$this->load->view('templates/footer_homepage', $data);
				} else {
					$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
					$this->load->view('templates/header_admin', $data);
					$this->load->view('profile/detail_profile', $data);
					$this->load->view('templates/footer_admin', $data);
				}
			} else {
				echo 'data tidak ditembukan';
			}
		} else {
			echo 'data tidak ditembukan';
		}
	}

	public function bansos($id_bansos)
	{
		$data['title'] = 'Data Bantuan Sosial';
		$data['per_bansos'] = $this->BansosModel->select_bansos_id($id_bansos);
		$data['penerima_per_bansos'] = $this->PenerimaModel->select_penerima_per_bansos($id_bansos);

		$data['profile'] = $this->HomeModel->select_profile();
		$data['berita'] = $this->HomeModel->select_berita();
		$data['bansos'] = $this->BansosModel->select_bansos();
		$data['cari_penerima'] = $this->PenerimaModel->select_penerima();

		$this->load->view('templates/header_homepage', $data);
		$this->load->view('bansos/detail_bansos_per_bansos', $data);
		$this->load->view('templates/footer_homepage', $data);
	}

	public function penerima($id_warga)
	{
		$data['title'] = "Data Penerima Bantuan Sosial";
		$data['penerima_id'] = $this->PenerimaModel->select_penerima_id($id_warga);
		$data['penerima'] = $this->WargaModel->biodata($id_warga);

		$data['profile'] = $this->HomeModel->select_profile();
		$data['berita'] = $this->HomeModel->select_berita();
		$data['bansos'] = $this->BansosModel->select_bansos();
		$data['cari_penerima'] = $this->PenerimaModel->select_penerima();

		$this->load->view('templates/header_homepage', $data);
		$this->load->view('bansos/penerima_bansos_perid', $data);
		$this->load->view('templates/footer_homepage', $data);
	}
}
