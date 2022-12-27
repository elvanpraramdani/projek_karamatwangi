<?php

defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;


class Warga extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_loggin();
		$this->load->model("WargaModel");
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = "Data Warga";

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
		$config['base_url'] = 'http://localhost/projek_karamatwangi/warga/index/';
		// $config['total_rows'] = $this->WargaModel->count_all_warga();
		$config['total_rows'] = $this->WargaModel->count_all_warga();
		$config['per_page'] = 25;

		// initialize
		$this->pagination->initialize($config);
		$data['total_rows'] = $config['total_rows'];
		$data['start'] = $this->uri->segment(3);
		$data['warga'] = $this->WargaModel->select_warga($config['per_page'], $data['start'], $data['search_warga']);
		$data['cari'] = htmlspecialchars($this->input->post('search_warga'));

		$data['coba_warga'] = $this->db->query('SELECT * FROM warga')->result_array();
		$this->load->view('templates/header_admin', $data);
		$this->load->view('warga/daftar_warga', $data);
		$this->load->view('templates/footer_admin', $data);
	}

	public function add()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Tambah Data Warga';
		$this->load->model('WargaModel');
		$data['pendidikan'] = $this->WargaModel->select_pendidikan();
		$data['pekerjaan'] = $this->WargaModel->select_pekerjaan();
		$data['dusun'] = $this->WargaModel->select_dusun();
		$data['agama'] = $this->WargaModel->select_agama();
		$data['shdk'] = $this->WargaModel->select_shdk();
		$data['status'] = $this->WargaModel->select_status();

		$this->form_validation->set_rules('no_kk', 'Nomor KK', 'required|trim|numeric', ['required' => 'Nomor KK tidak boleh kosong!', 'numeric' => 'Nomor KK hanya boleh berisi angka']);

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header_admin', $data);
			$this->load->view('warga/add_warga', $data);
			$this->load->view('templates/footer_admin', $data);
		} else {
			$this->WargaModel->create_warga();
			if (isset($_POST['simpan'])) {
				redirect('Warga');
			} else {
				redirect('Warga/add');
			}
		}
	}



	public function create_penerima()
	{
		$warga_id = $this->input->post('wargaId');

		$data = [
			'id_warga' => $warga_id,
			'id_bansos' => $warga_id
		];

		$result = $this->db->get_where('penerima_bansos', $data);
		//cek jika ada didatabase jika, jika didatabase tidak ada maka tambahkan. jika aka delete.
		if ($result->num_rows() < 1) {
			$this->db->insert('penerima_bansos', $data);
		} else {
			$this->db->delete('penerima_bansos', $data);
		}
	}

	public function edit($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		if ($id != null) {

			$warga = $this->db->get_where('warga', ['id_warga' => $id])->row_array();

			if ($warga) {
				$this->load->model('WargaModel');
				$data['title'] = "Edit Data Warga";
				$data['warga_id'] = $this->WargaModel->biodata($id);

				$this->form_validation->set_rules('no_kk', 'Nomor KK', 'required|trim|numeric', ['required' => 'Nomor KK tidak boleh kosong!', 'numeric' => 'Nomor KK hanya boleh berisi angka']);

				if ($this->form_validation->run() == false) {

					$data['pendidikan'] = $this->WargaModel->select_pendidikan();
					$data['pekerjaan'] = $this->WargaModel->select_pekerjaan();
					$data['dusun'] = $this->WargaModel->select_dusun();
					$data['agama'] = $this->WargaModel->select_agama();
					$data['shdk'] = $this->WargaModel->select_shdk();
					$data['status'] = $this->WargaModel->select_status();

					$this->load->view('templates/header_admin', $data);
					$this->load->view('warga/edit_warga', $data);
					$this->load->view('templates/footer_admin', $data);
				} else {
					$this->WargaModel->update_warga($id);

					if (isset($_POST['update'])) {
						redirect('Warga/biodata/' . $id);
					} else {
						redirect('Warga/edit/' . $id);
					}
				}
			} else {
				echo 'data tidak ditembukan';
			}
		} else {
			echo 'data tidak ditembukan';
		}
	}

	public function delete($id)
	{
		$this->db->where('id_warga', $id);
		$this->db->delete('warga');
		$this->session->set_flashdata('warga', 'Data warga berhasil dihapus');
		redirect('Warga');
	}

	public function biodata($id_warga)
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Biodata Warga';
		$this->load->model('WargaModel');
		$data['warga_id'] = $this->WargaModel->biodata($id_warga);

		$this->load->view('templates/header_admin', $data);
		$this->load->view('warga/detail_warga_id', $data);
		$this->load->view('templates/footer_admin', $data);
	}

	// loadingnya lama
	public function export_excel_warga()
	{
		$no = 1;
		$baris = 3;

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		$sheet->setCellValue("A1", "No");
		$sheet->setCellValue("B1", "NIK");
		$sheet->setCellValue("C1", "NAMA");
		$sheet->setCellValue("D1", "NO KK");
		$sheet->setCellValue("E1", "NAMA KEPALA KELUARGA");
		$sheet->setCellValue("F1", "ALAMAT");
		$sheet->setCellValue("G1", "RW");
		$sheet->setCellValue("H1", "RT");
		$sheet->setCellValue("I1", "TEMPAT LAHIR");
		$sheet->setCellValue("J1", "TANGGAL LAHIR");
		$sheet->setCellValue("K1", "KODE JK");
		$sheet->setCellValue("L1", "JK");
		$sheet->setCellValue("M1", "KODE SHDK");
		$sheet->setCellValue("N1", "SHDK");
		$sheet->setCellValue("O1", "KODE_GDR");
		$sheet->setCellValue("P1", "GDR");
		$sheet->setCellValue("Q1", "KD_AGAMA");
		$sheet->setCellValue("R1", "AGAMA");
		$sheet->setCellValue("S1", "KD_STATUS");
		$sheet->setCellValue("T1", "STATUS");
		$sheet->setCellValue("U1", "KD_PDDK_AKHIR");
		$sheet->setCellValue("V1", "PENDIDIKAN AKHIR");
		$sheet->setCellValue("W1", "KD_PEKERJAAN");
		$sheet->setCellValue("X1", "PEKERJAAN");
		$sheet->setCellValue("Y1", "NAMA IBU");
		$sheet->setCellValue("Z1", "NAMA AYAH");

		$sheet->setCellValue("AA1", "KD_NAMA_PROV");
		$sheet->setCellValue("AB1", "NAMA PROVINSI");
		$sheet->setCellValue("AC1", "KD_NAMA_KAB");
		$sheet->setCellValue("AD1", "NAMA KABUPATEN");
		$sheet->setCellValue("AE1", "KD_NAMA_KEC");
		$sheet->setCellValue("AF1", "NAMA KECAMATAN");
		$sheet->setCellValue("AG1", "KD_NAMA_KEL");
		$sheet->setCellValue("AH1", "NAMA KELURAHAN");

		$warga = $this->WargaModel->select_all_warga();

		foreach ($warga as $w) {
			$sheet->setCellValue("A" . $baris, $no++);
			$sheet->setCellValue("B" . $baris, $w['nik']);
			$sheet->setCellValue("C" . $baris, $w['nama_warga']);
			$sheet->setCellValue("D" . $baris, $w['no_kk']);
			$sheet->setCellValue("E" . $baris, $w['kepala_keluarga']);
			$sheet->setCellValue("F" . $baris, $w['nama_dusun']);
			$sheet->setCellValue("G" . $baris, $w['rw']);
			$sheet->setCellValue("H" . $baris, $w['rt']);
			$sheet->setCellValue("I" . $baris, $w['tempat_lahir']);
			$sheet->setCellValue("J" . $baris, $w['tanggal_lahir']);
			$sheet->setCellValue("L" . $baris, $w['jk']);
			$sheet->setCellValue("M" . $baris, $w['shdk']);
			$sheet->setCellValue("N" . $baris, $w['ket_shdk']);
			$sheet->setCellValue("P" . $baris, $w['golongan_darah']);
			$sheet->setCellValue("Q" . $baris, $w['agama']);
			$sheet->setCellValue("R" . $baris, $w['nama_agama']);
			$sheet->setCellValue("S" . $baris, $w['status_warga']);
			$sheet->setCellValue("T" . $baris, $w['ket_status']);
			$sheet->setCellValue("U" . $baris, $w['pendidikan']);
			$sheet->setCellValue("V" . $baris, $w['ket_pendidikan']);
			$sheet->setCellValue("W" . $baris, $w['pekerjaan']);
			$sheet->setCellValue("X" . $baris, $w['ket_pekerjaan']);
			$sheet->setCellValue("Y" . $baris, $w['nama_ibu']);
			$sheet->setCellValue("Z" . $baris, $w['nama_ayah']);
			$baris++;
		}

		$writer = new Xlsx($spreadsheet); // instantiate Xlsx

		$filename = 'Data warga Karamatwangi'; // set filename for excel file to be exported

		header('Content-Type: application/vnd.ms-excel'); // generate excel file
		header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');    // download file 
	}

	public function import_excel_warga()
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
							'nik' 			=> $row->getCellAtIndex(1),
							'nama_warga' 	=> $row->getCellAtIndex(2),
							'no_kk' 		=> $row->getCellAtIndex(3),
							'kepala_keluarga' => $row->getCellAtIndex(4),
							'alamat' 		=> $row->getCellAtIndex(5),
							// 'nama_dusun' => $row->getCellAtIndex(6),
							'rw' 			=> $row->getCellAtIndex(7),
							'rt' 			=> $row->getCellAtIndex(8),
							'tempat_lahir' 	=> $row->getCellAtIndex(9),
							'tanggal_lahir' => $row->getCellAtIndex(10),
							'jk'			=> $row->getCellAtIndex(11),
							'shdk' 			=> $row->getCellAtIndex(12),
							// 'shdk' => $row->getCellAtIndex(13),
							'golongan_darah' => $row->getCellAtIndex(14),
							'agama' 		=> $row->getCellAtIndex(15),
							// 'agama' 		=> $row->getCellAtIndex(16),
							'status_warga' 	=> $row->getCellAtIndex(17),
							// 'status' 	=> $row->getCellAtIndex(18),
							'pendidikan'	=> $row->getCellAtIndex(19),
							// 'pendidikan' => $row->getCellAtIndex(20),
							'pekerjaan' 	=> $row->getCellAtIndex(21),
							// 'pekerjaan' 	=> $row->getCellAtIndex(22),
							'nama_ibu' 		=> $row->getCellAtIndex(23),
							'nama_ayah' 	=> $row->getCellAtIndex(24),
							'provinsi' 		=> $row->getCellAtIndex(25),
							// 'provinsi' 	=> $row->getCellAtIndex(26),
							'kabupaten' 	=> $row->getCellAtIndex(27),
							// 'kabupten' 	=> $row->getCellAtIndex(28),
							'kecamatan' 	=> $row->getCellAtIndex(29),
							// 'kecamatan' 	=> $row->getCellAtIndex(30),
							'kelurahan' 	=> $row->getCellAtIndex(31),
							// 'kelurahan' 	=> $row->getCellAtIndex(32),							
						);
						$this->WargaModel->import_data($data_penerima);
					}
					$numrow++;
				}
				$reader->close();
				unlink('assets/uploads/' . $file['file_name']);
				redirect('Warga');
			}
		} else {
			echo 'Eroor : ' . $this->upload->display_errors();
		}
	}
}
