<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Penerima extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_loggin();
        $this->load->model('HomeModel');
        $this->load->model('BansosModel');
        $this->load->model('PenerimaModel');
        $this->load->model('WargaModel');
    }

    public function add($id_bansos)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id = $this->db->query("SELECT * FROM bansos WHERE id_bansos='$id_bansos'")->row();
        $data['title'] = "Tambah Penerima Bantuan " . $id->nama_bansos;
        // pagination        
        //config    
        if (isset($_POST['btn_search_warga'])) {
            $data['search_warga'] = $this->input->post('search_warga');
            $this->session->set_userdata('search_warga', $data['search_warga']);
        } else {
            $data['search_warga'] = $this->session->userdata('search_warga');
        }

        $this->db->like('no_kk', $data['search_warga']);
        $this->db->or_like('kepala_keluarga', $data['search_warga']);
        $this->db->or_like('nik', $data['search_warga']);
        $this->db->or_like('nama_warga', $data['search_warga']);
        $this->db->or_like('nama_dusun', $data['search_warga']);
        $this->db->or_like('tempat_lahir', $data['search_warga']);
        $this->db->or_like('tanggal_lahir', $data['search_warga']);
        $this->db->or_like('agama', $data['search_warga']);
        $this->db->or_like('status_warga', $data['search_warga']);
        $this->db->or_like('nama_ibu', $data['search_warga']);
        $this->db->or_like('nama_ayah', $data['search_warga']);

        // count_all_results untuk menghitung data yang dicari atau yang diinputkan
        $config['base_url'] = 'http://localhost/projek_karamatwangi/Penerima/add/' . $id_bansos . '/';
        $config['total_rows'] = $this->WargaModel->count_all_warga();
        $config['per_page'] = 25;
        // initialize
        $this->pagination->initialize($config);
        $data['total_rows'] = $config['total_rows'];
        $data['start'] = $this->uri->segment(4);

        $data['warga'] = $this->WargaModel->select_warga($config['per_page'], $data['start'], $data['search_warga']);
        $data['per_bansos'] = $this->BansosModel->select_bansos_id($id_bansos);

        $data['cari'] = htmlspecialchars($this->input->post('search_warga'));

        $this->load->view('templates/header_admin', $data);
        $this->load->view('penerima/add_penerima', $data);
        $this->load->view('templates/footer_admin', $data);
    }

    public function create_penerima()
    {
        $warga_nik = $this->input->post('wargaNik');
        $bansos_id = $this->input->post('bansosId');

        $data = [
            'nik_warga' => $warga_nik,
            'id_bansos' => $bansos_id
        ];

        $result = $this->db->get_where('penerima_bansos', $data);
        //cek jika ada didatabase jika, jika didatabase tidak ada maka tambahkan. jika aka delete.
        if ($result->num_rows() < 1) {
            $this->db->insert('penerima_bansos', $data);
        } else {
            $this->db->delete('penerima_bansos', $data);
        }
    }

    public function delete($id_penerima)
    {
        $id_bansos = $this->input->post('id_bansos');

        $this->db->where('id_penerima', $id_penerima);
        $this->db->delete('penerima_bansos');
        $this->session->set_flashdata('bansos', 'Data Berhasil Dihapus');
        redirect('Bansos/detail_bansos/' . $id_bansos);
    }

    public function edit($id_penerima)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Edit Penerima Bantuan';
        $data['penerima'] = $this->PenerimaModel->select_penerima_id_penerima($id_penerima);
        if (!isset($_POST['update'])) {
            $this->load->view('templates/header_admin', $data);
            $this->load->view('bansos/edit_spesifik_penerima', $data);
            $this->load->view('templates/footer_admin', $data);
        } else {
            $id_bansos = $this->input->post('id_bansos');
            $this->PenerimaModel->update($id_penerima);
            redirect('Bansos/spesifik/' . $id_bansos);
        }
    }

    public function import_excel_penerima($id_bansos)
    {
        $config['upload_path'] = 'assets/uploads/';
        $config['allowed_types'] = 'xlsx|xls|csv';
        $config['file_name'] = 'doc' . time();
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('import_excel')) {
            $file = $this->upload->data();
            $reader = ReaderEntityFactory::createXLSXReader();
            $reader->open('assets/uploads/' . $file['file_name']);
            foreach ($reader->getSheetIterator() as $sheet) {
                $numrow = 1;
                foreach ($sheet->getRowIterator() as $row) {
                    if ($numrow > 1) {
                        $databarang = array(
                            'nik_warga' => $row->getCellAtIndex(1),
                            'id_bansos' => $row->getCellAtIndex(2),
                        );
                        $this->PenerimaModel->import_data($databarang);
                    }
                    $numrow++;
                }
                $reader->close();
                unlink('assets/uploads/' . $file['file_name']);
                redirect('Bansos/detail_bansos/' . $id_bansos);
            }
        } else {
            echo 'Eroor : ' . $this->upload->display_errors();
        }
    }


    public function import_excel_spesifik_penerima($id_bansos)
    {
        $config['upload_path'] = 'assets/uploads/';
        $config['allowed_types'] = 'xlsx|xls|csv';
        $config['file_name'] = 'doc' . time();
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('import_excel')) {
            $file = $this->upload->data();
            $reader = ReaderEntityFactory::createXLSXReader();
            $reader->open('assets/uploads/' . $file['file_name']);
            foreach ($reader->getSheetIterator() as $sheet) {
                $numrow = 1;
                foreach ($sheet->getRowIterator() as $row) {
                    if ($numrow > 2) {
                        $data_penerima = array(
                            'id_bansos' => $row->getCellAtIndex(1),
                            'nik_warga' => $row->getCellAtIndex(2),
                            'no_rekening' => $row->getCellAtIndex(3),

                            'kkm1' => $row->getCellAtIndex(4),
                            'kkm2' => $row->getCellAtIndex(5),
                            'kkm3' => $row->getCellAtIndex(6),
                            'kkm4' => $row->getCellAtIndex(7),
                            'kkm5' => $row->getCellAtIndex(8),
                            'kkm6' => $row->getCellAtIndex(9),
                            'kkm7' => $row->getCellAtIndex(10),
                            'kkm8' => $row->getCellAtIndex(11),
                            'kkm9' => $row->getCellAtIndex(12),
                            'kkm10' => $row->getCellAtIndex(13),
                            'kkm11' => $row->getCellAtIndex(14),
                            'kkm12' => $row->getCellAtIndex(15),
                            'kkm13' => $row->getCellAtIndex(16),
                            'kkm14' => $row->getCellAtIndex(17),

                            'jumlah' => $row->getCellAtIndex(18),

                            'sudah_jps_pkh' => $row->getCellAtIndex(19),
                            'sudah_jps_bpnt' => $row->getCellAtIndex(20),
                            'sudah_jps_kp' => $row->getCellAtIndex(21),
                            'sudah_jps_bp' => $row->getCellAtIndex(22),
                            'sudah_jps_bk' => $row->getCellAtIndex(23),

                            'belum_jps_hilang_pencarian' => $row->getCellAtIndex(24),
                            'belum_jps_tidak_terdata' => $row->getCellAtIndex(25),
                            'belum_jps_sakit_kronis' => $row->getCellAtIndex(26),

                            'ms_tms' => $row->getCellAtIndex(27),

                        );
                        $this->PenerimaModel->import_data($data_penerima);
                    }
                    $numrow++;
                }
                $reader->close();
                unlink('assets/uploads/' . $file['file_name']);
                redirect('Bansos/spesifik/' . $id_bansos);
            }
        } else {
            echo 'Eroor : ' . $this->upload->display_errors();
        }
    }
}
