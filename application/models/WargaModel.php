<?php
defined('BASEPATH') or exit('No direct script access allowed');

class WargaModel extends CI_Model
{

    public function select_warga($limit, $start, $cari_warga = null)
    {
        $cari_warga = $this->input->post('search_warga');

        $this->db->select('*');
        $this->db->join('agama', 'warga.agama=agama.kd_agama');
        $this->db->join('dusun', 'warga.alamat=dusun.kd_dusun');
        $this->db->join('shdk', 'warga.shdk=shdk.kd_shdk');
        $this->db->join('status_warga', 'warga.status_warga=status_warga.kd_status');
        $this->db->join('pendidikan', 'warga.pendidikan=pendidikan.kd_pendidikan');
        $this->db->join('pekerjaan', 'warga.pekerjaan=pekerjaan.kd_pekerjaan');

        if ($cari_warga) {
            $this->db->like('no_kk', $cari_warga);
            $this->db->or_like('kepala_keluarga', $cari_warga);
            $this->db->or_like('nik', $cari_warga);
            $this->db->or_like('nama_warga', $cari_warga);
            $this->db->or_like('nama_dusun', $cari_warga);
            $this->db->or_like('tempat_lahir', $cari_warga);
            $this->db->or_like('tanggal_lahir', $cari_warga);
            $this->db->or_like('agama', $cari_warga);
            $this->db->or_like('status_warga', $cari_warga);
            $this->db->or_like('nama_ibu', $cari_warga);
            $this->db->or_like('nama_ayah', $cari_warga);
        }
        // $this->db->limit(10);
        $this->db->order_by('nama_warga', 'asc');
        return $this->db->get('warga', $limit, $start)->result_array();
    }

    public function select_all_warga()
    {
        $this->db->select('*');
        $this->db->from('warga');
        $this->db->join('agama', 'warga.agama=agama.kd_agama');
        $this->db->join('dusun', 'warga.alamat=dusun.kd_dusun');
        $this->db->join('shdk', 'warga.shdk=shdk.kd_shdk');
        $this->db->join('status_warga', 'warga.status_warga=status_warga.kd_status');
        $this->db->join('pendidikan', 'warga.pendidikan=pendidikan.kd_pendidikan');
        $this->db->join('pekerjaan', 'warga.pekerjaan=pekerjaan.kd_pekerjaan');
        $this->db->order_by('nama_warga', 'asc');
        return $this->db->get()->result_array();
    }


    public function count_all_warga()
    {
        return $this->db->query("SELECT  * FROM warga")->num_rows();
    }

    public function select_pekerjaan()
    {
        $this->db->select('*');
        $this->db->from('pekerjaan');
        $this->db->order_by('ket_pekerjaan', 'asc');
        return $this->db->get()->result_array();
    }
    public function select_dusun()
    {
        $this->db->select('*');
        $this->db->from('dusun');
        $this->db->order_by('nama_dusun', 'asc');
        return $this->db->get()->result_array();
    }
    public function select_pendidikan()
    {
        $this->db->select('*');
        $this->db->from('pendidikan');
        $this->db->order_by('ket_pendidikan', 'asc');
        return $this->db->get()->result_array();
    }
    public function select_agama()
    {
        $this->db->select('*');
        $this->db->from('agama');
        $this->db->order_by('kd_agama', 'asc');
        return $this->db->get()->result_array();
    }
    public function select_shdk()
    {
        $this->db->select('*');
        $this->db->from('shdk');
        $this->db->order_by('kd_shdk', 'asc');
        return $this->db->get()->result_array();
    }
    public function select_status()
    {
        $this->db->select('*');
        $this->db->from('status_warga');
        $this->db->order_by('kd_status', 'asc');
        return $this->db->get()->result_array();
    }
    public function create_warga()
    {
        $no_kk          = htmlspecialchars($this->input->post('no_kk'));
        $nik            = htmlspecialchars($this->input->post('nik'));
        $nama_warga     = htmlspecialchars($this->input->post('nama_warga'));
        $alamat         = htmlspecialchars($this->input->post('alamat'));
        $rw             = htmlspecialchars($this->input->post('rw'));
        $rt             = htmlspecialchars($this->input->post('rt'));
        $jk             = htmlspecialchars($this->input->post('jk'));
        $tempat_lahir   = htmlspecialchars($this->input->post('tempat_lahir'));
        $tanggal_lahir  = htmlspecialchars($this->input->post('tanggal_lahir'));
        $waktu_lahir    = htmlspecialchars($this->input->post('waktu_lahir'));
        $goldar         = htmlspecialchars($this->input->post('goldar'));
        $agama          = htmlspecialchars($this->input->post('agama'));
        $status_warga   = htmlspecialchars($this->input->post('status_warga'));
        $shdk           = htmlspecialchars($this->input->post('shdk'));
        $pendidikan     = htmlspecialchars($this->input->post('pendidikan'));
        $pekerjaan      = htmlspecialchars($this->input->post('pekerjaan'));
        $kepala_keluarga = htmlspecialchars($this->input->post('kepala_keluarga'));
        $nama_ayah      = htmlspecialchars($this->input->post('nama_ayah'));
        $nama_ibu       = htmlspecialchars($this->input->post('nama_ibu'));
        $provinsi       = htmlspecialchars($this->input->post('provinsi'));
        $kabupaten      = htmlspecialchars($this->input->post('kabupaten'));
        $kecamatan      = htmlspecialchars($this->input->post('kecamatan'));
        $kelurahan      = htmlspecialchars($this->input->post('kelurahan'));

        $tgl_lahir = $tanggal_lahir . ' ' . $waktu_lahir;
        $data =
            [
                'no_kk' => $no_kk,
                'nik' => $nik,
                'nama_warga' => $nama_warga,
                'alamat' => $alamat,
                'rw' => $rw,
                'rt' => $rt,
                'jk' => $jk,
                'tempat_lahir' => $tempat_lahir,
                'tanggal_lahir' => $tgl_lahir,
                'golongan_darah' => $goldar,
                'agama' => $agama,
                'shdk' => $shdk,
                'status_warga' => $status_warga,
                'pendidikan' => $pendidikan,
                'pekerjaan' => $pekerjaan,
                'kepala_keluarga' => $kepala_keluarga,
                'nama_ayah' => $nama_ayah,
                'nama_ibu' => $nama_ibu,
                'provinsi' => $provinsi,
                'kabupaten' => $kabupaten,
                'kecamatan' => $kecamatan,
                'kelurahan' => $kelurahan
            ];
        $insert = $this->db->insert('warga', $data);
        if ($insert) {
            $this->session->set_flashdata('warga', 'Data warga berhasil disimpan!');
        }
    }

