<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomeModel extends CI_Model
{
    public function generateChar($batas = 10)
    {
        $char = 'abcdefghijklmnopqrestuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charLength = strlen($char);
        $randomString = "";
        for ($i = 0; $i < $batas; $i++) {
            $randomString .= $char[rand(0, $charLength - 1)];
        }
        return $randomString;
    }

    public function create_admin()
    {
        $nama_admin = htmlspecialchars($this->input->post('nama'));
        $username = htmlspecialchars($this->input->post('username'));
        $password = htmlspecialchars($this->input->post('password'));
        $level = htmlspecialchars($this->input->post('level'));

        $data = [
            'id_admin' => $this->HomeModel->generateChar(),
            'nama_admin' => $nama_admin,
            'email' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'level' => $level
        ];

        $insert = $this->db->insert('user', $data);
        if ($insert) {
            $this->session->set_flashdata('message', $nama_admin . ' Sebagai admin baru berhasil ditambahkan.');
        }
    }

    public function update_user($id)
    {
        $nama = htmlspecialchars($this->input->post('nama'));
        $level = htmlspecialchars($this->input->post('level'));

        $data = [
            'nama_admin' => $nama,
            'level' => $level
        ];

        $this->db->where('id_admin', $id);
        $update = $this->db->update('user', $data);
        if ($update) {
            $this->session->set_flashdata('admin', 'Data berhasil diperbaharui');
        }
    }

    public function select_profile()
    {
        $this->db->select('*');
        $this->db->from('profile_desa');
        $this->db->order_by('sub_kategori_profile', 'asc');
        return $this->db->get()->result_array();
    }

    public function select_berita()
    {
        $this->db->select('*');
        $this->db->from('profile_desa');
        $this->db->where('sub_kategori_profile', 'Berita');
        if ($this->uri->segment(1) == 'Auth') {
            $this->db->limit(10);
        }
        $this->db->order_by('created_at', 'desc');
        return $this->db->get()->result_array();
    }
    public function select_berita_id($id)
    {
        $this->db->select('*');
        $this->db->from('profile_desa');
        $this->db->where('id_profile', $id);
        return $this->db->get()->row();
    }

    public function select_profile_id($id)
    {
        $this->db->select('*');
        $this->db->from('profile_desa');
        $this->db->where('id_profile', $id);
        return $this->db->get()->row();
    }

    public function create_berita()
    {
        $judul = htmlspecialchars($this->input->post('judul_berita'));
        $foto = htmlspecialchars($this->input->post('foto_berita'));
        $deskripsi = htmlspecialchars($this->input->post('deskripsi_berita'));

        $upload_gambar = $_FILES['foto_berita']['name'];
        $config['allowed_types'] = "jpg|png|gif|svg|jpeg|JPG|PNG|JPEG";
        $congig['max_size'] = 5024 * 5;
        $config['upload_path'] = './assets/img/berita/';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('foto_berita')) {
            $gambarUpload = $this->upload->data('file_name');
        } else {
            $gambarUpload = 'null';
        }

        $data = [
            'id_profile' => $this->generateChar(),
            'judul_berita' => htmlspecialchars($this->input->post('judul_berita')),
            'gambar_profile' => $gambarUpload,
            'deskripsi_profile' => htmlspecialchars($this->input->post('deskripsi_berita')),
            'kategori_profile' => 'Berita',
            'sub_kategori_profile' => 'Berita',
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ];

        $insert = $this->db->insert('profile_desa', $data);
        if ($insert) {
            $this->session->flashdata('berita', 'Berita berhasil ditambahkan!');
        }
    }

    public function update_berita($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $judul = htmlspecialchars($this->input->post('judul_berita'));
        $foto = htmlspecialchars($this->input->post('foto_berita'));
        $foto_lama = htmlspecialchars($this->input->post('foto_lama'));
        $deskripsi = htmlspecialchars($this->input->post('deskripsi_berita'));


        $upload_foto = $_FILES['foto_berita']['name']; // cek gambar (foto profile)
        if ($_FILES['foto_berita']['error'] === 4) {
            $gambarUpload = $foto_lama;
            $this->db->set('gambar_profile', $gambarUpload);
        } else if ($upload_foto) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg|svg|JPG|PNG|GIF|JPEG';
            $config['max_size'] = 1024 * 5;
            $config['upload_path'] = './assets/img/berita/';

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto_berita')) {

                // $old_image = $data['user']['gambar_profile']; // mengambil nama gambar lama
                $old_image = $foto_lama;
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/berita/' . $old_image); //menghapus gambar lama, jika ada gambar baru di 
                }
                $gambarUpload = $this->upload->data('file_name');
                $this->db->set('gambar_profile', $gambarUpload);
            } else {
                $this->session->set_flashdata('edit_profile', 'Gagal Upload Gambar!');
                redirect('Profile/edit_berita/' . $id);
            }
        }

        $data =
            [
                'judul_berita' => $judul,
                'deskripsi_profile' => $deskripsi,
                'gambar_profile' => $gambarUpload
            ];

        $this->db->where('id_profile', $id);
        $update = $this->db->update('profile_desa', $data);
        if ($update) {
            $this->session->set_flashdata('berita', 'Berita berhasil diperbaharui');
        }
    }

    public function select_agama()
    {
        $this->db->select("*");
        $this->db->from('agama');
        $this->db->order_by('kd_agama', 'asc');
        return $this->db->get()->result_array();
    }
    public function select_dusun()
    {
        $this->db->select("*");
        $this->db->from('dusun');
        $this->db->order_by('kd_dusun', 'asc');
        return $this->db->get()->result_array();
    }
    public function select_pekerjaan()
    {
        $this->db->select("*");
        $this->db->from('pekerjaan');
        $this->db->order_by('ket_pekerjaan', 'asc');
        return $this->db->get()->result_array();
    }
    public function select_pendidikan()
    {
        $this->db->select("*");
        $this->db->from('pendidikan');
        $this->db->order_by('kd_pendidikan', 'asc');
        return $this->db->get()->result_array();
    }
    public function select_shdk()
    {
        $this->db->select("*");
        $this->db->from('shdk');
        $this->db->order_by('kd_shdk', 'asc');
        return $this->db->get()->result_array();
    }
    public function select_status()
    {
        $this->db->select("*");
        $this->db->from('status_warga');
        $this->db->order_by('kd_status', 'asc');
        return $this->db->get()->result_array();
    }

    public function create_data_warga()
    {
        $penanda = $this->input->post('penanda');
        $kode = htmlspecialchars($this->input->post('kode'));
        $keterangan = htmlspecialchars($this->input->post('keterangan'));

        if ($penanda == 'agama') {
            $kd_agama = $this->db->get_where('agama', ['kd_agama' => $kode])->row_array();
            if (!$kd_agama) {
                $data = [
                    'kd_agama' => $kode,
                    'nama_agama' => $keterangan
                ];
                $insert = $this->db->insert('agama', $data);
                if ($insert) {
                    $this->session->set_flashdata('message', 'Data ' . $penanda . ' berhasil ditambahkan');
                }
            } else {
                $this->session->set_flashdata('message', 'Kode ' . $penanda . ' ' . $kode . ' sudah ada');
            }
        } else if ($penanda == 'dusun') {
            $kd_dusun = $this->db->get_where('dusun', ['kd_dusun' => $kode])->row_array();
            if (!$kd_dusun) {
                $data = [
                    'kd_dusun' => $kode,
                    'nama_dusun' => $keterangan
                ];
                $insert = $this->db->insert('dusun', $data);
                if ($insert) {
                    $this->session->set_flashdata('message', 'Data ' . $penanda . ' berhasil ditambahkan');
                }
            } else {
                $this->session->set_flashdata('message', 'Kode ' . $penanda . ' ' . $kode . ' sudah ada');
            }
        } else if ($penanda == 'pekerjaan') {
            $kd_pekerjaan = $this->db->get_where('pekerjaan', ['kd_pekerjaan' => $kode])->row_array();
            if (!$kd_pekerjaan) {
                $data = [
                    'kd_pekerjaan' => $kode,
                    'ket_pekerjaan' => $keterangan
                ];

                $insert = $this->db->insert('pekerjaan', $data);
                if ($insert) {
                    $this->session->set_flashdata('message', 'Data ' . $penanda . ' berhasil ditambahkan');
                }
            } else {
                $this->session->set_flashdata('message', 'Kode ' . $penanda . ' ' . $kode . ' sudah ada');
            }
        } else if ($penanda == 'pendidikan') {
            $kd_pendidikan = $this->db->get_where('pendidikan', ['kd_pendidikan' => $kode])->row_array();
            if (!$kd_pendidikan) {
                $data = [
                    'kd_pendidikan' => $kode,
                    'ket_pendidikan' => $keterangan
                ];

                $insert = $this->db->insert('pendidikan', $data);
                if ($insert) {
                    $this->session->set_flashdata('message', 'Data ' . $penanda . ' berhasil ditambahkan');
                }
            } else {
                $this->session->set_flashdata('message', 'Kode pendidikan terakhir ' . $kode . ' sudah ada');
            }
        } else if ($penanda == 'shdk') {
            $kd_shdk = $this->db->get_where('shdk', ['kd_shdk' => $kode])->row_array();
            if (!$kd_shdk) {
                $data = [
                    'kd_shdk' => $kode,
                    'ket_shdk' => $keterangan
                ];

                $insert = $this->db->insert('shdk', $data);
                if ($insert) {
                    $this->session->set_flashdata('message', 'Data ' . $penanda . ' berhasil ditambahkan');
                }
            } else {
                $this->session->set_flashdata('message', 'Kode SHDK '  . $kode . ' sudah ada');
            }
        } else if ($penanda == 'status') {
            $kd_status = $this->db->get_where('status_warga', ['kd_status' => $kode])->row_array();
            if (!$kd_status) {
                $data = [
                    'kd_status' => $kode,
                    'ket_status' => $keterangan
                ];

                $insert = $this->db->insert('status_warga', $data);
                if ($insert) {
                    $this->session->set_flashdata('message', 'Data ' . $penanda . ' berhasil ditambahkan');
                }
            } else {
                $this->session->set_flashdata('message', 'Kode ' . $penanda . ' ' . $kode . ' sudah ada');
            }
        }
    }

    public function deletetambahanwarga($id)
    {

        $penanda = $this->input->post('penanda');
        if ($penanda == 'agama') {
            $this->db->where('id_agama', $id);
            $delete = $this->db->delete('agama');
        } else if ($penanda == 'dusun') {
            $this->db->where('id_dusun', $id);
            $delete = $this->db->delete('dusun');
        } else if ($penanda == 'pekerjaan') {
            $this->db->where('id_pekerjaan', $id);
            $delete = $this->db->delete('pekerjaan');
        } else if ($penanda == 'pendidikan') {
            $this->db->where('id_pendidikan', $id);
            $delete = $this->db->delete('pendidikan');
        } else if ($penanda == 'shdk') {
            $this->db->where('id_shdk', $id);
            $delete = $this->db->delete('shdk');
        } else if ($penanda == 'status') {
            $this->db->where('id_status', $id);
            $delete = $this->db->delete('status_warga');
        }

        $this->session->set_flashdata('message', 'Data ' . $penanda . ' berhasil dihapus.');
    }
}
