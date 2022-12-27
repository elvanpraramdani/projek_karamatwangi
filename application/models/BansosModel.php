<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BansosModel extends CI_Model
{

    public function select_bansos()
    {
        $this->db->select('*');
        $this->db->from('bansos');

        if (isset($_POST['submit'])) {
            $cari = $this->input->post('keyword');
            $this->db->like("nama_bansos", $cari);
        }

        $this->db->order_by('nama_bansos', 'asc');
        return $this->db->get()->result_array();
    }

    public function select_bansos_id($id_bansos)
    {
        $this->db->select('*');
        $this->db->from('bansos');
        $this->db->where('id_bansos', $id_bansos);
        return $this->db->get()->row();
    }

    public function count_bansos()
    {
        $count = $this->db->query("SELECT COUNT(id_bansos) FROM bansos")->result_array();
        return $count;
    }

    public function create()
    {
        $this->load->model('HomeModel');

        $nama_bansos = htmlspecialchars($this->input->post('nama_bansos'));
        $periode_bulan = htmlspecialchars($this->input->post('periode_bulan'));
        $periode_tahun = htmlspecialchars($this->input->post('periode_tahun'));
        $status_bansos = htmlspecialchars($this->input->post('status_bansos'));
        $periode = $periode_tahun . '-' . $periode_bulan . '-01';

        $id = strtolower(substr(str_replace(' ', '', $nama_bansos), 0, 5)) . $periode_tahun . $this->HomeModel->generateChar(2);


        $data = [
            'id_bansos' =>  $id,
            'nama_bansos' => $nama_bansos,
            'periode_bansos' => $periode,
            'status_bansos' => $status_bansos
        ];

        $insert = $this->db->insert('bansos', $data);
        if ($insert) {
            $this->session->set_flashdata('bansos', 'Bantuan sosial berhasil ditambahkan');
        }
    }

    public function update($id_bansos)
    {
        $nama_bansos = htmlspecialchars($this->input->post('nama_bansos'));
        $periode_bulan = htmlspecialchars($this->input->post('periode_bulan'));
        $periode_tahun = htmlspecialchars($this->input->post('periode_tahun'));
        $status_bansos = htmlspecialchars($this->input->post('status_bansos'));

        $periode = $periode_tahun . '-' . $periode_bulan . '-01';

        $data = [
            'nama_bansos' => $nama_bansos,
            'periode_bansos' => $periode,
            'status_bansos' => $status_bansos
        ];

        $this->db->where('id_bansos', $id_bansos);
        $update = $this->db->update('bansos', $data);
        if ($update) {
            $this->session->set_flashdata('bansos', 'Bantuan sosial berhasil diperbaharui');
        }
    }
}
