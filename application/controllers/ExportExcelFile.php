<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExportExcelFile extends CI_Controller
{

    public function index($id_bansos)
    {
        $no = 1;
        $baris = 2;
        $spreadsheet = new Spreadsheet(); // instantiate Spreadsheet
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue("A1", "No");
        $sheet->setCellValue("B1", "NIK");
        $sheet->setCellValue("C1", "Kode Bantuan Sosial");

        $this->load->model('PenerimaModel');
        $data_penerima = $this->PenerimaModel->select_penerima_per_bansos($id_bansos);

        foreach ($data_penerima as $x) {
            $sheet->setCellValue("A" . $baris, $no++);
            $sheet->setCellValue("B" . $baris, $x['nik']);
            $sheet->setCellValue("C" . $baris, $x['nama_warga']);
            $baris++;
        }

        $writer = new Xlsx($spreadsheet); // instantiate Xlsx

        $filename = 'list-of-jaegers'; // set filename for excel file to be exported

        header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');    // download file 
    }
}