    public function update_warga($id)
    {
        $id_warga       = htmlspecialchars($this->input->post('id_warga'));
        $no_kk          = htmlspecialchars($this->input->post('no_kk'));
        $nik            = htmlspecialchars($this->input->post('nik'));
        $nama_warga     = htmlspecialchars($this->input->post('nama_warga'));
        $alamat         = htmlspecialchars($this->input->post('alamat'));
        $rw             = htmlspecialchars($this->input->post('rw'));
        $rt             = htmlspecialchars($this->input->post('rt'));
        $jk             = htmlspecialchars($this->input->post('jk'));
        $tempat_lahir   = htmlspecialchars($this->input->post('tempat_lahir'));
        $tanggal_lahir  = htmlspecialchars($this->input->post('tanggal_lahir'));
        $waktu_lahir    = htmlspecialchars($this->input->post('waktu_lahir'));
        $goldar         = htmlspecialchars($this->input->post('goldar'));
        $agama          = htmlspecialchars($this->input->post('agama'));
        $status_warga   = htmlspecialchars($this->input->post('status_warga'));
        $shdk           = htmlspecialchars($this->input->post('shdk'));
        $pendidikan     = htmlspecialchars($this->input->post('pendidikan'));
        $pekerjaan      = htmlspecialchars($this->input->post('pekerjaan'));
        $kepala_keluarga = htmlspecialchars($this->input->post('kepala_keluarga'));
        $nama_ayah      = htmlspecialchars($this->input->post('nama_ayah'));
        $nama_ibu       = htmlspecialchars($this->input->post('nama_ibu'));
        $provinsi       = htmlspecialchars($this->input->post('provinsi'));
        $kabupaten      = htmlspecialchars($this->input->post('kabupaten'));
        $kecamatan      = htmlspecialchars($this->input->post('kecamatan'));
        $kelurahan      = htmlspecialchars($this->input->post('kelurahan'));

        // $tgl_lahir = $tanggal_lahir . ' ' . $waktu_lahir;

        $data =
            [
                'no_kk' => $no_kk,
                'nik' => $nik,
                'nama_warga' => $nama_warga,
                'alamat' => $alamat,
                'rw' => $rw,
                'rt' => $rt,
                'jk' => $jk,
                'tempat_lahir' => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'golongan_darah' => $goldar,
                'agama' => $agama,
                'shdk' => $shdk,
                'status_warga' => $status_warga,
                'pendidikan' => $pendidikan,
                'pekerjaan' => $pekerjaan,
                'kepala_keluarga' => $kepala_keluarga,
                'nama_ayah' => $nama_ayah,
                'nama_ibu' => $nama_ibu,
                'provinsi' => $provinsi,
                'kabupaten' => $kabupaten,
                'kecamatan' => $kecamatan,
                'kelurahan' => $kelurahan
            ];

        $this->db->where('id_warga', $id);
        $update = $this->db->update('warga', $data);

        if ($update) {
            $this->session->set_flashdata('warga', 'Data warga berhasil diperbaharui!');
        }
    }

    public function biodata($id_warga)
    {
        $this->db->select('*');
        $this->db->from('warga');
        $this->db->join('agama', 'warga.agama=agama.kd_agama');
        $this->db->join('dusun', 'warga.alamat=dusun.kd_dusun');
        $this->db->join('shdk', 'warga.shdk=shdk.kd_shdk');
        $this->db->join('status_warga', 'warga.status_warga=status_warga.kd_status');
        $this->db->join('pendidikan', 'warga.pendidikan=pendidikan.kd_pendidikan');
        $this->db->join('pekerjaan', 'warga.pekerjaan=pekerjaan.kd_pekerjaan');
        $this->db->where('id_warga', $id_warga);
        return $this->db->get()->row();
    }

    // import data excel
    public function import_data($data_penerima)
    {
        $jumlah = count($data_penerima);
        // var_dump($jumlah);
        // die();
        if ($jumlah > 0) {
            $this->db->replace('warga', $data_penerima);
        }
    }
}
