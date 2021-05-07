<?php

class Payment extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('Payment_model', 'payment');
        $this->load->model('Satker_model', 'satker');
    }

    public function index($thn = null, $bln = null)
    {
        if (!isset($thn)) $thn = date('Y');
        if (!isset($bln)) $bln = date('m');
        $data['tahun'] = $this->payment->getTahun();
        $data['bulan'] = $this->payment->getBulan($thn);
        $data['thn'] = $thn;
        $data['bln'] = $bln;
        $data['payment'] = $this->payment->getPayment($thn, $bln);

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('payment/index', $data);
        $this->load->view('template/footer');
    }

    public function detail($thn = null, $bln = null, $kdsatker = null, $nospm = null, $a = null)
    {
        if (!isset($thn)) show_404();
        if (!isset($bln)) show_404();
        if (!isset($kdsatker)) show_404();
        $a = '1';
        $keyword = $this->input->post('keyword');
        $config['base_url'] = base_url('payment/detail/' . $thn . '/' . $bln . '/' . $kdsatker . '/' . $nospm . '/' . $a . '');
        $config['total_rows'] = $this->payment->countPayment($thn, $bln, $kdsatker, $nospm);
        $config['per_page'] = 20;

        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $this->uri->segment(8) ? $this->uri->segment(8) : 0;
        $data['keyword'] = $keyword;
        $limit = $config["per_page"];
        $offset = $data['page'];

        if ($keyword) {
            $data['page'] = 0;
            $data['payment'] = $this->payment->findDetailPayment($bln, $thn, $kdsatker, $nospm, $keyword, $limit, $offset);
        } else {
            $data['payment'] = $this->payment->getDetailPayment($bln, $thn, $kdsatker, $nospm, $limit, $offset);
        }

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('payment/detail', $data);
        $this->load->view('template/footer');
    }

    public function upload($thn = null, $bln = null, $kdsatker = null, $nospm = null)
    {
        if (!isset($bln)) show_404();
        if (!isset($thn)) show_404();
        $this->payment->upload($bln, $thn, $kdsatker, $nospm);
        $this->session->set_flashdata('pesan', 'Data berhasil diupload.');
        redirect('payment/index/' . $thn . '/' . $bln . '');
    }

    public function upload_detail($nip = null, $bln = null, $thn = null, $kdsatker = null, $nospm = null)
    {
        if (!isset($nip)) show_404();
        if (!isset($bln)) show_404();
        if (!isset($thn)) show_404();
        if (!isset($kdsatker)) show_404();
        $a = '1';
        $this->payment->uploadDetail($nip, $bln, $thn, $kdsatker, $nospm);
        $this->session->set_flashdata('pesan', 'Data berhasil diupload.');
        redirect('payment/detail/' . $thn . '/' . $bln . '/' . $kdsatker . '/' . $nospm .  '');
    }

    public function impor()
    {
        $data['satker'] = $this->satker->getSatker();

        $file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        if (isset($_FILES['berkas_excel']['name']) && in_array($_FILES['berkas_excel']['type'], $file_mimes)) {

            $kdsatker = $this->input->post('kdsatker');
            $bulan = $this->input->post('bulan');
            $tahun = $this->input->post('tahun');
            $jenis = $this->input->post('jenis');
            $uraian = $this->input->post('uraian');
            $tanggal = strtotime($this->input->post('tanggal', true));
            $nospm = $this->input->post('nospm');

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
                $nama = $sheetData[$i]['1'];
                $nip = $sheetData[$i]['2'];
                $bruto = $sheetData[$i]['3'];
                $pph = $sheetData[$i]['4'];
                $netto = $sheetData[$i]['5'];
                $data = [
                    'bulan' => $bulan,
                    'tahun' => $tahun,
                    'kdsatker' => $kdsatker,
                    'nama' => $nama,
                    'nip' => $nip,
                    'bruto' => $bruto,
                    'pph' => $pph,
                    'netto' => $netto,
                    'jenis' => $jenis,
                    'uraian' => $uraian,
                    'tanggal' => $tanggal,
                    'nospm' => $nospm
                ];
                $this->db->insert('data_payment', $data);
            }
            $this->session->set_flashdata('pesan', 'Data berhasil diimpor.');
            redirect('payment');
        }
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('payment/impor', $data);
        $this->load->view('template/footer');
    }
}
