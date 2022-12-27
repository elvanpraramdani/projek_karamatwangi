<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PenerimaModel extends CI_Model
{

    public function select_penerima_per_bansos($id_bansos)
    {
        $this->db->select('*');
        $this->db->from('penerima_bansos');
        $this->db->join('warga', 'penerima_bansos.nik_warga=warga.nik');
        $this->db->join('bansos', 'penerima_bansos.id_bansos=bansos.id_bansos');
        $this->db->join('dusun', 'warga.alamat=dusun.kd_dusun');

        if (isset($_POST['btn_search_warga'])) {
            $cari = $this->input->post('search_warga');
            $this->db->like('nama_warga', $cari);
        }

        $this->db->where('penerima_bansos.id_bansos', $id_bansos);
        $this->db->order_by('nama_warga', 'asc');
        return $this->db->get()->result_array();
    }

    public function select_penerima()
    {
        $this->db->select('*');
        $this->db->from('penerima_bansos');
        $this->db->join('warga', 'penerima_bansos.nik_warga=warga.nik');
        $this->db->join('dusun', 'warga.alamat=dusun.kd_dusun');
        $this->db->group_by('penerima_bansos.nik_warga');
        $this->db->order_by('nama_warga', 'asc');
        return $this->db->get()->result_array();
    }

    public function select_penerima_id($id_warga)
    {
        $this->db->select('*');
        $this->db->from('penerima_bansos');
        $this->db->join('warga', 'penerima_bansos.nik_warga=warga.nik');
        $this->db->join('bansos', 'penerima_bansos.id_bansos=bansos.id_bansos');
        $this->db->join('dusun', 'warga.alamat=dusun.kd_dusun');
        $this->db->where('penerima_bansos.id_warga', $id_warga);
        return $this->db->get()->result_array();
    }

    public function select_penerima_id_penerima($id_penerima)
    {
        $this->db->select('*');
        $this->db->from('penerima_bansos');
        $this->db->join('warga', 'penerima_bansos.nik_warga=warga.nik');
        $this->db->join('bansos', 'penerima_bansos.id_bansos=bansos.id_bansos');
        $this->db->join('dusun', 'warga.alamat=dusun.kd_dusun');
        $this->db->where('id_penerima', $id_penerima);
        return $this->db->get()->row();
    }

    public function update($id_penerima)
    {
        $no_rekening = htmlspecialchars($this->input->post('no_rekening'));
        $kkm1 = htmlspecialchars($this->input->post('kkm1'));
        $kkm2 = htmlspecialchars($this->input->post('kkm2'));
        $kkm3 = htmlspecialchars($this->input->post('kkm3'));
        $kkm4 = htmlspecialchars($this->input->post('kkm4'));
        $kkm5 = htmlspecialchars($this->input->post('kkm5'));
        $kkm6 = htmlspecialchars($this->input->post('kkm6'));
        $kkm7 = htmlspecialchars($this->input->post('kkm7'));
        $kkm8 = htmlspecialchars($this->input->post('kkm8'));
        $kkm9 = htmlspecialchars($this->input->post('kkm9'));
        $kkm10 = htmlspecialchars($this->input->post('kkm10'));
        $kkm11 = htmlspecialchars($this->input->post('kkm11'));
        $kkm12 = htmlspecialchars($this->input->post('kkm12'));
        $kkm13 = htmlspecialchars($this->input->post('kkm13'));
        $kkm14 = htmlspecialchars($this->input->post('kkm14'));
        $jumlah = htmlspecialchars($this->input->post('jumlah'));
        $sudah_jps_pkh = htmlspecialchars($this->input->post('pkh'));
        $sudah_jps_bpnt = htmlspecialchars($this->input->post('bpnt'));
        $sudah_jps_kp = htmlspecialchars($this->input->post('kp'));
        $sudah_jps_bp = htmlspecialchars($this->input->post('bp'));
        $sudah_jps_bk = htmlspecialchars($this->input->post('bk'));
        $belum_jps_hilang_pencarian = htmlspecialchars($this->input->post('hilang_pencarian'));
        $belum_jps_tidak_terdata = htmlspecialchars($this->input->post('tidak_terdata'));
        $belum_jps_sakit_kronis = htmlspecialchars($this->input->post('sakit_kronis'));
        $ms_tms = htmlspecialchars($this->input->post('ms_tms'));

        $data = [
            'no_rekening' => $no_rekening,
            'kkm1' => $kkm1,
            'kkm2' => $kkm2,
            'kkm3' => $kkm3,
            'kkm4' => $kkm4,
            'kkm5' => $kkm5,
            'kkm6' => $kkm6,
            'kkm7' => $kkm7,
            'kkm8' => $kkm8,
            'kkm9' => $kkm9,
            'kkm10' => $kkm10,
            'kkm11' => $kkm11,
            'kkm12' => $kkm12,
            'kkm13' => $kkm13,
            'kkm14' => $kkm14,
            'jumlah' => $jumlah,
            'sudah_jps_pkh' => $sudah_jps_pkh,
            'sudah_jps_bpnt' => $sudah_jps_bpnt,
            'sudah_jps_kp' => $sudah_jps_kp,
            'sudah_jps_bp' => $sudah_jps_bp,
            'sudah_jps_bk' => $sudah_jps_bk,
            'belum_jps_hilang_pencarian' => $belum_jps_hilang_pencarian,
            'belum_jps_tidak_terdata' => $belum_jps_tidak_terdata,
            'belum_jps_sakit_kronis' => $belum_jps_sakit_kronis,
            'ms_tms' => $ms_tms
        ];
        $this->db->where('id_penerima', $id_penerima);
        $update = $this->db->update('penerima_bansos', $data);
        if ($update) {
            $this->session->set_flashdata('bansos', 'Data berhasil diperbaharui');
        }
    }

    // import data excel
    public function import_data($data_penerima)
    {
        $jumlah = count($data_penerima);
        if ($jumlah > 0) {
            $this->db->replace('penerima_bansos', $data_penerima);
        }
    }
}
