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
}
