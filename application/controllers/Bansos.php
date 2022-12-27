<?php
defined('BASEPATH') or exit('No direct script access allowed');

// use PhpOffice\PhpSpreadsheet\Reader\Xml\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;


class Bansos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_loggin();
        $this->load->model('PenerimaModel');
        $this->load->model('BansosModel');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Data Bantuan Sosial';
        $data['bansos'] = $this->BansosModel->select_bansos();
        // $data['jumlah_bansos'] = $this->BansosModel->count_bansos();

        $this->load->view("templates/header_admin", $data);
        $this->load->view("bansos/daftar_bansos", $data);
        $this->load->view("templates/footer_admin", $data);
    }

    public function delete($id)
    {
        $this->db->where('id_bansos', $id);
        $delete = $this->db->delete('bansos');
        if ($delete) {
            $this->db->where('id_bansos', $id);
            $delete = $this->db->delete('penerima_bansos');
            $this->session->set_flashdata('bansos', 'Data Berhasil Dihapus');
            redirect('Bansos');
        }
    }

    public function detail_bansos($id_bansos)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Detail Bantuan Sosial';

        $data['per_bansos'] = $this->BansosModel->select_bansos_id($id_bansos);
        $data['penerima_per_bansos'] = $this->PenerimaModel->select_penerima_per_bansos($id_bansos);

        $this->load->view("templates/header_admin", $data);
        $this->load->view("bansos/detail_bansos_per_bansos", $data);
        $this->load->view("templates/footer_admin", $data);
    }

    public function add()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Tambah Bantuan Sosial';

        $this->form_validation->set_rules('nama_bansos', 'Nama bantuan sosial ', 'required|trim', ['required' => 'Nama bantuan tidak boleh kosong']);
        $this->form_validation->set_rules('periode_bulan', 'Periode bulan ', 'required|trim', ['required' => 'Periode bulan tidak boleh kosong']);
        $this->form_validation->set_rules('periode_tahun', 'Periode Tahun ', 'required|trim|min_length[4]|max_length[4]|numeric', ['required' => 'Periode tahun tidak boleh kosong', 'min_length' => 'Minimal 4 Karakter', 'max_length' => 'Maksimal 4 Karakter', 'numeric' => 'Hanya boleh berisi angka saja']);
        $this->form_validation->set_rules('status_bansos', 'Nama bantuan sosial ', 'required|trim', ['required' => 'Nama bantuan tidak boleh kosong']);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header_admin', $data);
            $this->load->view('bansos/add_bansos', $data);
            $this->load->view('templates/footer_admin', $data);
        } else {

            $this->BansosModel->create();
            redirect('Bansos');
        }
    }

    public function edit($id_bansos)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Edit Bantuan Sosial';

        $data['bansos'] = $this->BansosModel->select_bansos_id($id_bansos);

        $this->form_validation->set_rules('nama_bansos', 'Nama bantuan sosial ', 'required|trim', ['required' => 'Nama bantuan tidak boleh kosong']);
        $this->form_validation->set_rules('periode_bulan', 'Periode bulan ', 'required|trim', ['required' => 'Periode bulan tidak boleh kosong']);
        $this->form_validation->set_rules('periode_tahun', 'Periode Tahun ', 'required|trim|min_length[4]|max_length[4]|numeric', ['required' => 'Periode tahun tidak boleh kosong', 'min_length' => 'Minimal 4 Karakter', 'max_length' => 'Maksimal 4 Karakter', 'numeric' => 'Hanya boleh berisi angka saja']);
        $this->form_validation->set_rules('status_bansos', 'Nama bantuan sosial ', 'required|trim', ['required' => 'Nama bantuan tidak boleh kosong']);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header_admin', $data);
            $this->load->view('bansos/edit_bansos', $data);
            $this->load->view('templates/footer_admin', $data);
        } else {

            $this->BansosModel->update($id_bansos);
            redirect('Bansos');
        }
    }


    public function spesifik($id_bansos)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Detail Bantuan Sosial';
        $data['per_bansos'] = $this->BansosModel->select_bansos_id($id_bansos);
        $data['penerima_per_bansos'] = $this->PenerimaModel->select_penerima_per_bansos($id_bansos);

        $this->load->view("templates/header_admin", $data);
        $this->load->view("bansos/spesifik_bansos_per_bansos", $data);
        $this->load->view("templates/footer_admin", $data);
    }


    // export excel penerima bansos per group bansos
    public function export_excel($id_bansos)
    {
        $no = 1;
        $baris = 2;
        $spreadsheet = new Spreadsheet(); // instantiate Spreadsheet
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue("A1", "No");
        $sheet->setCellValue("B1", "NIK");
        $sheet->setCellValue("C1", "NAMA");
        $sheet->setCellValue("D1", "ALAMAT");
        $sheet->setCellValue("E1", "NAMA IBU");

        $data_penerima = $this->PenerimaModel->select_penerima_per_bansos($id_bansos);

        foreach ($data_penerima as $x) {
            $sheet->setCellValue("A" . $baris, $no++);
            $sheet->setCellValue("B" . $baris, $x['nik']);
            $sheet->setCellValue("C" . $baris, $x['nama_warga']);
            $sheet->setCellValue("D" . $baris, $x['nama_dusun']);
            $sheet->setCellValue("E" . $baris, $x['nama_ibu']);
            $baris++;
        }

        $bansos = $this->BansosModel->select_bansos_id($id_bansos);

        $writer = new Xlsx($spreadsheet); // instantiate Xlsx

        $filename = strtolower(str_replace(' ', '', $bansos->nama_bansos)) . '_' . date('d-M-y-H-i-s', time()); // set filename for excel file to be exported

        header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');    // download file 
    }


    public function export_excel_spesifik_penerima($id_bansos)
    {
        $no = 1;
        $baris = 3;
        $spreadsheet = new Spreadsheet(); // instantiate Spreadsheet
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue("A1", "No");
        $sheet->mergeCells("A1:A2");

        $sheet->setCellValue("B1", "NIK");
        $sheet->mergeCells("B1:B2");

        $sheet->setCellValue("C1", "Nama");
        $sheet->mergeCells("C1:C2");

        $sheet->setCellValue("D1", "Alamat");
        $sheet->mergeCells("D1:F1");

        $sheet->setCellValue("D2", "Dusun");
        $sheet->setCellValue("E2", "RT");
        $sheet->setCellValue("F2", "RW");

        $sheet->setCellValue("G1", "No Rekening");
        $sheet->mergeCells("G1:G2");

        $sheet->setCellValue("H1", "Kriteria Keluarga Miskin");
        $sheet->mergeCells("H1:U1");

        $sheet->setCellValue("H2", '1');
        $sheet->setCellValue("I2", '2');
        $sheet->setCellValue("J2", '3');
        $sheet->setCellValue("K2", '4');
        $sheet->setCellValue("L2", '5');
        $sheet->setCellValue("M2", '6');
        $sheet->setCellValue("N2", '7');
        $sheet->setCellValue("O2", '8');
        $sheet->setCellValue("P2", '9');
        $sheet->setCellValue("Q2", '10');
        $sheet->setCellValue("R2", '11');
        $sheet->setCellValue("S2", '12');
        $sheet->setCellValue("T2", '13');
        $sheet->setCellValue("U2", '14');

        $sheet->setCellValue("V1", "Jumlah");
        $sheet->mergeCells("V1:V2");

        $sheet->setCellValue("W1", "Sudah Menerima JPS");
        $sheet->mergeCells("W1:AA1");

        $sheet->setCellValue("W2", 'PKH');
        $sheet->setCellValue("X2", 'PBNT');
        $sheet->setCellValue("Y2", 'KP');
        $sheet->setCellValue("Z2", 'BP');
        $sheet->setCellValue("AA2", 'BK');

        $sheet->setCellValue("AB1", "Belum Menerima JPS");
        $sheet->mergeCells("AB1:AD1");

        $sheet->setCellValue("AB2", 'Kehilangan Mata Pencarian');
        $sheet->setCellValue("AC2", 'Tidak Terdata');
        $sheet->setCellValue("AD2", 'Sakit Kronis');

        $sheet->setCellValue("AE1", "MS/TMS");
        $sheet->mergeCells("AE1:AE2");

        // style
        //set cell aligment
        $sheet->getStyle("A1")->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle("B1")->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle("C1")->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle("D1")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("D2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("E2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("F2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("G1")->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle("H1")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->getStyle("H2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("I2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("J2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("K2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("L2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("M2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("N2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("O2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("H2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("P2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("Q2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("R2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("S2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("T2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("U2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->getStyle("V1")->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle("W1")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("W2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("X2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("Y2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("Z2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("AA2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->getStyle("AB1")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("AB2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("AC2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("AD2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->getStyle("AE1")->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

        // set width
        $sheet->getColumnDimension("A")->setWidth(5);
        $sheet->getColumnDimension("B")->setWidth(20);
        $sheet->getColumnDimension("C")->setWidth(35);
        $sheet->getColumnDimension("D")->setWidth(10);
        $sheet->getColumnDimension("E")->setWidth(5);
        $sheet->getColumnDimension("F")->setWidth(5);
        $sheet->getColumnDimension("G")->setWidth(25);

        $sheet->getColumnDimension("H")->setWidth(5);
        $sheet->getColumnDimension("I")->setWidth(5);
        $sheet->getColumnDimension("J")->setWidth(5);
        $sheet->getColumnDimension("K")->setWidth(5);
        $sheet->getColumnDimension("L")->setWidth(5);
        $sheet->getColumnDimension("M")->setWidth(5);
        $sheet->getColumnDimension("N")->setWidth(5);
        $sheet->getColumnDimension("O")->setWidth(5);
        $sheet->getColumnDimension("P")->setWidth(5);
        $sheet->getColumnDimension("Q")->setWidth(5);
        $sheet->getColumnDimension("R")->setWidth(5);
        $sheet->getColumnDimension("S")->setWidth(5);
        $sheet->getColumnDimension("T")->setWidth(5);
        $sheet->getColumnDimension("U")->setWidth(5);

        $sheet->getColumnDimension("V")->setWidth(8);

        $sheet->getColumnDimension("W")->setWidth(5);
        $sheet->getColumnDimension("X")->setWidth(5);
        $sheet->getColumnDimension("Y")->setWidth(5);
        $sheet->getColumnDimension("Z")->setWidth(5);
        $sheet->getColumnDimension("AA")->setWidth(5);
        $sheet->getColumnDimension("AB")->setWidth(8);
        $sheet->getColumnDimension("AC")->setWidth(8);
        $sheet->getColumnDimension("AD")->setWidth(8);
        $sheet->getColumnDimension("AE")->setWidth(8);

        $bansos = $this->BansosModel->select_bansos_id($id_bansos);
        $data_penerima = $this->PenerimaModel->select_penerima_per_bansos($id_bansos);

        foreach ($data_penerima as $x) {
            $sheet->setCellValue("A" . $baris, $no++);
            $sheet->setCellValue("B" . $baris, $x['nik']);
            $sheet->setCellValue("C" . $baris, $x['nama_warga']);

            $sheet->setCellValue("D" . $baris, ucwords($x['nama_dusun']));
            $sheet->setCellValue("E" . $baris, $x['rt']);
            $sheet->setCellValue("F" . $baris, $x['rw']);

            $sheet->setCellValue("G" . $baris, $x['no_rekening']);

            $sheet->setCellValue("H" . $baris, $x['kkm1']);
            $sheet->setCellValue("I" . $baris, $x['kkm2']);
            $sheet->setCellValue("J" . $baris, $x['kkm3']);
            $sheet->setCellValue("K" . $baris, $x['kkm4']);
            $sheet->setCellValue("L" . $baris, $x['kkm5']);
            $sheet->setCellValue("M" . $baris, $x['kkm6']);
            $sheet->setCellValue("N" . $baris, $x['kkm7']);
            $sheet->setCellValue("O" . $baris, $x['kkm8']);
            $sheet->setCellValue("P" . $baris, $x['kkm9']);
            $sheet->setCellValue("Q" . $baris, $x['kkm10']);
            $sheet->setCellValue("R" . $baris, $x['kkm11']);
            $sheet->setCellValue("S" . $baris, $x['kkm12']);
            $sheet->setCellValue("T" . $baris, $x['kkm13']);
            $sheet->setCellValue("U" . $baris, $x['kkm14']);
            $sheet->setCellValue("V" . $baris, $x['jumlah']);

            $sheet->setCellValue("W" . $baris, $x['sudah_jps_pkh']);
            $sheet->setCellValue("X" . $baris, $x['sudah_jps_bpnt']);
            $sheet->setCellValue("Y" . $baris, $x['sudah_jps_kp']);
            $sheet->setCellValue("Z" . $baris, $x['sudah_jps_bp']);
            $sheet->setCellValue("AA" . $baris, $x['sudah_jps_bk']);

            $sheet->setCellValue("AB" . $baris, $x['belum_jps_hilang_pencarian']);
            $sheet->setCellValue("AC" . $baris, $x['belum_jps_tidak_terdata']);
            $sheet->setCellValue("AD" . $baris, $x['belum_jps_sakit_kronis']);

            $sheet->setCellValue("AE" . $baris, $x['ms_tms']);

            $baris++;
        }

        $writer = new Xlsx($spreadsheet); // instantiate Xlsx

        $filename =  strtolower(str_replace(' ', '', $bansos->nama_bansos)) . '_' . date('d-M-y-H-i-s', time()); // set filename for excel file to be exported

        header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');    // download file 
    }

    // export pdf penerima bansos per group bansos
    public function export_pdf($id_bansos)
    {
        $this->data['per_bansos'] = $this->BansosModel->select_bansos_id($id_bansos);
        $this->data['penerima_per_bansos'] = $this->PenerimaModel->select_penerima_per_bansos($id_bansos);
        $judul = 'Penerima ' . $this->data['per_bansos']->nama_bansos . '-' . date('d-M-Y H:i:s', time());

        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');

        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Penjualan Toko Kita';

        // filename dari pdf ketika didownload
        $file_pdf = $judul;
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "potrait";

        $html = $this->load->view('pdf/detail_bansos_per_bansos', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    // format file
    public function format_import_excel_penerima_bansos($id_bansos)
    {
        $no = 1;
        $baris = 2;
        $spreadsheet = new Spreadsheet(); // instantiate Spreadsheet
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue("A1", "No");
        $sheet->setCellValue("B1", "Kode Bantuan Sosial");
        $sheet->setCellValue("C1", "NIK");

        $bansos = $this->BansosModel->select_bansos_id($id_bansos);

        $sheet->setCellValue("A2", '1');
        $sheet->setCellValue("B2", $bansos->id_bansos);
        $sheet->setCellValue("C2", '');

        $sheet->getColumnDimension("A")->setWidth(5);
        $sheet->getColumnDimension("B")->setWidth(20);
        $sheet->getColumnDimension("C")->setWidth(23);

        $writer = new Xlsx($spreadsheet); // instantiate Xlsx

        $filename = 'Format upload ' . strtolower(str_replace(' ', '', $bansos->nama_bansos)) . '_' . date('d-M-y-H-i-s', time()); // set filename for excel file to be exported

        header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');    // download file 
    }

    // format file
    public function format_import_spesifik_penerima_bansos($id_bansos)
    {
        $no = 1;
        $baris = 2;
        $spreadsheet = new Spreadsheet(); // instantiate Spreadsheet
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue("A1", "No");
        $sheet->mergeCells("A1:A2");

        $sheet->setCellValue("B1", "Kode Bantuan");
        $sheet->mergeCells("B1:B2");

        $sheet->setCellValue("C1", "NIK");
        $sheet->mergeCells("C1:C2");

        $sheet->setCellValue("D1", "Nomor Rekening");
        $sheet->mergeCells("D1:D2");

        $sheet->setCellValue("E1", "Kriteria Keluarga Miskin");
        $sheet->mergeCells("E1:R1");
        $sheet->setCellValue("E2", "1");
        $sheet->setCellValue("F2", "2");
        $sheet->setCellValue("G2", "3");
        $sheet->setCellValue("H2", "4");
        $sheet->setCellValue("I2", "5");
        $sheet->setCellValue("J2", "6");
        $sheet->setCellValue("K2", "7");
        $sheet->setCellValue("L2", "8");
        $sheet->setCellValue("M2", "9");
        $sheet->setCellValue("N2", "10");
        $sheet->setCellValue("O2", "11");
        $sheet->setCellValue("P2", "12");
        $sheet->setCellValue("Q2", "13");
        $sheet->setCellValue("R2", "14");

        $sheet->setCellValue("S1", "Jumlah");
        $sheet->mergeCells("S1:S2");

        $sheet->setCellValue("T1", "Sudah Menerima JPS");
        $sheet->mergeCells("T1:X1");
        $sheet->setCellValue("T2", "PKH");
        $sheet->setCellValue("U2", "PBPNT");
        $sheet->setCellValue("V2", "KP");
        $sheet->setCellValue("W2", "BP");
        $sheet->setCellValue("X2", "BK");

        $sheet->setCellValue("Y1", "Belum Menerima JPS");
        $sheet->mergeCells("Y1:AA1");
        $sheet->setCellValue("Y2", "Kehilangan Mata Pencarian");
        $sheet->setCellValue("Z2", "Tidak Terdata");
        $sheet->setCellValue("AA2", "Sakit Kronis");
        $sheet->setCellValue("AB1", "MS/TMS");
        $sheet->mergeCells("AB1:AB2");

        // style
        //set cell aligment
        $sheet->getStyle("A1")->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle("B1")->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle("C1")->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle("D1")->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle("S1")->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

        $sheet->getStyle("E1")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("T1")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("Y1")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->getStyle("E2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("F2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("G2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("H2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("I2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("J2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("K2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("L2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("M2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("N2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("O2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("P2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("Q2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("R2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->getStyle("T2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("U2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("V2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("W2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("X2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->getStyle("Y2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("Z2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("AA2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("AB1")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        // set width
        $sheet->getColumnDimension("B")->setWidth(20);
        $sheet->getColumnDimension("C")->setWidth(25);
        $sheet->getColumnDimension("D")->setWidth(25);

        $sheet->getColumnDimension("Y")->setWidth(25);
        $sheet->getColumnDimension("Z")->setWidth(20);
        $sheet->getColumnDimension("AA")->setWidth(20);

        $bansos = $this->BansosModel->select_bansos_id($id_bansos);

        $sheet->setCellValue("A3", '1');
        $sheet->setCellValue("B3", $bansos->id_bansos);

        $writer = new Xlsx($spreadsheet); // instantiate Xlsx

        $filename = 'Format upload ' . strtolower(str_replace(' ', '', $bansos->nama_bansos)) . '_' . date('d-M-y-H-i-s', time()); // set filename for excel file to be exported

        header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');    // download file 
    }
}
