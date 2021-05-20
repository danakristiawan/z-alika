<?php

class Tukin_online extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('Tukin_online_model', 'tukin_online');
        $this->load->model('Satker_model', 'satker');
    }

    public function index($thn = null, $bln = null)
    {
        if (!isset($thn)) $thn = date('Y');
        if (!isset($bln)) $bln = date('m');
        $data['tahun'] = $this->tukin_online->getTahun();
        $data['bulan'] = $this->tukin_online->getBulan($thn);
        $data['thn'] = $thn;
        $data['bln'] = $bln;
        $data['tukin'] = $this->tukin_online->getTukin($thn, $bln);

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('tukin_online/index', $data);
        $this->load->view('template/footer');
    }

    public function detail($thn = null, $bln = null, $kdsatker = null, $a = null)
    {
        if (!isset($thn)) show_404();
        if (!isset($bln)) show_404();
        if (!isset($kdsatker)) show_404();
        $a = '1';
        $keyword = $this->input->post('keyword');
        $config['base_url'] = base_url('tukin-online/detail/' . $thn . '/' . $bln . '/' . $kdsatker . '/' . $a . '');
        $config['total_rows'] = $this->tukin_online->countTukin($thn, $bln, $kdsatker);
        $config['per_page'] = 20;

        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $this->uri->segment(7) ? $this->uri->segment(7) : 0;
        $data['keyword'] = $keyword;
        $limit = $config["per_page"];
        $offset = $data['page'];

        if ($keyword) {
            $data['page'] = 0;
            $data['tukin'] = $this->tukin_online->findDetailTukin($bln, $thn, $kdsatker, $keyword, $limit, $offset);
        } else {
            $data['tukin'] = $this->tukin_online->getDetailTukin($bln, $thn, $kdsatker, $limit, $offset);
        }

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('tukin_online/detail', $data);
        $this->load->view('template/footer');
    }

    public function upload($thn = null, $bln = null, $kdsatker = null)
    {
        if (!isset($bln)) show_404();
        if (!isset($thn)) show_404();
        $this->tukin_online->upload($bln, $thn, $kdsatker);
        $this->session->set_flashdata('pesan', 'Data berhasil diupload.');
        redirect('tukin-online/index/' . $thn . '/' . $bln . '');
    }

    public function upload_detail($nip = null, $bln = null, $thn = null, $kdsatker = null)
    {
        if (!isset($nip)) show_404();
        if (!isset($bln)) show_404();
        if (!isset($thn)) show_404();
        if (!isset($kdsatker)) show_404();
        $a = '1';
        $this->tukin_online->uploadDetail($nip, $bln, $thn, $kdsatker);
        $this->session->set_flashdata('pesan', 'Data berhasil diupload.');
        redirect('tukin-online/detail/' . $thn . '/' . $bln . '/' . $kdsatker . '/' . $a .  '');
    }

    public function impor()
    {
        $data['satker'] = $this->satker->getSatker();

        $file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        if (isset($_FILES['berkas_excel']['name']) && in_array($_FILES['berkas_excel']['type'], $file_mimes)) {

            $kdsatker = $this->input->post('kdsatker');
            $bulan = $this->input->post('bulan');
            $tahun = $this->input->post('tahun');

            $arr_file = explode('.', $_FILES['berkas_excel']['name']);
            $extension = end($arr_file);

            if ('csv' == $extension) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }

            $spreadsheet = $reader->load($_FILES['berkas_excel']['tmp_name']);

            $sheetData = $spreadsheet->getActiveSheet()->toArray();
            for ($i = 1; $i < count($sheetData); $i++) {
                $nip = $sheetData[$i]['1'];
                $nama = $sheetData[$i]['2'];
                $grade = $sheetData[$i]['3'];
                $tjpokok = $sheetData[$i]['4'];
                $tjtamb = $sheetData[$i]['5'];
                $abspotr = $sheetData[$i]['6'];
                $abspotp = $sheetData[$i]['7'];
                $tkpph = $sheetData[$i]['8'];
                $data = [
                    'bulan' => $bulan,
                    'tahun' => $tahun,
                    'kdsatker' => $kdsatker,
                    'nip' => $nip,
                    'nama' => $nama,
                    'grade' => $grade,
                    'tjpokok' => $tjpokok,
                    'tjtamb' => $tjtamb,
                    'abspotr' => $abspotr,
                    'abspotp' => $abspotp,
                    'tkpph' => $tkpph
                ];
                $this->db->insert('data_tukin', $data);
            }
            $this->session->set_flashdata('pesan', 'Data berhasil diimpor.');
            redirect('tukin_online');
        }
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('tukin_online/impor', $data);
        $this->load->view('template/footer');
    }

    public function ekspor($thn = null, $bln = null, $kdsatker = null)
    {
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'no');
        $sheet->setCellValue('B1', 'nip');
        $sheet->setCellValue('C1', 'nama');
        $sheet->setCellValue('D1', 'bulan');
        $sheet->setCellValue('E1', 'tahun');
        $sheet->setCellValue('F1', 'kdsatker');
        $sheet->setCellValue('G1', 'grade');
        $sheet->setCellValue('H1', 'tjpokok');
        $sheet->setCellValue('I1', 'tjtamb');
        $sheet->setCellValue('J1', 'abspotr');
        $sheet->setCellValue('K1', 'abspotp');
        $sheet->setCellValue('L1', 'tkpph');
        $sheet->setCellValue('M1', 'p1');
        $sheet->setCellValue('N1', 'p2');
        $sheet->setCellValue('O1', 'p3');
        $sheet->setCellValue('P1', 'p4');
        $sheet->setCellValue('Q1', 'p5');
        $sheet->setCellValue('R1', 'p6');
        $sheet->setCellValue('S1', 'p7');
        $sheet->setCellValue('T1', 'p8');
        $sheet->setCellValue('U1', 'p9');
        $sheet->setCellValue('V1', 'p10');
        $sheet->setCellValue('W1', 'p11');
        $sheet->setCellValue('X1', 'p12');
        $sheet->setCellValue('Y1', 'p13');
        $sheet->setCellValue('Z1', 'p14');
        $sheet->setCellValue('AA1', 'p15');
        $sheet->setCellValue('AB1', 'p16');
        $sheet->setCellValue('AC1', 'p17');
        $sheet->setCellValue('AD1', 'p18');
        $sheet->setCellValue('AE1', 'p19');
        $sheet->setCellValue('AF1', 'p20');
        $sheet->setCellValue('AG1', 'p21');
        $sheet->setCellValue('AH1', 'p22');

        $total_rows = $this->tukin_online->countTukin($thn, $bln, $kdsatker);
        $tukin = $this->tukin_online->getDetailTukin($bln, $thn, $kdsatker, $total_rows, 0);
        $no = 1;
        $i = 2;
        foreach ($tukin as $r) {
            $sheet->setCellValue('A' . $i, $no++);
            $sheet->setCellValue('B' . $i, ' ' . $r['nip']);
            $sheet->setCellValue('C' . $i, $r['nama']);
            $sheet->setCellValue('D' . $i, $r['bulan']);
            $sheet->setCellValue('E' . $i, $r['tahun']);
            $sheet->setCellValue('F' . $i, $r['kdsatker']);
            $sheet->setCellValue('G' . $i, $r['grade']);
            $sheet->setCellValue('H' . $i, $r['tjpokok']);
            $sheet->setCellValue('I' . $i, $r['tjtamb']);
            $sheet->setCellValue('J' . $i, $r['abspotr']);
            $sheet->setCellValue('K' . $i, $r['abspotp']);
            $sheet->setCellValue('L' . $i, $r['tkpph']);
            $sheet->setCellValue('M' . $i, $r['p1']);
            $sheet->setCellValue('N' . $i, $r['p2']);
            $sheet->setCellValue('O' . $i, $r['p3']);
            $sheet->setCellValue('P' . $i, $r['p4']);
            $sheet->setCellValue('Q' . $i, $r['p5']);
            $sheet->setCellValue('R' . $i, $r['p6']);
            $sheet->setCellValue('S' . $i, $r['p7']);
            $sheet->setCellValue('T' . $i, $r['p8']);
            $sheet->setCellValue('U' . $i, $r['p9']);
            $sheet->setCellValue('V' . $i, $r['p10']);
            $sheet->setCellValue('W' . $i, $r['p11']);
            $sheet->setCellValue('X' . $i, $r['p12']);
            $sheet->setCellValue('Y' . $i, $r['p13']);
            $sheet->setCellValue('Z' . $i, $r['p14']);
            $sheet->setCellValue('AA' . $i, $r['p15']);
            $sheet->setCellValue('AB' . $i, $r['p16']);
            $sheet->setCellValue('AC' . $i, $r['p17']);
            $sheet->setCellValue('AD' . $i, $r['p18']);
            $sheet->setCellValue('AE' . $i, $r['p19']);
            $sheet->setCellValue('AF' . $i, $r['p20']);
            $sheet->setCellValue('AG' . $i, $r['p21']);
            $sheet->setCellValue('AH' . $i, $r['p22']);
            $i++;
        }

        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];

        $i = $i - 1;
        $sheet->getStyle('A1:AH' . $i)->applyFromArray($styleArray);

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save('Data Tukin.xlsx');

        $this->session->set_flashdata('pesan', 'Data berhasil diekspor.');
        redirect('tukin_online');
    }
}
