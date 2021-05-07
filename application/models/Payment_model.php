<?php

use GuzzleHttp\Client;

class Payment_model extends CI_Model
{
    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => base_uri(),
            'verify' => false,
            'auth' => auth()
        ]);
    }

    public function getTahun()
    {
        return $this->db->query("SELECT DISTINCT tahun FROM data_payment ORDER BY tahun DESC")->result_array();
    }

    public function getBulan($tahun = null)
    {
        return $this->db->query("SELECT DISTINCT bulan FROM data_payment WHERE tahun='$tahun' ORDER BY bulan DESC")->result_array();
    }

    public function getPayment($tahun = null, $bulan = null)
    {
        return $this->db->query("SELECT kdsatker,nospm,sts, COUNT(nip) AS jml FROM data_payment WHERE tahun='$tahun' AND bulan='$bulan' GROUP BY kdsatker,nospm,sts")->result_array();
    }

    public function getDetailPayment($bulan = null, $tahun = null, $kdsatker = null, $nospm = null, $limit = 0, $offset = 0)
    {
        return $this->db->query("SELECT * FROM data_payment WHERE bulan='$bulan' AND tahun='$tahun' AND kdsatker='$kdsatker' AND nospm='$nospm' LIMIT $limit OFFSET $offset")->result_array();
    }

    public function findDetailPayment($bulan = null, $tahun = null, $kdsatker = null, $keyword = null, $limit = 0, $offset = 0)
    {
        return $this->db->query("SELECT * FROM data_payment WHERE bulan='$bulan' AND tahun='$tahun' AND kdsatker='$kdsatker' AND nip LIKE '%$keyword%' OR bulan='$bulan' AND tahun='$tahun' AND kdsatker='$kdsatker' AND nama LIKE '%$keyword%' LIMIT $limit OFFSET $offset")->result_array();
    }

    public function countPayment($tahun = null, $bulan = null, $kdsatker = null, $nospm = null)
    {
        return $this->db->query("SELECT * FROM data_payment WHERE tahun='$tahun' AND bulan='$bulan' AND kdsatker='$kdsatker' AND nospm='$nospm'")->num_rows();
    }
    public function upload($bulan = null, $tahun = null, $kdsatker = null, $nospm = null)
    {
        $rows = $this->db->query("SELECT * FROM data_payment WHERE bulan='$bulan' AND tahun='$tahun' AND kdsatker='$kdsatker' AND nospm='$nospm'")->result_array();
        foreach ($rows as $r) {
            $response = $this->_client->request('POST', 'data-lain', [
                'form_params' => [
                    'bulan' => $r['bulan'],
                    'tahun' => $r['tahun'],
                    'kdsatker' => $r['kdsatker'],
                    'nip' => $r['nip'],
                    'bruto' => $r['bruto'],
                    'pph' => $r['pph'],
                    'netto' => $r['netto'],
                    'jenis' => $r['jenis'],
                    'uraian' => $r['uraian'],
                    'tanggal' => $r['tanggal'],
                    'nospm' => $r['nospm'],
                    'X-API-KEY' => apiKey()
                ]
            ]);
        }
        $this->db->update('data_payment', ['sts' => 1], ['bulan' => $bulan, 'tahun' => $tahun, 'kdsatker' => $kdsatker, 'nospm' => $nospm]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function uploadDetail($nip, $bulan, $tahun, $kdsatker, $nospm)
    {
        $r = $this->db->get_where('data_payment', ['nip' => $nip, 'bulan' => $bulan, 'tahun' => $tahun, 'kdsatker' => $kdsatker, 'nospm' => $nospm])->row_array();
        $response = $this->_client->request('POST', 'data-lain', [
            'form_params' => [
                'bulan' => $r['bulan'],
                'tahun' => $r['tahun'],
                'kdsatker' => $r['kdsatker'],
                'nip' => $r['nip'],
                'bruto' => $r['bruto'],
                'pph' => $r['pph'],
                'netto' => $r['netto'],
                'jenis' => $r['jenis'],
                'uraian' => $r['uraian'],
                'tanggal' => $r['tanggal'],
                'nospm' => $r['nospm'],
                'X-API-KEY' => apiKey()
            ]
        ]);
        $this->db->update('data_payment', ['sts' => 1], ['nip' => $nip, 'bulan' => $bulan, 'tahun' => $tahun, 'kdsatker' => $kdsatker, 'nospm' => $nospm]);
        return json_decode($response->getBody()->getContents(), true);
    }
}
