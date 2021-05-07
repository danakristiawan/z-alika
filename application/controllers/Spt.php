<?php

class Spt extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('Spt_model', 'spt');
        $this->load->model('Satker_model', 'satker');
    }

    public function index($thn = null)
    {
        if (!isset($thn)) $thn = date('Y');
        $data['tahun'] = $this->spt->getTahun();
        $data['thn'] = $thn;
        $data['spt'] = $this->spt->getSpt($thn);

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('spt/index', $data);
        $this->load->view('template/footer');
    }

    public function detail($thn = null, $kdsatker = null)
    {
        if (!isset($thn)) show_404();
        if (!isset($kdsatker)) show_404();
        $a = '1';
        $keyword = $this->input->post('keyword');
        $config['base_url'] = base_url('spt/detail/' . $thn . '/' . $kdsatker . '/' . $a . '');
        $config['total_rows'] = $this->spt->countSpt($thn, $kdsatker);
        $config['per_page'] = 20;

        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $this->uri->segment(6) ? $this->uri->segment(6) : 0;
        $data['keyword'] = $keyword;
        $limit = $config["per_page"];
        $offset = $data['page'];

        if ($keyword) {
            $data['page'] = 0;
            $data['spt'] = $this->spt->findDetailSpt($thn, $kdsatker, $keyword, $limit, $offset);
        } else {
            $data['spt'] = $this->spt->getDetailSpt($thn, $kdsatker, $limit, $offset);
        }

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('spt/detail', $data);
        $this->load->view('template/footer');
    }

    public function upload($thn = null, $kdsatker = null)
    {
        if (!isset($thn)) show_404();
        $this->spt->upload($thn, $kdsatker);
        $this->session->set_flashdata('pesan', 'Data berhasil diupload.');
        redirect('spt/index/' . $thn . '');
    }

    public function upload_detail($nip = null, $bln = null, $thn = null, $kdsatker = null, $nospm = null)
    {
        if (!isset($nip)) show_404();
        if (!isset($bln)) show_404();
        if (!isset($thn)) show_404();
        if (!isset($kdsatker)) show_404();
        $a = '1';
        $this->spt->uploadDetail($nip, $bln, $thn, $kdsatker, $nospm);
        $this->session->set_flashdata('pesan', 'Data berhasil diupload.');
        redirect('spt/detail/' . $thn . '/' . $bln . '/' . $kdsatker . '/' . $nospm .  '');
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
                $this->db->insert('data_spt_pegawai', $data);
            }
            $this->session->set_flashdata('pesan', 'Data berhasil diimpor.');
            redirect('spt');
        }
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('spt/impor', $data);
        $this->load->view('template/footer');
    }
}
